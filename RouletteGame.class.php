<?php

class RouletteGame
{
    private $_table;
    private $_balance;

    public function __construct($_balance, $_table)
    {
        $this->_balance = $_balance;
        $this->_table = $_table;
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
                    } else if ($this->_balance > 0 && $val <= $this->_balance) {
                        $bet = new Bet($type, $num, $val);
                        $this->_table->addBet($bet);
                        $this->_balance -= $val;
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

    public function setBalance($_balance)
    {
        $this->_balance = $_balance;
    }

    public function getBalance()
    {
        return $this->_balance;
    }
}

?>
