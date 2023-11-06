<?php

echo '<strong>First Loop example</strong><br>';

for($count = 1; $count <=100; $count++) {
    echo $count . ' ';
}
echo '<br><strong>Second  Loop example</strong><br>';

for($count2 = 1; $count2 <=100; $count2 = $count2 + 10) {
    echo $count2 . ' ';
}
