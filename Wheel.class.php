<?php

class Wheel
{
    private $_red = "rood";
    private $_black = "zwart";

    public function roll()
    {
        $num = rand(0, 38);
        $even = false;
        $color = "";
        if($num % 2 == 0) {
            $even = true;
        }

        if(($num >= 1 && $num <= 10) || ($num >= 19 && $num <= 28)) {
            if($even) {
                $color = $this->_black;
            }else {
                $color = $this->_red;
            }
        }else if(($num >= 11 && $num <= 18) || ($num >= 29 && $num <= 36)) {
            if($even) {
                $color = $this->_red;
            }else {
                $color = $this->_black;
            }
        }

        echo "Wiel: $num, $color".PHP_EOL;

        return [$num, $even, $color];
    }
}

?>
