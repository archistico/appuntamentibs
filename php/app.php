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

//$app1 = new Appuntamento(new Orario(), CognomeNome(), "nota");
function oggi() {
   //return new DateTime()->format('Y-m-d H:i:s');
}




