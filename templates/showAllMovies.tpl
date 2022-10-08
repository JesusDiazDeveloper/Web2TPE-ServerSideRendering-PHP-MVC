<h1>Lista De Peliculas Disponibles</h1>
<table class="table">
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
    </thead>    
    {foreach from=$movies item=$movie}
    <tr>
        <td> {$movie->name} </td>
        <td> {$movie->director}</td>
        <td> {$movie->length} </td>
        <td> {$movie->genre} </td>
        <td> <img class="movieImg" src="{$movie->image}" alt="{$movie->name}"></td>
        <td><a href='delete/{$movie->id_movie}'>Eliminar</a></td>
        <td><a href='modify/{$movie->id_movie}'>Modificar</a></td>
    </tr>
    {/foreach}

    </table>
