<?php

/**
 * Class database
 * This class is for connecting with a database with PDO
 */
class Database
{

    /**
     * @var PDO
     */
    private static $pdo;

    /**
     * @param PDO $a_pdo PDO instance
     *
     * @return void
     */
    public static function setConnection( PDO $a_pdo )
    {
        self::$pdo = $a_pdo;

    } # function setConnection(...)

    /**
     * @return PDO
     */
    public static function getConnection()
    {
        return self::$pdo;

    } # function getConnection()

} # class