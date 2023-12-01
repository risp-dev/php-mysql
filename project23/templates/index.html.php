<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?php $title ?></title>
</head>
<body>
<?php if (isset($error)): ?>
        <p>
<?=$error; ?>
    </p>
    <?php else: ?>
        <?php foreach ($jokes as $joke): ?>
                <p>
          <h2><?= htmlspecialchars($joke, ENT_QUOTES, 'UTF-8') ?></h2> 
       
        </p>
        <?php endforeach; ?>
        <?php endif; ?>
</body>
</html>