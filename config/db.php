<?php
class DB
{
    //Conexión____________________________________________________________________________________________________________________________________________________
    public static function connect()
    {
        $db = new mysqli(HOST, DB_USER, DB_PASS, DB_NAME);
        return $db;
    }
}
//________________________________________________________________________________________________________________________________________________________________
