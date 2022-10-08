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
    $query = $db->prepare("SELECT a.id_movie, a.name, a.image,a.length,a.director ,b.name AS genre
    FROM peliculas a
    INNER JOIN genero b
    ON a.fk_genre_id = id_genre"); 
    $query->execute();

    //obtengo los resultados CON FETCH 
    $results = $query->fetchAll(PDO::FETCH_OBJ);
    // var_dump($results);
    return $results;
}
function deleteById($id){

    $db = $this->getDB();
    $query = $db->prepare('DELETE FROM peliculas WHERE id_movie = ?');
    $query->execute([$id]);  
    

}
function addMenu{
    $this->view->showAddMenuForm();
}


}