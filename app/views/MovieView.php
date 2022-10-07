<?php
// require_once '../../libs/smarty-4.2.1/libs/Smarty.class.php';

class MovieView{
    // private $smarty;
    
    // function __construct()
    // {
    //     $smarty= new Smarty (); 
    //     $this->smarty
    // }

    function showMovies($movies){
        
        include 'templates/header.php';
        echo'<h1 class="prueba">prueba</h1>';
        echo "<h1>Lista De Peliculas Disponibles</h1>";
        echo '<table class="table">
    <thead>
    <tr>    
        <th scope="col">Nombre</th>
        <th scope="col">Director</th>
        <th scope="col">Duracion</th>
        <th scope="col">Genero</th>
        <th scope="col">Imagen</th>
        <th scope="col">Eliminar</th>
        <th scope="col">Modificar</th>
    </tr>
    </thead>';
    foreach ($movies as $movie) {
        echo "
        <tr>
            <td> $movie->nombre </td>;
            <td> $movie->director </td>;
            <td> $movie->duracion </td>;
            <td > me falta traer el genero </td>;
            <td> <img class='movieImg' src=".$movie->imagen." alt=".$movie->nombre."></td>;
            <td><a href='delete/$movie->id_movie'>Eliminar</a></td>; 
            <td><a href='modify/$movie->id_movie'>Modificar</a></td>; 
            </tr>
            ";
        }
        
        echo "</table>";
    require_once('templates/footer.php');
    }
}

