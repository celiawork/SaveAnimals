<?php

const ID_STATUS_ADOPTION = 1;
const ID_STATUS_ADOPTED = 2;
const ID_STATUS_FALD = 5;
const ID_STATUS_DEAD = 6;

const TYPE_ACTU_NEWS = 1;
const TYPE_ACTU_ACTION = 3;
const TYPE_ACTU_EVENT = 2;

const ALERT_SUCCESS = 1;
const ALERT_DANGER = 2;
const ALERT_INFO = 3;


const COOKIE_PROTECT = 'timer'; 

// Récupérer le chemin absolu

define("URL",str_replace("index.php","",(isset($_SERVER["HTTPS"])? "https" : "http"). "://$_SERVER[HTTP_HOST]$_SERVER[PHP_SELF]"));

?>





