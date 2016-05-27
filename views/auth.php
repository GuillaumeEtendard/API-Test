<?php
session_destroy();
session_start();
$token = sha1(uniqid());
$_SESSION['token'] = $token;
?>
<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script rel="script" src="/assets/authJs.js"></script>
</head>
<body>
<h1>Authentification</h1>
<form name="authForm" method="post">
    <input type="text" name="auth">
    <input type="hidden" name="token" value="<?php echo $token; ?>" >
    <input type="submit">
</form>
</body>
</html>
