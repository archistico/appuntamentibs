<?php 
define('BR', "<br>\n");
date_default_timezone_set("Europe/Rome");
//$oggi = (new \DateTime())->format('Y-m-d H:i:s');
$oggi = new \DateTime();

// Se devo fissare una data per test
$oggi = new \DateTime("2018-03-01 10:00:00");

$oggi_settimana_numero = $oggi->format('N');

switch($oggi_settimana_numero) {
    case 1: $oggi_settimana = 'Lunedì'; break;
    case 2: $oggi_settimana = 'Martedì'; break;
    case 3: $oggi_settimana = 'Mercoledì'; break;
    case 4: $oggi_settimana = 'Giovedì'; break;
    case 5: $oggi_settimana = 'Venerdì'; break;
    case 6: $oggi_settimana = 'Sabato'; break;
    case 7: $oggi_settimana = 'Domenica'; break;
    default: $oggi_settimana = '-';
}

echo "Oggi: ".$oggi->format('Y-m-d H:i:s').BR;
echo "Oggi è il giorno: ".$oggi_settimana.BR;

// per cui se ad esempio oggi è 3 (mer) per arrivare a lunedì devo andare indietro di 2 giorni
$differenzagiornilunedi = $oggi_settimana_numero - 1;
$lunedi = clone $oggi;
$lunedi->sub(new DateInterval("P".$differenzagiornilunedi."D"));

$martedi = clone $oggi;
$differenzagiornimartedi = $oggi_settimana_numero - 2;
if($differenzagiornimartedi >=0) {
    $martedi->sub(new DateInterval("P".$differenzagiornimartedi."D"));
} else {
    $martedi->add(new DateInterval("P".abs($differenzagiornimartedi)."D"));
}

$mercoledi = clone $oggi;
$differenzagiornimercoledi = $oggi_settimana_numero - 3;
if($differenzagiornimercoledi >=0) {
    $mercoledi->sub(new DateInterval("P".$differenzagiornimercoledi."D"));
} else {
    $mercoledi->add(new DateInterval("P".abs($differenzagiornimercoledi)."D"));
}

$giovedi = clone $oggi;
$differenzagiornigiovedi = $oggi_settimana_numero - 4;
if($differenzagiornigiovedi >=0) {
    $giovedi->sub(new DateInterval("P".$differenzagiornigiovedi."D"));
} else {
    $giovedi->add(new DateInterval("P".abs($differenzagiornigiovedi)."D"));
}

$venerdi = clone $oggi;
$differenzagiornivenerdi = $oggi_settimana_numero - 5;
if($differenzagiornivenerdi >=0) {
    $venerdi->sub(new DateInterval("P".$differenzagiornivenerdi."D"));
} else {
    $venerdi->add(new DateInterval("P".abs($differenzagiornivenerdi)."D"));
}

$sabato = clone $oggi;
$differenzagiornisabato = $oggi_settimana_numero - 6;
if($differenzagiornisabato >=0) {
    $sabato->sub(new DateInterval("P".$differenzagiornisabato."D"));
} else {
    $sabato->add(new DateInterval("P".abs($differenzagiornisabato)."D"));
}

$domenica = clone $oggi;
$differenzagiornidomenica = $oggi_settimana_numero - 7;
if($differenzagiornidomenica >=0) {
    $domenica->sub(new DateInterval("P".$differenzagiornidomenica."D"));
} else {
    $domenica->add(new DateInterval("P".abs($differenzagiornidomenica)."D"));
}


echo "Il lunedì è: ".$lunedi->format('Y-m-d').BR;
echo "Il martedì è: ".$martedi->format('Y-m-d').BR;
echo "Il mercoledì è: ".$mercoledi->format('Y-m-d').BR;
echo "Il giovedì è: ".$giovedi->format('Y-m-d').BR;
echo "Il venerdì è: ".$venerdi->format('Y-m-d').BR;
echo "Il sabato è: ".$sabato->format('Y-m-d').BR;
echo "La domenica è: ".$domenica->format('Y-m-d').BR;