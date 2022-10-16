<nav class="navbar navbar-expand-lg bg-dark ">
    <div class="container-fluid ">
        <a class="navbar-brand text-primary" href="home">Peliculas.com</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
            aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse " id="navbarNavDropdown">
            <ul class="navbar-nav d-flex">
                <li class="nav-item">
                    <a class="nav-link active text-white" aria-current="page" href="home">Home</a>
                </li>
X                <li class="nav-item">
                    <a class="nav-link text-white" href="searchMenu">Pelis por Genero</a>
                </li>
X                <li class="nav-item">
                    <a class="nav-link text-white" href="showAllGenres">Generos</a>
                </li>

                {if !isset($smarty.session.USER_ID)} 
                    {* Aca muestro si no hice sesion el boton login  *}
                    <li class="nav-item">
                        <a class="nav-link text-white " href="login">Login</a>
                    </li>
                    {else}
                    {* Si esta seteado quiere decir que estoy logueado, me muestra el logout *}
                    <li class="nav-item dropdown ">
                        <a class="nav-link dropdown-toggle text-white" href="#" role="button"
                         data-bs-toggle="dropdown"aria-expanded="false">
                            Acciones del Administrador
                        </a>
                        <ul class="dropdown-menu">
                            <li><a class="dropdown-item" href="addMovie">Agregar Pelicula</a></li>
                            <li><a class="dropdown-item" href="addGenre">Agregar Genero</a></li>
                            <li class="nav-item">
                                <a class="nav-link text-dark " href="logout">Logout</a>
                            </li>
                        </ul>
                    </li>
                {/if}

            </ul>
        </div>
    </div>
</nav>