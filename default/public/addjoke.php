<?php


if(isset($_POST['dumbtext'])) {
    try {
        include __DIR__ . '/../../includes/dbConn.php';

            $sql = 'INSERT INTO `test` SET
            `dumbtext` = :dumbtext';

            $stmt = $pdo->prepare($sql);
            $stmt->bindValue(':dumbtext', $_POST['dumbtext']);
            $stmt->execute();
            header('location: select.php');


        } catch (PDOException $e) {
            $title = 'Damn error';
            $output = 'Database error: ' . $e->getMessage() . ' in ' . $e->getFile() . ':' . $e->getLine();
        }
        
}else {
$title = 'Ikelkite savo kvailą juokelį';

ob_start();

include __DIR__ . '/../templates/addjoke.html.php';

$output = ob_get_clean();
}

include __DIR__ . '/../templates/layout.html.php';
