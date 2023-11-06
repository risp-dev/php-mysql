<?php

echo '<strong>Throw A Dice!</strong><br><br>';

$dice = rand(1, 6);

if ($dice == 6) {
echo 'Jackpot!' . ' ' . "You've thrown a" . ' ' . $dice . '!';  
}
else{
    header("Refresh:3");
    echo 'Your number is'. ' ' . $dice . '!' . ' ' . 'Your browser will refresh after 3 sec. or you  may do it manualy!'; 
}

echo '<br><br><a href="./dice.php">Refresh current page<a/>';
