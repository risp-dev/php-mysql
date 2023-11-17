<?php
try{
    include __DIR__ . '/../../includes/dbConn.php';
    include __DIR__ . '/../../includes/DatabaseFunctions.php';
    if(isset($_POST['dumbtext'])) {
        updateJoke($pdo, $_POST['id'], $_POST['dumbtext'], 1);
        header(Location: select.php);
        }else{
            $dumbtext = getInsertDumb($pdo, $_GET['id']);
            $title = 'Edit text';

            ob_start();
            include __DIR__ . '/../templates/edit.html.php';
            $output = ob_get_clean();
        }
}catch (PDOException $e) {
    $title = 'Error:';
    $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . e->getLine();
    }
    include __DIR__ . '/../templates/layout.html.php';