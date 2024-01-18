<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../templates/css/style.css">
    <title><?=$title?></title>
</head>
<body><nav>
<header>
<h1>Jokes</h1>
</header>

<ul>
<li><a href="index.php">Home</a></li>
      <li><a href="index.php?controller=joke&amp;action=list">Jokes List</a></li>
      <li><a href="index.php?controller=joke&amp;action=edit">Add a new Joke</a></li>
</ul>
</nav>
<main>
<?=$output?>
</main>
<footer>
<?php include 'footer.html.php'; ?>
</footer>
</body>
</html>