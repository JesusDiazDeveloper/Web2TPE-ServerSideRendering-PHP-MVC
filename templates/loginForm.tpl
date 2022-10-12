{include file="header.tpl"}

<div class="mt-5 w-25 mx-auto text-light ">
    <form method="POST" action="validate">
        <div class="form-group">
            <label for="email" >Email</label>
            <input type="email" required class="form-control" id="email" name="email" aria-describedby="emailHelp">
        </div>
        <div class="form-group">
            <label for="password">Password</label>
            <input type="password" required class="form-control" id="password" name="password">
        </div>

        {if $error} 
            <div class="alert alert-danger mt-3">
                {$error}
            </div>
        {/if}
        <div class="text-center">
            <button type="submit" class="btn btn-primary mt-3">Entrar</button>
        </div>
    </form>
</div>


{include file="footer.tpl"}