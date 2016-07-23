<?php

use Doctrine\Common\Annotations\AnnotationRegistry;
use Composer\Autoload\ClassLoader;

/**
 * @var ClassLoader $loader
 */
$loader = require __DIR__.'/../vendor/autoload.php';

$db = new mysqli("localhost","root","","w2w");

AnnotationRegistry::registerLoader([$loader, 'loadClass']);

return $loader;
