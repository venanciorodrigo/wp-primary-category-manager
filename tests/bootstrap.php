<?php
// First we need to load the composer autoloader so we can use WP Mock
require_once __DIR__ . '/../vendor/autoload.php';

require_once __DIR__ . '/../includes/functions/utils.php';

WP_Mock::setUsePatchwork(true);
WP_Mock::bootstrap();