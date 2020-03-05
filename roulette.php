<?php

spl_autoload_register(
    function ($class_name) {
        include $class_name . '.class.php';
    }
);

echo "Welkom bij het roulette spel! Hoeveel geld heb je: ".PHP_EOL;
$money = intval(readline());
if($money == null) {
    echo "Geen geldige geld waarde ingevult.";
    exit();
}else if($money < 0) {
    echo "Geld kan niet negatief zijn om te spelen.";
    exit();
}

$table = new Table();
$roulette = new RouletteGame($money, $table);
while(true){
    $roulette->play();
    $won_money = $table->roll();
    $money += $won_money;
    echo "You won: $won_money, you now have $money,-".PHP_EOL;
    if($money <= 0) {
        echo "You do not have enough money to continue playing. Quiting game...".PHP_EOL;
        exit();
    }
}
?>
