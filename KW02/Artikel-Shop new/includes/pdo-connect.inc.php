<?php

//if (!defined('DB_NAME')) define('DB_NAME', 'firma');

if (!defined('DB_NAME'))

//?   define('DB_NAME', 'firma_kw02');
      define('DB_NAME', 'shop');
      define('DB_HOST', 'localhost');
      define('DB_CHARSET', 'utf8');
      define('DB_USER', 'php-user');
//?   define('DB_PASSWORD', 'user');
      define('DB_PASSWORD', '+Schenker1');


try {

  $pdo = new PDO
  (
    dsn:      'mysql:dbname=' . DB_NAME . ';host=' . DB_HOST . ';charset=' . DB_CHARSET,
    username: DB_USER,
    password: DB_PASSWORD,
    options:
        [
          PDO::ATTR_ERRMODE                     => PDO::ERRMODE_EXCEPTION,
          PDO::ATTR_DEFAULT_FETCH_MODE          => PDO::FETCH_ASSOC,
          PDO::ATTR_EMULATE_PREPARES            => false,
          PDO::MYSQL_ATTR_USE_BUFFERED_QUERY    => true,
          PDO::ATTR_AUTOCOMMIT                  => true,
        ]
  );

} catch (PDOException $e) {
          die('ERROR:<br>' . $e->getMessage());
}


include_once(__DIR__ . "/db.php");
db($pdo);
