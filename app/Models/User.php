<?php

declare(strict_types=1);

namespace App\Models;

use PDO;
use App\DB;

/**
 * Example user model
 */
class User
{
    /**
     * Get all the users as an associative array
     *
     * @return array
     */
    public static function getAll()
    {
        $sql = "SELECT * FROM users";
        $stm = DB::getInstance()->prepare($sql);
        $stm->execute();

        return $stm->fetchAll(PDO::FETCH_ASSOC);
    }
}
