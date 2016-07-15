<?php
/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 13/07/2016
 * Time: 16:35
 */

require_once(dirname(__FILE__).'/../config/ProjectConfiguration.class.php');

$configuration = ProjectConfiguration::getApplicationConfiguration('frontend', 'prod', false);
sfContext::createInstance($configuration)->dispatch();