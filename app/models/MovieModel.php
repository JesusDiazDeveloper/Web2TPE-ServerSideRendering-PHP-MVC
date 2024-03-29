<?php

class MovieModel
{

    private $db;

    public function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;' . 'dbname=db_movies;charset=utf8', 'root', '');
    }


    function showAll()
    {

        $query = $this->db->prepare("SELECT a.id_movie, a.movieName, a.movieImage,a.movieLength,a.director ,b.genreName AS genre
    FROM peliculas a
    INNER JOIN genero b
    ON a.fk_genre_id = id_genre");
        $query->execute();

        //obtengo los resultados CON FETCH 
        $results = $query->fetchAll(PDO::FETCH_OBJ);
        return $results;
    }
    function deleteById($id)
    {

        $query = $this->db->prepare('DELETE FROM peliculas WHERE id_movie = ?');
        $query->execute([$id]);
    }

    public function addNew($name, $image, $length, $director, $fk_genre_id)
    {
        $pathImg= $this->uploadImage($image);
        $query = $this->db->prepare("INSERT INTO peliculas ( movieName , movieImage, movieLength, director, fk_genre_id) VALUES (?, ?, ?, ?, ?)");
        $query->execute([$name, $pathImg, $length, $director, $fk_genre_id]);
        return $this->db->lastInsertId(); //nos devuelve el id del último elemento insertado
    }

    private function uploadImage($image){
        $target='imgs/movies/'.uniqid().'.jpg';
        move_uploaded_file($image, $target);
        return $target;
    }

    function getOneItem($id)
    {
        $query = $this->db->prepare("SELECT a.id_movie, a.movieName, a.movieImage,a.movieLength,a.director ,b.genreName AS genre
    FROM peliculas a
    INNER JOIN genero b
    ON a.fk_genre_id = id_genre WHERE id_movie = ?");
        $query->execute([$id]);

        $result = $query->fetch(PDO::FETCH_OBJ);
        return $result;
    }

    function modifyItem($id, $name, $image, $length, $director, $genre)
    {
        $pathImg= $this->uploadImage($image);
        // $genre = intval($genre);
        // $id = intval($id);

        $query = $this->db->prepare("UPDATE peliculas SET movieName=?,movieImage=?,movieLength=?,director=?,fk_genre_id=? WHERE id_movie=?");
        return $query->execute([$name, $pathImg, $length, $director, $genre, $id]);

    }
    function getAllMoviesByGenre($id)
    {
        $query = $this->db->prepare("SELECT a.id_movie, a.movieName, a.movieImage,
        a.movieLength,a.director ,b.genreName AS genre
        FROM peliculas a
        INNER JOIN genero b
        ON a.fk_genre_id = id_genre WHERE fk_genre_id = ?" );
        $query->execute([$id]);
        return $query->fetchAll(PDO::FETCH_OBJ);
    }
}
