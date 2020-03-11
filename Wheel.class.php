<?php

class Wheel
{
    private $red = "rood";
    private $black = "zwart";

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
                $color = $this->black;
            }else {
                $color = $this->red;
            }
        }else if(($num >= 11 && $num <= 18) || ($num >= 29 && $num <= 36)) {
            if($even) {
                $color = $this->red;
            }else {
                $color = $this->black;
            }
        }

        echo "Wiel: $num, $color".PHP_EOL;

        return [$num, $even, $color];
    }
}

?>
