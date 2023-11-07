<?php

$firstName = $_POST['firstname'];
$lastName = $_POST['lastname'];

echo 'Hi there mister' .
 ' ' .
  htmlspecialchars($firstName, ENT_QUOTES, 'UTF-8') .
  ' ' . 
  htmlspecialchars($lastName, ENT_QUOTES, 'UTF-8') .
  '!';