<?php

class MovieModel{


    
    function getDB(){
        //guardo la conexion en una variable 
        $db = new PDO('mysql:host=localhost;'.'dbname=db_movies;charset=utf8', 'root', '');
        return $db;
    }
    
    function showAll(){
        //abro la conexion a la db
        $db = $this->getDB();
    
        //ejecuto la sentencia en 2 subpasos
        $query = $db->prepare("SELECT * FROM peliculas"); 
        $query->execute();
    
        //obtengo los resultados CON FETCH 
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }


}