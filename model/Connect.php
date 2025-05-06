<?php

 
namespace Model;

abstract class Connect {//? ABSTRACT, SON UTILITE ? utiliser plusieurs nom// 

    const HOST = "localhost";// accès à la base de donnée locale, par la constante HOST//
    const DB = "filmsbd";
    const USER = "root";
    const PASS = "";

    public static function seConnecter() {
        try {// ? STATIC , POURQUOI ?//
            return new \PDO(
                "mysql:host=".self::HOST.";dbname=".self::DB.";charset=utf8", self::USER, self::PASS);
        }
         catch(\PDOException $ex) {// $ex
            return $ex->getMessage();
        }

    }
}

