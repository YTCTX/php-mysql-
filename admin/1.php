<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>

<body>
    <form method="post" action="../deal/deal_image.php" enctype="multipart/form-data">
        输入用户名:
        <input type="text" name="id" size="40">
        <input type="hidden" name="MAX_FILE_SIZE" value="1000000"> <br>
        <input type="file" name="form_data" size="40"><br>
        <input type="submit" name="submit" value="修改">
    </form>

</body>

</html>