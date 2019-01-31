<?php

require __DIR__ . '/vendor/autoload.php';

if(!isset($argv[1])) {
    echo "Usage php index.php <URL>\n";
} else {
    $app = new \App\App($argv[1], __DIR__);
}