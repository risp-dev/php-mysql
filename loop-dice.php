<?php

for ($count = 1; $count <=10; $count++){
    
    $dice = rand(1, 6);
    echo '<p>Your dice is ' .$dice . '</p>';

    if($dice == 6) {
        echo 'You win!';
        break;
    } else {
        echo '<p>Better luck next time</p>';
    }
}