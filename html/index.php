<?php
require_once("view.php");

echo startHtml();
echo printTitre("Ma liste");
echo ajoutItem();

$sJson = file_get_contents('http://192.168.122.202:8001/liste/');
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
    echo printItem($aItem);
}
echo endRayon();

echo endHtml();


function printItem($aItem)
{
    
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
                              <li><a class="dropdown-item" href="%s">%s</a></li>
                              <li><hr class="dropdown-divider"></li>                                      
                              <li><a class="dropdown-item" href="%s">Modifier</a></li>
                              <li><a class="dropdown-item" href="%s">Supprimer</a></li>
                              <li><hr class="dropdown-divider"></li>                                      
                              <li>
                                <form class="px-4 py-3">
                                    <div class="mb-3">
                                        %s
                                    </div>
                                    <button type="submit" class="btn btn-primary">OK</button>
                                </form>                                        
                              </li>
                            </ul>
                        </div>
                    </li>
EOD;

    $sUrl = "#";
    if ($aItem['coche']) {
        $sItem = "<del>" . $aItem['item'] . "</del>";
        $sActionCoche = "Décocher";
        $sUrlCoche = "#";
    } else {
        $sItem = $aItem['item'];
        $sActionCoche = "Cocher";
        $sUrlCoche = "#";
    }

    $sReturn = sprintf(
        $sReturn, 
        $sUrl, 
        $sItem, 
        $sUrlCoche, 
        $sActionCoche, 
        $sUrl, 
        $sUrl,
        selectRayon($aItem['rayon'])
    );

    return($sReturn);
}

function selectRayon($sRayon )
{

    $sJson = file_get_contents('http://192.168.122.202:8001/rayon/');
    $aRayons = json_decode($sJson, true);
    
    $sReturn = '<select class="form-select form-select-sm" aria-label=".form-select-sm example">' . PHP_EOL;
    foreach ($aRayons as $aRayon) {
        $sReturn .= sprintf( 
            '<option value="%d" %s>%s</option>', 
            $aRayon['rayonid'], 
            ($aRayon['rayon'] == $sRayon) ? "selected": "", 
            $aRayon['rayon'] 
        ) . PHP_EOL;
    }

    $sReturn .= '</select>';

    return($sReturn);
}

