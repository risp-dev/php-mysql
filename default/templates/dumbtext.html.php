<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <p>
        Įrašų skaičius: 
        <?=$totalJokes; ?>

</p>
        <?php foreach ($jokes as $joke): ?>
        <blockquote>
        <p>
        <?= htmlspecialchars($joke['dumbtext'], ENT_QUOTES, 'UTF-8') ?>
        (by <a href="mailto:<?php echo htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

        <a href="edit.php?id=<?=$joke['id']?>">Edit</a>
<form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?= $joke['id'] ?>">
    <input type="submit" value="Delete">
</form>
        </p>
        </blockquote>

        <?php endforeach; ?>
       
     
</body>
</html>