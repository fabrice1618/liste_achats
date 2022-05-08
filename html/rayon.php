<?php
require_once("view.php");

echo startHtml();
echo printTitre("Les rayons");

echo ajoutRayon();

echo startListeRayons();

$sJson = file_get_contents('http://192.168.122.202:8001/rayon/');
$aRayons = json_decode($sJson, true);

foreach ($aRayons as $aRayon) {
    echo printRayon($aRayon);
}

echo endListeRayons();

echo endHtml();


function printRayon($aRayon)
{
   
    $sReturn = <<<'EOD'
                    <li class="list-group-item d-flex justify-content-between">
                        <a href="%s" class="col-xs-11">
                            %s
                            %s
                        </a>
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              ...
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="%s">Modifier</a></li>
                              <li><a class="dropdown-item" href="%s">Supprimer</a></li>
                              <li><hr class="dropdown-divider"></li>                                      
                              <li><a class="dropdown-item" href="%s">Monter</a></li>
                              <li><a class="dropdown-item" href="%s">Descendre</a></li>
                            </ul>
                        </div>
                    </li>
EOD;

    $sUrl = "#";
    $sRayon = $aRayon['rayon'];
    $sParDefaut = $aRayon['defaut'] ? '<span class="badge bg-primary ms-2">Par défaut</span>' : '';

    $sReturn = sprintf(
        $sReturn, 
        $sUrl, 
        $sRayon,
        $sParDefaut,
        $sUrl, 
        $sUrl,
        $sUrl, 
        $sUrl
    );

    return($sReturn);
}


function startListeRayons()
{
    $sReturn = <<<'EOD'
<div class="row">
<div class="col mt-3">
    <div class="card">
        <div class="card-header">
            <h4 class="card-title mb-0">La liste des rayons</h4>
        </div>
        <div class="card-body">
            <ul class="list-group list-group-flush">
EOD;

    return($sReturn);
}

function endListeRayons()
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