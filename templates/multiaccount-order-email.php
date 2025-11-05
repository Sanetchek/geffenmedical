<?php
/**
 * Template Name: Multiaccount send order
 */

get_header();

// Check if the page is password protected
if ( post_password_required() ) {
    echo get_the_password_form(); // Display the default password form
    get_footer();
    return; // Stop further execution if the password is required
}
?>

<div class="order-lookup-container">
    <?php if (!empty($_GET['order_id'])) : ?>
        <?php
            $order_id = intval($_GET['order_id']);
            $order = wc_get_order($order_id);
            $user_id = $order->get_customer_id();
            $geffen_phone = get_user_meta($user_id, 'geffen_phone', true);
            $users = get_existing_user_crm($geffen_phone);
            $users = json_decode($users, true);
            $date_created = $order->get_date_created();
            $formatted_date = $date_created->date('Y-m-d H:i:s');
        ?>

        <?php if ($order) : ?>
            <h2><?= __('הזמנה', 'geffen') ?> #<?= $order_id ?></h2>
            <h3><?= __('פרטי הזמנה', 'geffen') ?></h3>
            <p><strong><?= __('שם לקוח', 'geffen') ?>:</strong> <?= esc_html($order->get_formatted_billing_full_name()) ?> <span>WPID: <span><?= $user_id ?></span></span></p>
            <p><strong><?= __('תאריך הזמנה', 'geffen') ?>:</strong> <span><?= $formatted_date ?></span></p>
            <p><strong><?= __('טלפון', 'geffen') ?>:</strong> <span><?= $geffen_phone ?></span></p>
            <p><strong><?= __('סכום הזמנה', 'geffen') ?>:</strong> <span><?= wc_price($order->get_total()) ?></span></p>
            <p><strong><?= __('סטטוס', 'geffen') ?>:</strong> <?= esc_html(wc_get_order_status_name($order->get_status())) ?></p>
            <?php
                $profile_crm_id = get_user_meta($user_id, 'user_crm_id', true);
                $custname_id = get_post_meta($order_id, 'CUSTNAME_ID', true);
                $user_crm_id = !empty($profile_crm_id) ? $profile_crm_id : $custname_id;
            ?>
            <p><strong><?= __('מספר לקוח', 'geffen') ?>:</strong> <?= !empty($user_crm_id) ? esc_html($user_crm_id) : 'לא מוגדר' ?></p>

            <?php if (empty($profile_crm_id)) : ?>
                <?php if (empty($custname_id)) : ?>
                    <form id="multiaccount_form">
                        <label for="reciepient_id"><?= __('בחר מספר לקוח', 'geffen') ?>:</label>
                        <select id="reciepient_id" name="reciepient_id" required>
                            <option value="">-- <?= __('בחר נמען', 'geffen') ?> --</option>
                            <?php if (!empty($users)) : ?>
                                <?php foreach ($users['value'] as $user) : ?>
                                    <?php
                                        $custname = isset($user['CUSTNAME']) ? htmlspecialchars($user['CUSTNAME']) : '';
                                        $firstname = isset($user['FGEF_FIRSTNAME']) ? htmlspecialchars($user['FGEF_FIRSTNAME']) : '';
                                        $lastname = isset($user['FGEF_LASTNAME']) ? htmlspecialchars($user['FGEF_LASTNAME']) : '';
                                        $fullName = trim($firstname . ' ' . $lastname);
                                        $displayText = !empty($fullName) ? $fullName . ' (' . $custname . ')' : $custname;
                                    ?>
                                    <option value="<?= $custname ?>"><?= $displayText ?></option>
                                <?php endforeach ?>
                            <?php else : ?>
                                <option value="" disabled><?= __('לא נמצאו משתמשים', 'geffen') ?></option>
                            <?php endif ?>
                        </select>
                        <input type="hidden" id="order_id" name="order_id" value="<?= $order_id ?>" required>
                        <input type="hidden" id="custname_nonce" value="<?= wp_create_nonce('add_custname_nonce') ?>">
                        <button type="submit"><?= __('שלח', 'geffen') ?></button>
                        <p id="response-message"></p>
                    </form>
                <?php endif ?>
            <?php endif ?>
        <?php else : ?>
            <p style="color:red;"><?= __('מזהה הזמנה לא חוקי. אנא נסה שוב.', 'geffen') ?></p>
        <?php endif ?>
    <?php else : ?>
        <p style="color:red;"><?= __('מזהה הזמנה לא חוקי. אנא נסה שוב.', 'geffen') ?></p>
    <?php endif ?>
</div>

<script>
jQuery(document).ready(function($) {
    $('#multiaccount_form').on('submit', function(e) {
        e.preventDefault(); // Prevent default form submission

        let order_id = $('#order_id').val();
        let reciepient_id = $('#reciepient_id').val();
        let nonce = $('#custname_nonce').val(); // Get the nonce value

        $.ajax({
            url: '/wp-admin/admin-ajax.php', // Direct AJAX URL
            type: 'POST',
            data: {
                action: 'add_custname_id',
                order_id: order_id,
                reciepient_id: reciepient_id,
                security: nonce // Include nonce
            },
            success: function(response) {
                $('#response-message').html(response.message).css('color', response.success ? 'green' : 'red');
                setTimeout(function() {
                    location.reload();
                }, 1000);
            },
            error: function() {
                $('#response-message').html('אירעה שגיאה. אנא נסה שוב.').css('color', 'red');
            }
        });
    });
});
</script>


<style>
    .order-lookup-container {
        max-width: 500px;
        margin: 20px auto;
        text-align: center;
    }
    .order-lookup-container p {
        display: grid;
        grid-template-columns: 140px 1fr 1fr;
        gap: 20px;
    }
    form {
        margin-bottom: 20px;
    }
    select, button {
        padding: 8px;
        margin-top: 10px;
        display: block;
        width: 100%;
    }
    button {
        background-color: #0073aa;
        color: white;
        border: none;
        cursor: pointer;
        text-align: center !important;
    }
    button:hover {
        background-color: #005177;
    }
</style>