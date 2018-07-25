<?php 

class Settimana {
    
    public $lunedi;
    public $martedi;
    public $mercoledi;
    public $giovedi;
    public $venerdi;
    public $sabato;
    public $domenica;

    public $giorno;
    public $giornoSettimana;

    public function __construct($giorno) {
        date_default_timezone_set("Europe/Rome");
        $this->giorno = $giorno;

        $giorno_settimana_numero = $this->giorno->format('N');    
        switch($giorno_settimana_numero) {
            case 1: $giorno_settimana = 'Lunedì'; break;
            case 2: $giorno_settimana = 'Martedì'; break;
            case 3: $giorno_settimana = 'Mercoledì'; break;
            case 4: $giorno_settimana = 'Giovedì'; break;
            case 5: $giorno_settimana = 'Venerdì'; break;
            case 6: $giorno_settimana = 'Sabato'; break;
            case 7: $giorno_settimana = 'Domenica'; break;
            default: $giorno_settimana = '-';
        }

        $this->giornoSettimana = $giorno_settimana;

        $differenzagiornilunedi = $giorno_settimana_numero - 1;
        $this->lunedi = clone $this->giorno;
        $this->lunedi->sub(new DateInterval("P".$differenzagiornilunedi."D"));

        $this->martedi = clone $this->giorno;
        $differenzagiornimartedi = $giorno_settimana_numero - 2;
        if($differenzagiornimartedi >=0) {
            $this->martedi->sub(new DateInterval("P".$differenzagiornimartedi."D"));
        } else {
            $this->martedi->add(new DateInterval("P".abs($differenzagiornimartedi)."D"));
        }

        $this->mercoledi = clone $this->giorno;
        $differenzagiornimercoledi = $giorno_settimana_numero - 3;
        if($differenzagiornimercoledi >=0) {
            $this->mercoledi->sub(new DateInterval("P".$differenzagiornimercoledi."D"));
        } else {
            $this->mercoledi->add(new DateInterval("P".abs($differenzagiornimercoledi)."D"));
        }

        $this->giovedi = clone $this->giorno;
        $differenzagiornigiovedi = $giorno_settimana_numero - 4;
        if($differenzagiornigiovedi >=0) {
            $this->giovedi->sub(new DateInterval("P".$differenzagiornigiovedi."D"));
        } else {
            $this->giovedi->add(new DateInterval("P".abs($differenzagiornigiovedi)."D"));
        }

        $this->venerdi = clone $this->giorno;
        $differenzagiornivenerdi = $giorno_settimana_numero - 5;
        if($differenzagiornivenerdi >=0) {
            $this->venerdi->sub(new DateInterval("P".$differenzagiornivenerdi."D"));
        } else {
            $this->venerdi->add(new DateInterval("P".abs($differenzagiornivenerdi)."D"));
        }

        $this->sabato = clone $this->giorno;
        $differenzagiornisabato = $giorno_settimana_numero - 6;
        if($differenzagiornisabato >=0) {
            $this->sabato->sub(new DateInterval("P".$differenzagiornisabato."D"));
        } else {
            $this->sabato->add(new DateInterval("P".abs($differenzagiornisabato)."D"));
        }

        $this->domenica = clone $this->giorno;
        $differenzagiornidomenica = $giorno_settimana_numero - 7;
        if($differenzagiornidomenica >=0) {
            $this->domenica->sub(new DateInterval("P".$differenzagiornidomenica."D"));
        } else {
            $this->domenica->add(new DateInterval("P".abs($differenzagiornidomenica)."D"));
        }        
    }
}

$oggi = new \DateTime();
//$oggi = new \DateTime('2017-12-31');

$settimana = new Settimana($oggi);

define('BR', "<br>\n");
echo "Il lunedì è: ".$settimana->lunedi->format('d/m/Y').BR;
echo "Il martedì è: ".$settimana->martedi->format('d/m/Y').BR;
echo "Il mercoledì è: ".$settimana->mercoledi->format('d/m/Y').BR;
echo "Il giovedì è: ".$settimana->giovedi->format('d/m/Y').BR;
echo "Il venerdì è: ".$settimana->venerdi->format('d/m/Y').BR;
echo "Il sabato è: ".$settimana->sabato->format('d/m/Y').BR;
echo "La domenica è: ".$settimana->domenica->format('d/m/Y').BR;