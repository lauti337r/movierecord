<?php
/**
 * Created by PhpStorm.
 * User: lau_3
 * Date: 15/07/2016
 * Time: 16:44
 */
$mysqli = new mysqli("localhost","root","","w2w");
echo $mysqli->sqlstate;
echo $mysqli->connect_error;
echo $mysqli->connect_errno;