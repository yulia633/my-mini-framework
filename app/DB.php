<?php

declare(strict_types=1);

namespace App;

use PDO;

/**
 * DB connection
 */
final class DB
{
    /**
     * Get the PDO database connection
     *
     * @return mixed
     */
    final public static function getInstance()
    {
        static $db = null;

        if ($db === null) {
            $dsn = "mysql:host={$_ENV['MYSQL_HOST']};dbname={$_ENV['MYSQL_DATABASE']};charset=utf8";
            $db = new PDO($dsn, $_ENV['MYSQL_USER'], $_ENV['MYSQL_ROOT_PASSWORD']);

            $db->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        }

        return $db;
    }
}
