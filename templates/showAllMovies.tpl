{include file = 'header.tpl'}

<h1 class="text-white" >Lista De Peliculas Disponibles</h1>
<table class="table">
    <thead>
        <tr class="text-white">
            <th scope="col">Nombre</th>
            <th scope="col">Director</th>
            <th scope="col">Duracion</th>
            <th scope="col">Genero</th>
            <th scope="col">Imagen</th>
            <th scope="col">Ver Mas</th>
            {if isset($smarty.session.USER_ID)}
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
            {/if}
        </tr>
    </thead>    
    {foreach from=$movies item=$movie}
    <tr class="text-white">
        <td> {$movie->movieName} </td>
        <td> {$movie->director}</td>
        <td> {$movie->movieLength} </td>
        <td> {$movie->genre} </td>
        <td> <img class="movieImg" src="{$movie->movieImage}" alt="{$movie->movieName}"></td>
        <td><a type="button" class="btn btn-primary" href='showOne/{$movie->id_movie}'>Ver Mas</a></td>

        {if isset($smarty.session.USER_ID)}
            {* Aca muestro si hice sesion el boton login  *}
            <td><a type="button" class="btn btn-primary" href='delete/{$movie->id_movie}'>Eliminar</a></td>
            <td><a href='modify/{$movie->id_movie}' class="btn btn-primary">Modificar</a></td>
        
        {/if}

    </tr>
    {/foreach}

    </table>


    {include file = 'footer.tpl'}