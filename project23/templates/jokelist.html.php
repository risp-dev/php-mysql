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
      <p>Turime <?=$totalJokes ?> įrašų mūsų DB</p>
        <?php foreach ($jokes as $joke): ?>
<blockquote>
  <p>
  <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>

  (by <a href="mailto: <?=htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8'); ?>">
  <?=htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8'); ?> </a> on <?php
$date = new DateTime($joke['jokedate']);
echo $date->format('jS F Y');
?>)

  <a href="index.php?action=edit&id=<?=$joke['id']?>">Edit</a>
  

  <form action="index.php?action=delete" method="post">
    <input type="hidden" name="id" value="<?=$joke['id']?>">
    <input type="submit" value="Delete">
  </form>
  </p>
</blockquote>
<?php endforeach; ?>
        <?php endif; ?>       
</body>
</html>