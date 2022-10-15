{include file = 'header.tpl'}

<h1 class="text-white" >Lista De Generos Disponibles</h1>
<table class="table">
    <thead>
        <tr class="text-white">
            <th scope="col">Nombre</th>
            <th scope="col">Ver Mas</th>
            {if isset($smarty.session.USER_ID)}
                <th scope="col">Eliminar</th>
                <th scope="col">Modificar</th>
            {/if}
        </tr>
    </thead>    
    {foreach from=$genres item=$genre}
    <tr class="text-white">
        <td>  {$genre->genreName}  </td>
        <td><a type="button" class="btn btn-primary" href='showOneGenre/{$genre->id_genre}'>Ver Mas</a></td>

        {if isset($smarty.session.USER_ID)}
            {* Aca muestro si hice sesion el boton login  *}
            <td><a type="button" class="btn btn-primary" href='deleteGenre/{$genre->id_genre}'>Eliminar</a></td>
            <td><a href='modifyGenre/{$genre->id_genre}' class="btn btn-primary">Modificar</a></td>
        
        {/if}

    </tr>
    {/foreach}

    </table>


    {include file = 'footer.tpl'}

    