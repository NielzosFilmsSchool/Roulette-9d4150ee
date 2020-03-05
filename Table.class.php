<?php

spl_autoload_register(
    function ($class_name) {
        include $class_name . '.php';
    }
);

class Table
{
    private $bets = [];
    private $wheel;

    public function __construct()
    {
        $this->wheel = new Wheel();
    }
    public function addBet($bet)
    {
        $this->bets[] = $bet;
    }

    public function roll()
    {
        $roll = $this->wheel->roll();

        $num = $roll[0];
        $color = $roll[2];
        $even = $roll[1];

        $won_money = 0;

        foreach($this->bets as $bet) {
            $type = $bet->getType();
            $bet_num = $bet->getNummer();
            $amount = $bet->getAmount();
            if($type == "nummer") {
                if($bet_num == $num) {
                    $won_money += $amount *35;
                } else {
                    $won_money += -($amount*35);
                }
            } else if($type == "rood") {
                if($color == "red") {
                    $won_money += $amount;
                } else {
                    $won_money += -($amount);
                }
            } else if($type == "black") {
                if($color == "black") {
                    $won_money += $amount;
                }else {
                    $won_money += -($amount);
                }
            } else if($type == "even") {
                if($even) {
                    $won_money += $amount;
                }else {
                    $won_money += -($amount);
                }
            } else if($type == "oneven") {
                if(!$even) {
                    $won_money += $amount;
                }else {
                    $won_money += -($amount);
                }
            }
        }
        return $won_money;
    }
}

?>
