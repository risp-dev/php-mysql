<?php

$seasons = [
    1 => 'Winter',
    2 => 'Spring',
    3 => 'Summer',
    4 => 'Autumn'
];

do {
    $randomSeason = rand(1, 4);
    $todaySeason = $seasons[$randomSeason];
    if($randomSeason == 1) {
        echo 'There will be snow in ' . $todaySeason;
    }
    else{
        echo 'It\'s' . $todaySeason;
    }

} while($randomSeason != 1);