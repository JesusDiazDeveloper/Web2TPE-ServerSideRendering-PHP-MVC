{include file="header.tpl"}

<form action="modified/{$movie->id_movie}"  method="POST" class="row g-3"enctype="multipart/form-data">
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label"></label>
    
    
            <input name="name" type="text" value="{$movie->movieName}" class="form-control" placeholder="Nombre de la pelicula" required>
    
    
        </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label"></label>
    
    
            <input name="length" type="text" value="{$movie->movieLength}"class="form-control" placeholder="duracion" required>
    
    
        </div>
    <div class="col-4">
        <label for="inputAddress" class="form-label"></label>

        <input name="image" type="file" id="imageToUpload" class="form-control"  placeholder="imagen" required>
            {* <input name="image" type="text" value="{$movie->movieImage}"class="form-control"  placeholder="imagen" required> *}
    
    
        </div>
    <div class="col-4">
        <label for="inputAddress2" class="form-label"></label>
            
        
            <input name="director" type="text" value="{$movie->director}"class="form-control"  placeholder="director" required>
    
    
        </div>
    <div class="col-md-4">
        <label for="inputState" class="form-label text-white"></label>
        <select id="inputState" class="form-select" name="fk_genre_id" required >
        {foreach from=$genres item=$genre}
    
            <option value="{$genre->id_genre}" selected>{$genre->genreName}</option>
    
        {/foreach}
        </select>
    </div>
    <div class="col-12" >
    <div class="col-12 text-center">
    <button type="submit" class="btn btn-primary">Enviar</button>
    </div>
    
    </div>
        </form>


{include file="footer.tpl"}