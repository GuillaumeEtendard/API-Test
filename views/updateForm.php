<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POST</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script rel="script" src="/assets/signAjax.js"></script>
</head>
<body>
<h3>Modifier Contact</h3>
<?php

$called_url = $_SERVER['REQUEST_URI'];
$url_composants = explode("/",$called_url,4);
$id = $url_composants[3];
?>
<form name="api/updateVerification" method="post">
    <label for="civilite">Civilité</label>
    <input type="text" name="civilite" id="civilite" value="<?php echo $contacts[0]['civilite'] ?>"><br><br>
    <label for="lastName">Nom de famille</label>
    <input type="text" name="lastName" id="lastName" value="<?php echo $contacts[0]['lastname'] ?>"><br><br>
    <label for="firstName">Prénom</label>
    <input type="text" name="firstName" id="firstName" value="<?php echo $contacts[0]['firstname'] ?>"><br><br>
    <label for="birthDate">Date de naissance</label>
    <input type="date" name="birthDate" id="birthDate" value="<?php echo $contacts[0]['birthdate'] ?>"><br><br>
    <input type="hidden" name="id" value="<?php echo $contacts[0]['id'] ?>">
    <input type="submit" value="Modifier Contact">
</form>
<h3>Modifier adresse</h3>

<form name="api/updateAdresseVerification" method="post">
    <label for="rue">Rue</label>
    <input type="text" name="rue" id="rue" value="<?php echo $contacts[1]['rue'] ?>"><br><br>
    <label for="codePostal">Code Postal</label>
    <input type="text" name="codePostal" id="codePostal" value="<?php echo $contacts[1]['codePostal'] ?>"><br><br>
    <label for="city">Ville</label>
    <input type="text" name="ville" id="city" value="<?php echo $contacts[1]['ville'] ?>"><br><br>
    <input type="hidden" name="id" value="<?php echo $contacts[1]['id'] ?>">
    <input type="submit" value="Modifier Adresse">
</form>
</body>
</html>