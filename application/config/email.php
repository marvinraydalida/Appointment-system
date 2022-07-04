<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$config = array(
    'protocol'=>'smtp',
    'smtp_host' => 'smtp.gmail.com',
    'smtp_port' => 587,
    'smtp_crypto' => 'tls',
    'smtp_user' => $_ENV['SMTP_USER'],
    'smtp_pass' => $_ENV['SMTP_PASS'],
    'newline' => "\r\n"
);