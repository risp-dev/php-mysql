<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
   <form action="" method="post">
    <input type="hidden" name="id" value="<?=$dumbtext['id']; ?>">
    <label for="dumbtext">Type text here:</label>
    <textarea id="dumbtext" name="dumbtext" rows="4" cols="40"><?=htmlspecialchars($dumbtext['dumbtext'], ENT_QUOTES, 'UTF-8'); ?>
</textarea>
<input type="submit" value="Save">
</form>
</body>
</html>