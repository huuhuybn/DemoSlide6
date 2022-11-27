<?php

class Database
{
    private static $db;

    function connect(): mysqli
    {
        $server = "sql.freedb.tech";
        $db_username = "freedb_huuhuybn";
        $db_password = "aCV!tVFA9Z!YftJ";
        $database = "freedb_doctruyen";
        if (static::$db == NULL) {
            static::$db = new mysqli(
                $server, $db_username, $db_password, $database);
        }
        return self::$db;
    }

}