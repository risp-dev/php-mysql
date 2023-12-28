<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="" method="post">
       
        <input type="hidden" name="jokeid" value="<?=$joke['id'] ?? ''?>">
          
        <label for="joketext">Type your joke here</label>
        <textarea id="joketext" name="joketext" rows="3" cols="40"><?=$joke['joketext'] ?? ''?>
</textarea>
        <input type="submit" name='submit' value="Save">
    </form>
</body>
</html>