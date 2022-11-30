<?php
require_once(__DIR__.'/get_user_ip.php');
require_once(__DIR__.'/../config.php');
if (!in_array(getUserIP(), IP_WHITE_LIST)) {
    header('location: /admin/index.php');
    exit;
}