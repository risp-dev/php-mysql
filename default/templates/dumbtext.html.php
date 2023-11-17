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
        <?=$allJokes; ?>

</p>
        <?php foreach($jokes as $dumbtext): ?>
        <blockquote>
        <p>
        <?= htmlspecialchars($dumbtext['dumbtext'], ENT_QUOTES, 'UTF-8') ?>
        (by <a href="mailto:<?php echo htmlspecialchars($dumbtext['email'], ENT_QUOTES, 'UTF-8'); ?>">
        <?php echo htmlspecialchars($dumbtext['name'], ENT_QUOTES, 'UTF-8'); ?></a>)

        <a href="edit.php?id=<?=$dumbtext['id']?>">Edit</a>
<form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?= $dumbtext['id'] ?>">
    <input type="submit" value="Delete">
</form>
        </p>
        </blockquote>
        <?php endforeach; ?>
     
</body>
</html>