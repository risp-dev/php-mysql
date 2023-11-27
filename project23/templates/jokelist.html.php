<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>List of jokes</title>
</head>
<body>
    <?php if (isset($error)): ?>
        <p>
<?=$error; ?>
    </p>
    <?php else: ?>
        <?php foreach ($jokes as $joke): ?>
            <blocquote>
                <p>
            <?= htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8') ?>
            <form action="deletejoke.php" name="id" value="<?=$joke['id']?>">
            <input type="submit" value="Delete">
        </form>
        </p>
        </blockquote>
        <?php endforeach; ?>
        <?php endif; ?>
</body>
</html>