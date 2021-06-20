<?php
//load config
require_once "config/config.php";
require_once "helpers/ip_address_helper.php";
require_once "helpers/sql_query_helper.php";
require_once "helpers/url_helper.php";
require_once "helpers/mail_helper.php";
require_once "helpers/session_helper.php";
require_once "helpers/time_helper.php";
//AUTO LOAD CORE
spl_autoload_register(function ($className) {
  require_once "libraries/" . $className . ".php";
});

//create db schema
$schema = new Schema();