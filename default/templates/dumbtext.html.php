<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php if (isset($error)): ?>
    <p>
        <?php echo $error; ?>
    </p>
    <?php else: ?>
        <?php foreach ($jokes as $dumbtext): ?>
            <blockquote>
                <p>
                    <?php echo htmlspecialchars($dumbtext, ENT_QUOTES, 'UTF-8') ?>
        </p>
        </blockquote>
        <?php endforeach; ?>
        <?php endif; ?>
</body>
</html>