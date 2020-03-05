<?php

class Wheel
{
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
                $color = "black";
            }else {
                $color = "red";
            }
        }else if(($num >= 11 && $num <= 18) || ($num >= 29 && $num <= 36)) {
            if($even) {
                $color = "red";
            }else {
                $color = "black";
            }
        }

        echo "Wiel: $num, $color".PHP_EOL;

        return [$num, $even, $color];
    }
}

?>
