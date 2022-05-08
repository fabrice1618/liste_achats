<?php

function startHtml()
{

    $sReturn = <<<'EOD'
<!doctype html>
<html lang="en">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Bootstrap CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">

    <title>Shopping</title>
  </head>
  <body>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <a class="navbar-brand" href="/">
                <svg xmlns="http://www.w3.org/2000/svg" width="48" height="48" fill="currentColor" class="bi bi-cart4" viewBox="0 0 16 16">
                    <path d="M0 2.5A.5.5 0 0 1 .5 2H2a.5.5 0 0 1 .485.379L2.89 4H14.5a.5.5 0 0 1 .485.621l-1.5 6A.5.5 0 0 1 13 11H4a.5.5 0 0 1-.485-.379L1.61 3H.5a.5.5 0 0 1-.5-.5zM3.14 5l.5 2H5V5H3.14zM6 5v2h2V5H6zm3 0v2h2V5H9zm3 0v2h1.36l.5-2H12zm1.11 3H12v2h.61l.5-2zM11 8H9v2h2V8zM8 8H6v2h2V8zM5 8H3.89l.5 2H5V8zm0 5a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0zm9-1a1 1 0 1 0 0 2 1 1 0 0 0 0-2zm-2 1a2 2 0 1 1 4 0 2 2 0 0 1-4 0z"/>
                </svg>
                Shopping
            </a>
          <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
          </button>
          <div class="collapse navbar-collapse" id="navbarSupportedContent">
            <ul class="navbar-nav me-auto mb-2 mb-lg-0">
              <li class="nav-item mx-3">
                <a class="nav-link active" aria-current="page" href="/index.php">Ma liste</a>
              </li>
              <li class="nav-item mx-3">
                <a class="nav-link" href="/rayon.php">Rayons</a>
              </li>
              <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-bs-toggle="dropdown" aria-expanded="false">
                Archives
                </a>
                <ul class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <li><a class="dropdown-item" href="/archive.php">Archives</a></li>
                    <li><hr class="dropdown-divider"></li>
                    <li><a class="dropdown-item" href="/index.php">Archiver</a></li>
                </ul>
        </li>              
            </ul>
          </div>
        </div>
    </nav>

    <div class="container">
EOD;

    return($sReturn);
}


function endHtml()
{

    $sReturn = <<<'EOD'
</div>

<!-- Option 1: Bootstrap Bundle with Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
</body>
</html>
EOD;

    return($sReturn);
}

function ajoutItem()
{

    $sReturn = <<<'EOD'
    <div class="row">
        <form class="row g-3">
            <div class="col-auto">
              <label for="nouveau" class="visually-hidden">Nouveau</label>
              <input type="text" class="form-control" id="nouveau" placeholder="Nouveau" size="90">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
            </div>
        </form>
    </div>
EOD;

    return($sReturn);
}

function ajoutRayon()
{

    $sReturn = <<<'EOD'
    <div class="row">
        <form class="row g-3">
            <div class="col-auto">
              <label for="nouveau" class="visually-hidden">Nouveau</label>
              <input type="text" class="form-control" id="nouveau" placeholder="Nouveau rayon" size="90">
            </div>
            <div class="col-auto">
              <button type="submit" class="btn btn-primary mb-3">Ajouter</button>
            </div>
        </form>
    </div>
EOD;

    return($sReturn);
}

function startRayon($sName)
{
    $sReturn = <<<'EOD'
    <div class="row">
    <div class="col mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title mb-0">%s</h4>
            </div>
            <div class="card-body">
                <ul class="list-group list-group-flush">
EOD;

    $sReturn = sprintf($sReturn, $sName);

    return($sReturn);
}

function endRayon()
{

    $sReturn = <<<'EOD'
    </ul>
    </div>
</div>
</div>
</div>
EOD;

    return($sReturn);
}

function printTitre($sTitre)
{
    $sReturn = <<<'EOD'
    <div class="row mt-2 mb-3">
      <div class="col"></div>
      <div class="col-6 text-center">
        <h1>%s</h1>
      </div>
      <div class="col"></div>
    </div>
EOD;

    $sReturn = sprintf($sReturn, $sTitre);

    return($sReturn);
}
