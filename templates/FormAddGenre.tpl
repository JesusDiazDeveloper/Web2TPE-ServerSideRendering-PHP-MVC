{include file="header.tpl"}
<div>
    <form action="addNewGenre" method="POST" class="row g-3">
        <div class="col-md-6">
            <label for="inputEmail4" class="form-label"></label>


            <input name="genreName" type="text" class="form-control" placeholder="Nombre del Genero" required>


        </div>
        <div class="col-md-6">
            <label for="inputPassword4" class="form-label"></label>
            <div class="col-12">
                <div class="col-12">
                    <button type="submit" class="btn btn-primary">Enviar</button>
                </div>
            </div>
    </form>

</div>

{include file="footer.tpl"}