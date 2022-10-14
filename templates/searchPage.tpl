{include file = 'header.tpl'}

<form action="searchByGenre" method="POST" class="row g-3">
    <div class="col-md-6 d-flex flex-md-column align-items-center">
        <div class="col-md-4">
            <label for="inputState" class="form-label text-white"></label>
            <select id="inputState" class="form-select" name="id_genre" required>
                {foreach from=$genres item=$genre}

                    <option value="{$genre->id_genre}" selected>{$genre->genreName}</option>

                {/foreach}
            </select>
        </div>
        <div class="col-12">
            <div class="col-12 text-center p-4">
                <button type="submit" class="btn btn-primary">Enviar</button>
            </div>
        </div>
    </div>

</form>


{include file="footer.tpl"}