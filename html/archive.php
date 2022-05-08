<?php
require_once("view.php");

echo startHtml();
echo printTitre("Archives");
echo updateItem();

$sJson = file_get_contents('http://192.168.122.202:8001/archive/');
$aItems = json_decode($sJson, true);

$sCurRayon = "";
foreach ($aItems as $aItem) {
    if ($aItem['rayon'] != $sCurRayon ) {
        if ($sCurRayon != "" ) {
            echo endRayon();
        }
        echo startRayon($aItem['rayon']);
        $sCurRayon = $aItem['rayon'];
    }
    echo printArchive($aItem);
}
echo endRayon();

echo endHtml();

function printArchive($aItem)
{
    global $aRayons;
    
    $sReturn = <<<'EOD'
                    <li class="list-group-item d-flex justify-content-between">
                        <a href="%s" class="col-xs-11">
                            %s
                        </a>
                        
                        <div class="dropdown">
                            <button class="btn btn-secondary dropdown-toggle" type="button" id="dropdownMenuButton1" data-bs-toggle="dropdown" aria-expanded="false">
                              ...
                            </button>
                            <ul class="dropdown-menu" aria-labelledby="dropdownMenuButton1">
                              <li><a class="dropdown-item" href="%s">Modifier</a></li>
                              <li><a class="dropdown-item" href="%s">Supprimer</a></li>
                            </ul>
                        </div>
                    </li>
EOD;

    $sUrl = "#";

    $sReturn = sprintf(
        $sReturn, 
        $sUrl, 
        $aItem['item'], 
        $sUrl, 
        $sUrl
    );

    return($sReturn);
}
