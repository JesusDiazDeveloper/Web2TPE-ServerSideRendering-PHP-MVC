{include file="header.tpl"}
<form action="addNew"  method="POST" class="row g-3" enctype="multipart/form-data">>
    <div class="col-md-6">
        <label for="inputEmail4" class="form-label"></label>
    
    
            <input name="name" type="text" class="form-control" placeholder="Nombre de la pelicula" required>
    
    
        </div>
    <div class="col-md-6">
        <label for="inputPassword4" class="form-label"></label>
    
    
            <input name="length" type="text" class="form-control" placeholder="duracion" required>
    
    
        </div>
    <div class="col-4">
        <label for="inputAddress" class="form-label"></label>

            <input name="image" type="file" id="imageToUpload" class="form-control"  placeholder="imagen" required>
    
    
        </div>
    <div class="col-4">
        <label for="inputAddress2" class="form-label"></label>
            
        
            <input name="director" type="text" class="form-control"  placeholder="director" required>
    
    
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
        <div class="col-12">
            <button type="submit" class="btn btn-primary">Enviar</button>
        </div>
</form>


{include file="footer.tpl"}