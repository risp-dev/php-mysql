<?php


if(isset($_POST['dumbtext'])) {
    try {
        $pdo = new PDO('mysql:host=localhost;dbname=november;charset=utf8mb4',  'rispdev', '69*kQuyt/Kly5');

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
