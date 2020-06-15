<?php
require_once realpath("config.php");
require_once realpath("vendor/autoload.php");
use Source\Core\Core;

$core = new Core();

$core->run();

?>