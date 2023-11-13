<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="style.css">
    
    
    <title><?=$title; ?></title>
</head>
<body>
    <header>
        <h1>Kvaili juokeliai</h1>
</header>
    <nav>
        <ul>
            <li><a href="./index.php">Home</a></li>
            <li><a href="./select.php">Juokeliai</a></li>
            <li><a href="./addjoke.php">Add a joke</a></li>
        </ul>
</nav>
<main>
    <?=$output; ?>
</main>
<footer>
    <p>&copy <?=date('Y'); ?></p>
</footer>
</body>
</html>