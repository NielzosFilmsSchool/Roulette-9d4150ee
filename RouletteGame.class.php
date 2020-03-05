<?php

spl_autoload_register(
    function ($class_name) {
        include $class_name . '.php';
    }
);

class RouletteGame
{
    private $table;
    private $balance;

    public function __construct($balance, $table)
    {
        $this->balance = $balance;
        $this->table = $table;
    }

    public function play()
    {
        $temp_bets = [];
        $opp;
        $loop = true;
        while($loop){
            echo "Typ 'bet' om een bet te plaatsen, 'rol' om het wiel te rollen en 'stop' om het spel te stoppen: ".PHP_EOL;
            $opp = readline();
            if($opp == "stop" || $opp == "rol") {
                $loop = false;
            } else if($opp == "bet") {
                echo "Waar wil je op inzetten 'nummer', 'rood', 'zwart', 'even' of 'oneven':".PHP_EOL;
                $type = readline();
                if($type == "nummer" || $type == "rood" || $type == "zwart" || $type == "even" || $type == "oneven") {
                    $num = "";
                    if($type == "nummer") {
                        echo "Op welk nummer wil je inzetten 0-38:".PHP_EOL;
                        $num = intval(readline());
                    }
                    echo "Hoeveel wil je inzetten op $type:".PHP_EOL;
                    $val = intval(readline());
                    if($val == null || (!is_numeric($num) && $num < 0 && $num > 38)) {
                        echo "Je hebt geen correcte hoeveelheid ingevult.".PHP_EOL;
                    } else if ($this->balance > 0 && $val <= $this->balance) {
                        $bet = new Bet($type, $num, $val);
                        $this->table->addBet($bet);
                        $this->balance -= $val;
                    } else {
                        echo "Je hebt niet genoeg geld om een bet te plaatsen.".PHP_EOL;
                    }
                }else {
                    echo "$type is geen goed type om in te zetten.".PHP_EOL;
                }
            }else {
                echo "$opp is geen commando.".PHP_EOL;
            }
        }
        if($opp == "stop") {
            exit();
        }
    }
}

?>
