{include file="header.tpl"}


<form action="GenreModified/{$genre->id_genre}" method="POST" class="row g-3">
  <div class="col-md-6">
    <label for="inputEmail4" class="form-label"></label>


    <input name="genreName" type="text" value="{$genre->genreName}" class="form-control" placeholder="Nombre de la pelicula"
      required>


  </div>
  <div class="col-12">
    <div class="col-12 text-center">
      <button type="submit" class="btn btn-primary">Enviar</button>
    </div>

  </div>
</form>
{include file="footer.tpl"}