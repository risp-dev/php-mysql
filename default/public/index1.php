<?php
if(!isset($_POST['firstname'])) {
    include __DIR__ . '/../templates/form.html.php';
} else {
$firstname = $_POST['firstname'];
$lastname = $_POST['lastname'];
if($firstname == 'Risp' && $lastname == 'Dev') {
    $output = 'Hi Friend!' ;
}else{
    $output = 'Wellcome guest, ' . 
    htmlspecialchars($firstname, ENT_QUOTES, 'UTF-8') . ' ' . 
    htmlspecialchars($lastname, ENT_QUOTES, 'UTF-8') . '!';
} 
include __DIR__ . '/../templates/wellcome.html.php';
}