<?php

$dice = rand(1, 6);

echo 'Throw A Dice!<br>';

if ($dice == 6) {
echo 'Jackpot!' . ' ' . "You've thrown a" . ' ' . $dice . '!';  
}
else{
   echo 'Your number is'. ' ' . $dice . '!' . ' ' . 'Refresh or leave ;)'; 
}
