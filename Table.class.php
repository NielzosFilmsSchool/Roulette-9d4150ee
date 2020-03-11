<?php

class Table
{
    private $_bets = [];
    private $_wheel;

    public function __construct()
    {
        $this->_wheel = new _wheel();
    }
    public function addBet($bet)
    {
        $this->_bets[] = $bet;
    }

    public function roll()
    {
        $roll = $this->_wheel->roll();

        $num = $roll[0];
        $color = $roll[2];
        $even = $roll[1];

        $won_money = 0;

        foreach($this->_bets as $bet) {
            $type = $bet->getType();
            $bet_num = $bet->getNummer();
            $amount = $bet->getAmount();
            if($type == "nummer") {
                if($bet_num == $num) {
                    $won_money += $amount *35;
                } else {
                    $won_money += -($amount*35);
                }
            }else if($type == "rood") {
                if($color == "red") {
                    $won_money += $amount;
                } else {
                    $won_money += -($amount);
                }
            } else if($type == "zwart") {
                if($color == "zwart") {
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
        $this->_bets = [];
        return $won_money;
    }
}

?>
