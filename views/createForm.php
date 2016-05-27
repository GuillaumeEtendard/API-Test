<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>POST</title>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.2.4/jquery.min.js"></script>
    <script rel="script" src="/assets/signAjax.js"></script>
</head>
<body>
<h3>Ajouter Contact</h3>
<form name="api/postVerification" method="post">
    <label for="civilite">Civilité</label>
    <input type="text" name="civilite" id="civilite"><br><br>
    <label for="lastName">Nom de famille</label>
    <input type="text" name="lastName" id="lastName"><br><br>
    <label for="firstName">Prénom</label>
    <input type="text" name="firstName" id="firstName"><br><br>
    <label for="birthDate">Date de naissance</label>
    <input type="date" name="birthDate" id="birthDate"><br><br>
    <input type="submit" value="Ajouter Contact">
</form>
<h3>Ajouter adresse</h3>
<form name="api/postAdresseVerification" method="post">
    <label for="rue">Rue</label>
    <input type="text" name="rue" id="rue"><br><br>
    <label for="codePostal">Code Postal</label>
    <input type="text" name="codePostal" id="codePostal"><br><br>
    <label for="city">Ville</label>
    <input type="text" name="ville" id="city"><br><br>
    <label for="selectContact">Sélectionner le contact associé à l'adresse</label>
    <select name="contactName" id="selectContact">
        <?php
        foreach($contactsName as $row){
            echo '<option value='.$row.'>'.$row.'</option>';
        }

        ?>
    </select><br><br>
    <input type="submit" value="Ajouter Adresse">
</form>
</body>
</html>