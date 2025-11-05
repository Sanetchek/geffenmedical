<?php

if (! defined('WPINC')) {
	die;
}

require __DIR__ . '/vendor/autoload.php';


define('GEFFEN_CERT_FILE', trailingslashit(dirname(__FILE__)) . 'keys/Certs.p12' );