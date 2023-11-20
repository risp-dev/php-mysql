<?php


if(isset($_POST['dumbtext'])) {
    try {
        include __DIR__ . '/../../includes/dbConn.php';
        include __DIR__ . '/../../includes/DatabaseFunctions.php';

        insertDumb($pdo, $_POST['dumbtext'], 2);
        header(Location:select.php');

    }
    catch (PDOException $e) {
            $title = 'Damn error';
            $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        }
        
}else {
$title = 'Ikelkite savo juokelį';

ob_start();

include __DIR__ . '/../templates/addjoke.html.php';

$output = ob_get_clean();
}

include __DIR__ . '/../templates/layout.html.php';
