<?php

do{
    $dice = rand(1,6);
    echo '<p>Your dice is ' . $dice .'!</p>';
    if($dice == 6){
        echo 'You win!';
} else {
    echo 'Throw a Dice again!';
    }
}
while($dice !=6);