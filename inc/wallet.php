<?php
// Include WordPress Core (adjust the path as needed)
// require_once(dirname(__FILE__) . '/../../../wp-blog-header.php');

// Helper functions
function base64UrlEncode($data) {
    return rtrim(strtr(base64_encode($data), '+/', '-_'), '=');
}

function base64UrlDecode($data) {
    return base64_decode(strtr($data, '-_', '+/'));
}

function signData($data, $privateKey) {
    openssl_sign($data, $signature, $privateKey, OPENSSL_ALGO_SHA256);
    return $signature;
}

function generate_jwt_for_android($post_id) {
    $post_title = get_the_title($post_id);
    $post_content = get_post_field('post_content', $post_id);

    // Path to the JSON key file
    $jsonKeyPath = get_template_directory() . '/key/geffen-wallet-af50d9b976c6.json';
    $jsonKey = json_decode(file_get_contents($jsonKeyPath), true);

    // Extract private key from JSON key
    $privateKey = openssl_pkey_get_private('file://' . get_template_directory() . '/key/geffen-wallet-private.pem', 'geffen');

    $header = [
        'alg' => 'RS256',
        'typ' => 'JWT'
    ];

    $payload = [
        "iss" => $jsonKey['client_email'],
        "aud" => "google",
        "typ" => "savetowallet",
        "iat" => time(),
        "payload" => [
            "loyaltyObjects" => [
                [
                    "id" => "unique-object-id",
                    "classId" => "your-class-id",
                    "state" => "active",
                    "accountId" => $post_id,
                    "accountName" => $post_title,
                    "barcode" => [
                        "type" => "qrCode",
                        "value" => "1234567890"
                    ],
                    "textModulesData" => [
                        [
                            "header" => "Content",
                            "body" => $post_content
                        ]
                    ]
                ]
            ]
        ]
    ];

    $encodedHeader = base64UrlEncode(json_encode($header));
    $encodedPayload = base64UrlEncode(json_encode($payload));

    $signatureInput = $encodedHeader . '.' . $encodedPayload;
    $signature = signData($signatureInput, $privateKey);
    $encodedSignature = base64UrlEncode($signature);

    $jwt = $encodedHeader . '.' . $encodedPayload . '.' . $encodedSignature;

    return $jwt;
}

function generate_pass_signature($zipFile) {
    $manifest = json_decode(file_get_contents($zipFile), true);
    $manifestJson = json_encode($manifest, JSON_PRETTY_PRINT);

    // Load your private key
    $privateKey = openssl_pkey_get_private('file://' . get_template_directory() . '/key/geffen-wallet-private.pem', 'geffen');

    // Sign the manifest
    openssl_sign($manifestJson, $signature, $privateKey, OPENSSL_ALGO_SHA256);
    return $signature;
}

function generate_pkpass($passData) {
    $zip = new ZipArchive();
    $tmpFile = tempnam(sys_get_temp_dir(), 'pkpass');
    $zip->open($tmpFile, ZipArchive::CREATE);

    // Create the pass.json file
    $passJson = json_encode($passData, JSON_PRETTY_PRINT);
    $zip->addFromString('pass.json', $passJson);

    // Add images or icons if needed
    // Example: $zip->addFile('/path/to/icon.png', 'icon.png');

    // Create manifest
    $zip->addFromString('manifest.json', json_encode([
        'pass.json' => hash_file('sha1', $tmpFile)
    ], JSON_PRETTY_PRINT));

    // Add signature file
    $signature = generate_pass_signature($tmpFile);
    $zip->addFromString('signature', $signature);

    $zip->close();

    return file_get_contents($tmpFile);
}

function generate_pass_for_post($post_id) {
    ob_start(); // Start output buffering

    // Define the allowed post types
    $allowed_post_types = ['medical_profile', 'management'];

    // Check if it's a valid post type
    $post_type = get_post_type($post_id);
    if (!in_array($post_type, $allowed_post_types)) {
        ob_end_clean(); // Clean the output buffer and end it
        return;
    }

    // Get post details
    $post_title = get_the_title($post_id);
    $post_content = get_post_field('post_content', $post_id);

    // Prepare pass data
    $passData = [
        'description' => $post_title,
        'fields' => [
            'header' => $post_title,
            'primaryFields' => [
                'label' => 'Content',
                'value' => $post_content
            ]
        ]
    ];

    // Generate pass
    $passFile = generate_pkpass($passData);

    // Serve the pass file
    header('Content-Type: application/vnd.apple.pkpass');
    header('Content-Disposition: attachment; filename="pass.pkpass"');

    ob_end_clean(); // Clean the output buffer and end it
    echo $passFile;
    exit;
}