<?php

class Bet
{
    private $_amount;
    private $_type;
    private $_nummer;

    public function __construct($type, $nummer, $amount)
    {
        $this->_type = $type;
        $this->_amount = $amount;
        $this->_nummer = $nummer;
    }

    public function getAmount()
    {
        return $this->_amount;
    }

    public function getType()
    {
        return $this->_type;
    }

    public function getNummer()
    {
        return $this->_nummer;
    }
}

?>
