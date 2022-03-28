<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Teste POST method</title>
</head>
<body>
    <form action="teste.php?route=teste/2" enctype="application/json" method="post">
        <input type="text" name="service">
        <input type="text" name="id">
        <input type="submit" value="submit">
    </form>
</body>
</html>