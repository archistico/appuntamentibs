<?php

function CognomeNome() {
    $nomi = [
        "Emilie",
        "Luca",
        "Luana",
        "Erika",
        "Elettra",
        "Marco",
        "Alessandro",
        "Mirko",
        "Daniela",
        "Giuseppe",
        "Marisa",
        "Marie",
        "Eloise",
        "Sandro",
        "Tania",
        "Elena",
        "Claudio",
        "Alessio",
        "Beatrice",
        "Carlo",
        "Chiara",
        "Federico",
        "Giuliana",
        "Ilario",
        "Laura",
        "Maurizio",
        "Nicola",
        "Paolo",
        "Giulio",
        "Giorgio",
        "Ivan",
        "Luciano"
    ];
    
    $cognomi = [
        "Rollandin",
        "Laurent",
        "Peaquin",
        "Rossi",
        "Veneri",
        "Tomelleri",
        "Tammone",
        "Sabatino",
        "Groppo",
        "Verdi",
        "Lorenzin",
        "Badole",
        "Filippesi",
        "Toffanin",
        "Gallo",
        "Bianchi",
        "Bich",
        "Stella"
    ];

    if(rand(0,10)>8) {
        return "";
    }
    return $cognomi[rand(0,count($cognomi)-1)]." ".$nomi[rand(0,count($nomi)-1)];
}

function Note() {
    $note = [
        "","","","","","","","","","","","","","","","","",
        "Mutua",
        "Punti",
        "Urgente"
    ];
    
    $casuale = rand(0,count($note)-1);
    if($note[$casuale]) {
        return "(".$note[$casuale].")";
    } else {
        return "";
    }
}

class Orario {
    public $giorno;
    public $ora;
    public $attivo;

    public function __construct($giorno, $ora, $attivo) {
        $this->giorno = $giorno;
        $this->ora = $ora;
        $this->attivo = $attivo;
    }
}

class ListaOrari {
    public $orari;

    public function __construct() {
        $this->orari = [];
    }

    public function Add($orario) {
        $this->orari[] = $orario;
    }

    public function Filtra($giorno) {
        $filtro = [];
        foreach($this->orari as $orario) {
            if($orario->giorno == $giorno) {
                $filtro[] = $orario;
            }
        }
        return $filtro;
    }
        
}

class Appuntamento {
    public $orario;
    public $cognomenome;
    public $note;

    public function __construct($orario, $cognomenome, $note) {
        $this->orario = $orario;
        $this->cognomenome = $cognomenome;
        $this->note = $note;
    }
}

$orari = [
    "8:00","8:15","8:30","8:45",
    "9:00","9:15","9:30","9:45",
    "10:00","10:15","10:30","10:45",
    "11:00","11:15","11:30","11:45",
    "12:00","12:15","12:30","12:45",
    "13:00","13:15","13:30","13:45",
    "14:00","14:15","14:30","14:45",
    "15:00","15:15","15:30","15:45",
    "16:00","16:15","16:30","16:45",
    "17:00","17:15","17:30","17:45",
    "18:00","18:15","18:30","18:45",
    "19:00","19:15","19:30","19:45"        
];

$giorni = [
    "Lunedì", "Martedì", "Mercoledì", "Giovedì", "Venerdì"
];

$listaOrari = new ListaOrari();
foreach($giorni as $giorno) {
    foreach($orari as $orario) {
        $listaOrari->Add(new Orario($giorno, $orario, true));
    }
}

class Settimana {
    
    public $lunediPrecedente;
    public $lunediSuccessivo;

    public $lunedi;
    public $martedi;
    public $mercoledi;
    public $giovedi;
    public $venerdi;
    public $sabato;
    public $domenica;

    public $lunediOggi;
    public $martediOggi;
    public $mercolediOggi;
    public $giovediOggi;
    public $venerdiOggi;
    public $sabatoOggi;
    public $domenicaOggi;

    public $giorno;
    public $giornoSettimana;

    public function __construct($giorno = null) {
        date_default_timezone_set("Europe/Rome");
        
        if(is_null($giorno)) {
            $this->giorno = new \Datetime();
        } else {
            $this->giorno = $giorno;
        }

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

        $this->lunediPrecedente = clone $this->lunedi;
        $this->lunediPrecedente->sub(new DateInterval("P7D"));

        $this->lunediSuccessivo = clone $this->lunedi;
        $this->lunediSuccessivo->add(new DateInterval("P7D"));

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
        
        // Calcola il boolean se oggi è una delle date della settimana
        $oggi = new \DateTime();

        if($oggi->format('d/m/Y')==$this->lunedi->format('d/m/Y')) {
            $this->lunediOggi = true;
        } else {
            $this->lunediOggi = false;
        }

        if($oggi->format('d/m/Y')==$this->martedi->format('d/m/Y')) {
            $this->martediOggi = true;
        } else {
            $this->martediOggi = false;
        }

        if($oggi->format('d/m/Y')==$this->mercoledi->format('d/m/Y')) {
            $this->mercolediOggi = true;
        } else {
            $this->mercolediOggi = false;
        }

        if($oggi->format('d/m/Y')==$this->giovedi->format('d/m/Y')) {
            $this->giovediOggi = true;
        } else {
            $this->giovediOggi = false;
        }

        if($oggi->format('d/m/Y')==$this->venerdi->format('d/m/Y')) {
            $this->venerdiOggi = true;
        } else {
            $this->venerdiOggi = false;
        }

        if($oggi->format('d/m/Y')==$this->sabato->format('d/m/Y')) {
            $this->sabatoOggi = true;
        } else {
            $this->sabatoOggi = false;
        }

        if($oggi->format('d/m/Y')==$this->domenica->format('d/m/Y')) {
            $this->domenicaOggi = true;
        } else {
            $this->domenicaOggi = false;
        }
    }
}


