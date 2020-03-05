<?php

class Bet
{
    private $amount;
    private $type;
    private $nummer;

    public function __construct($type, $nummer, $amount)
    {
        $this->type = $type;
        $this->amount = $amount;
        $this->nummer = $nummer;
    }

    public function getAmount()
    {
        return $this->amount;
    }

    public function getType()
    {
        return $this->type;
    }

    public function getNummer()
    {
        return $this->nummer;
    }
}

?>
