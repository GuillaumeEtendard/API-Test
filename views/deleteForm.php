<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Document</title>

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script rel="script" src="/assets/signAjax.js"></script>
</head>
<body>
<h3>Contacts</h3>
<?php

foreach($contactsName as $value){
    echo $value.'<form method="post" name="api/deleteContact">
    <input type="hidden" name="id" value='.substr($value,0,3).'>
    <input type="submit" value="X">
    </form>
    <br>';
}
?>

<h3>Adresses</h3>
<?php

foreach($adresses as $value){
    echo $value.'<form method="post" name="api/deleteAdresse">
    <input type="hidden" name="id" value='.substr($value,0,3).'>
    <input type="submit" value="X">
    </form>
    <br>';
}
?>
</body>
</html>