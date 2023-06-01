<?php

class DB
{   
    //CONFIG DO CONNECT
    public static function connect()
    {
        $host = 'localhost';
        $user = 'id20846035_futcards_bd';
        $pass = 'Futcards@123';
        $base = 'id20846035_futcards';

        return new PDO("mysql:host={$host};dbname={$base};charset=UTF8;", $user, $pass);
    }
}