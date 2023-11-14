<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>


        <?php foreach($jokes as $dumbtext): ?>
        <blockquote>
        <p>
        <?= htmlspecialchars($dumbtext['dumbtext'], ENT_QUOTES, 'UTF-8') ?>
<form action="delete.php" method="post">
    <input type="hidden" name="id" value="<?= $dumbtext['id'] ?>">
    <input type="submit" value="Delete">
</form>
        </p>
        </blockquote>
        <?php endforeach; ?>
     
</body>
</html>