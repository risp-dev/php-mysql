<?php

$number = [
    1 => 'one',
    2 => 'two',
    3 => 'three',
    4 => 'four',
    5 => 'five',
    6 => 'six'
];

$dice = rand(1, 6);

echo 'Your dice is ' . $number[$dice] . '. ';

if($dice == 6) {
    echo 'You win!';
} else {
    echo 'Throw again!';
}

