<?php

$dice = 0;

while ($dice != 6) {
    $dice = rand(1, 6);
if($dice == 6) {
    echo '<p>Your dice is ' . $dice . '. ' . 'You win!</p>';

} else {
    echo '<p> Your dice is '. $dice . '. '. 'Try again!';
    } 
}