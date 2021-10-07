<?php

$devMode = false;

if($devMode) {
    error_reporting(-1);
    ini_set("display_errors", 1);
}

spl_autoload_register(function ($class_name) {
    include 'classes/' . $class_name . '.class.php';
});

    // Anslutsinställningar vid utveckling
if($devMode) {
    define("DBHOST", "localhost");
    define("DBUSER", "moment5");
    define("DBPASS", "password");
    define("DBDATABASE", "moment5");
} else {
    // Anslutsinställningar live
    define("DBHOST", "studentmysql.miun.se");
    define("DBUSER", "many2005");
    define("DBPASS", "bmMeHdbTLm");
    define("DBDATABASE", "many2005");
}