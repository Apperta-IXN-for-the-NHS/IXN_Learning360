<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="css/style.css">
    <style>


    </style>
</head>
<body>
<div class="con">
    <form action="admin_chk.php" method="post" id="form">
        <div class="form-group">
            <label>Old Password</label>
            <div class="col">
                <input type="password" name="old_password" required>
            </div>
        </div>
        <div class="form-group">
            <label>New Password</label>
            <div class="col">
                <input type="password" name="new_password" required>
            </div>
        </div>
        <div class="form-group">
            <label>Confirm Password</label>
            <div class="col">
                <input type="password" name="confirm_password" required>
            </div>
        </div>
        <div class="form-group">
            <div class="submit">
                <input type="submit" name="submit" value="submit">
            </div>
        </div>
    </form>
</div>
</body>
</html>