<?php

session_start();

define('PATH_SYSTEM', __DIR__ . '/../system');
define('PATH_APPLICATION', __DIR__ . '/../application');
define('PATH_ROOT', __DIR__ );
define('NAME_APPLICATION', 'frontend');

include_once PATH_SYSTEM . '/core/CoreCommon.php';

$conmon = new CoreCommon();
$conmon->load();