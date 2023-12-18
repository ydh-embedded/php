<?php
if(!defined('DB_NAME')) define('DB_NAME', 'firma');
define('DB_HOST', 'localhost');
define('DB_CHARSET', 'utf8');
define('DB_USER', 'php-user');
define('DB_PASSWORD', 'p/wJ1GZn3Qy(ltWI');

try {
  $pdo = new PDO( 'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=' . DB_CHARSET, DB_USER, DB_PASSWORD );
} catch(PDOException $e) {
  die('ERROR:<br>' . $e->getMessage());
}