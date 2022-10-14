{include file="header.tpl"}

<div class="card mb-3" style="max-width: 540px;">
  <div class="row g-0">
    <div class="col-md-4">
      <img src="{$movie->movieImage}" class="img-fluid rounded-start " alt="{$movie->movieName}">
    </div>
    <div class="col-md-8">
      <div class="card-body">
        <h5 class="card-title">{$movie->movieName}</h5>
        <p class="card-text"><small class="text-muted font-weight-bold">Genero:</small></p>
        <p class="card-text">{$movie->genre}</p>
        <p class="card-text"><small class="text-muted font-weight-bold">Duracion:</small></p>
        <p class="card-text">{$movie->movieLength}</p>
        <p class="card-text"><small class="text-muted font-weight-bold">Director:</small></p>
        <p class="card-text">{$movie->director}</p>
      </div>
    </div>
  </div>
</div>

{include file="footer.tpl"}