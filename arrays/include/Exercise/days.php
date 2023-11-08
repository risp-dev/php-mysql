<?php


$weekdays = [
    1 => 'Monday',
    2 => 'Tuesday',
    3 => 'Wednesday',
    4 => 'Thursday',
    5 => 'Friday',
    6 => 'Saturday',
    7 => 'Sunday'

];

do {
$randomweekday = rand(1, 7);
$weekdayName = $weekdays[$randomweekday];
if($randomweekday == 5) {
    echo 'Today is ' . $weekdayName;
    echo ' Yey!';
} else {
    echo 'Today is ' . $weekdayName;
    echo ' Well, it\'s  not Friday ;( ';
}

} 
while($randomweekday != 5);
