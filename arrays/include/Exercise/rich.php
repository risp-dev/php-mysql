<?php

$sallary = [
    1000 => 'poor',
    2000 => 'middle class',
    3000 => 'rich'
];

do {
    $randomSallary = rand(1000, 3000);
   // $isRich = $sallary[$randomSallary];
   if($randomSallary < 2000) {
    $isRich = $sallary[1000];
   }else if($randomSallary < 3000) {
    $isRich = $sallary[2000];
   }else{
    $isRich = $sallary[3000];
   }

    
    if($randomSallary == 3000) {
        echo 'You are ' . $isRich . '!' . 'Your sallary is:  ' . $randomSallary . '!';
    
    
    }
    else {
        echo 'You are ' . $isRich . '! ' .  'Your sallary is ' .  $randomSallary . ' work harder!';
        echo '<br>';
    }

}

while ($randomSallary != 3000);