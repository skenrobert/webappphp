<?php 

class DB {

    public static $instancia = null; //conection with data base
    public static function crearInstancia(){

        if(!isset(self::$instancia)){

            $opcions[PDO::ATTR_ERRMODE] = PDO::ERRMODE_EXCEPTION;
            // self::$instancia = new PDO('mysql:host=localhost;dbname=mysql', 'root','mysql',$opcions); 
            self::$instancia = new PDO('mysql:host=server_mysql;dbname=mysql', 'root','mysql',$opcions); 
            echo"conectado..";
        }
        return self::$instancia;

    }




}


?>