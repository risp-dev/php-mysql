 <p>Mes turime savo duomenų bazėje <?=$totalJokes?> juokelių</p>
  
 <?php foreach ($jokes as $joke): ?>
<blockquote>
  <p>
  <?=htmlspecialchars($joke['joketext'], ENT_QUOTES, 'UTF-8')?>

  (by <a href="mailto: <?=htmlspecialchars($joke['email'], ENT_QUOTES, 'UTF-8'); ?>">
  <?=htmlspecialchars($joke['name'], ENT_QUOTES, 'UTF-8'); ?> </a> on <?php
$date = new DateTime($joke['jokedate']);
echo $date->format('jS F Y');
?>)

  <a href="/joke/edit/<?=$joke['id']?>">Edit</a>
    <form action="/joke/delete" method="post">
    <input type="hidden" name="id" value="<?=$joke['id']?>">
    <input type="submit" value="Delete">
  </form>
  </p>
</blockquote>
<?php endforeach; ?>      