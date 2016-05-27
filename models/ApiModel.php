<?php
require_once('../utils/init.php');

class ApiModel
{
    public function getContact($pdo)
    {
        $getContact = $pdo->prepare("SELECT * FROM adresses LEFT JOIN contacts AS c ON adresses.contacts_id = c.id");
        $getContact->execute();
        $result = [];
        foreach ($getContact as $row) {
            $result[] = array(
                'Civilite' => $row['civilite'] . "\n",
                'Prenom' => $row['lastname'],
                'Nom' => $row['firstname'],
                'Date de naissance' => $row['birthdate'],
                'Date de creation du contact' => $row['creationDateContact'],
                'Date de mise a jour du contact' => $row['updateDateContact']
            );
            if ($row['contacts_id'] != 0) {
                $result[] = array(
                    'Adresses postales' => array(
                        'Rue' => $row['rue'],
                        'Code Postal' => $row['codePostal'],
                        'Ville' => $row['ville'],
                        'Date de creation de l\'adresse' => $row['creationDateAdresse'],
                        'Date de mise a jour de l\'adresse' => $row['updateDateAdresse']
                    )
                );
            }
        }

        return $result;
    }

    public function getContactsNames($pdo)
    {
        $addContact = $pdo->prepare('SELECT * FROM contacts');
        $addContact->execute();
        $result = [];
        foreach ($addContact as $row) {
            $row = $row['id'] . "  : " . $row['firstname'] . " " . $row['lastname'];
            $result[] = $row;
        }
        return $result;
    }

    public function getAdresses($pdo)
    {
        $addContact = $pdo->prepare('SELECT * FROM adresses');
        $addContact->execute();
        $result = [];
        foreach ($addContact as $row) {
            $row = $row['id']. "  : ".$row['rue'] . " " . $row['codePostal'] . " " . $row['ville'];
            $result[] = $row;
        }
        return $result;
    }

    public function postContact($pdo)
    {
        $null = null;
        $date = date("Y-m-d H:i:s");
        $stmt = $pdo->prepare("INSERT INTO contacts (civilite, lastname,firstname,birthdate,creationDateContact,updateDateContact) VALUES (:civilite, :lastname, :firstname, :birthdate, :creationDateContact, :updateDateContact)");
        $stmt->bindParam(':civilite', $_POST['civilite']);
        $stmt->bindParam(':lastname', $_POST['lastName']);
        $stmt->bindParam(':firstname', $_POST['firstName']);
        if (empty($_POST['birthDate'])) {
            $stmt->bindParam(':birthdate', $null);
        } else {
            $stmt->bindParam(':birthdate', $_POST['birthDate']);
        }
        $stmt->bindParam(':creationDateContact', $date);
        $stmt->bindParam(':updateDateContact', $date);
        $stmt->execute();
    }

    public function postAdresse($pdo)
    {

        $null = null;
        $date = date("Y-m-d H:i:s");
        $stmt = $pdo->prepare("INSERT INTO adresses (rue, codePostal,ville,creationDateAdresse,updateDateAdresse,contacts_id) VALUES (:rue, :codePostal, :ville, :creationDateAdresse, :updateDateAdresse, :contacts_id)");
        $stmt->bindParam(':codePostal', $_POST['codePostal']);
        $stmt->bindParam(':ville', $_POST['ville']);
        if (empty($_POST['rue'])) {
            $stmt->bindParam(':rue', $null);
        } else {
            $stmt->bindParam(':rue', $_POST['rue']);
        }
        $stmt->bindParam(':creationDateAdresse', $date);
        $stmt->bindParam(':updateDateAdresse', $date);
        $stmt->bindParam(':contacts_id', $_POST['contactName']);
        $stmt->execute();
    }

    public function getContactValues($pdo)
    {
        $called_url = $_SERVER['REQUEST_URI'];
        $url_composants = explode("/", $called_url, 4);
        $id = $url_composants[3];

        $updateContact = $pdo->prepare('SELECT * FROM contacts WHERE id= :id');
        $updateContact->bindParam(':id', $id);
        $updateContact->execute();
        $resultContact = [];
        foreach ($updateContact as $row) {
            $resultContact = array(
                'id' => $row['id'],
                'civilite' => $row['civilite'],
                'lastname' => $row['lastname'],
                'firstname' => $row['firstname'],
                'birthdate' => $row['birthdate'],
                'creationDateContact' => $row['creationDateContact'],
                'updateDateContact' => $row['updateDateContact']
            );
        }

        $updateAdresse = $pdo->prepare('SELECT * FROM adresses WHERE contacts_id= :contacts_id');
        $updateAdresse->bindParam(':contacts_id', $resultContact['id']);
        $updateAdresse->execute();
        $resultAdresse = [];
        foreach ($updateAdresse as $row) {
            $resultAdresse = array(
                'id' => $row['id'],
                'rue' => $row['rue'],
                'codePostal' => $row['codePostal'],
                'ville' => $row['ville'],
                'creationDateAdresse' => $row['creationDateAdresse'],
                'updateDateAdresse' => $row['updateDateAdresse'],
                'contacts_id' => $row['contacts_id']
            );
        }

        return array($resultContact, $resultAdresse);
    }

    public function updateContact($pdo)
    {
        $date = date('Y-m-d H:i:s');
        $null = null;
        $stmt = $pdo->prepare('UPDATE contacts SET civilite = :civilite,lastname= :lastname, firstname = :firstname,birthdate= :birthdate,updateDateContact= :updateDateContact WHERE id = :id');
        $stmt->bindParam(':civilite', $_POST['civilite']);
        $stmt->bindParam(':lastname', $_POST['lastName']);
        $stmt->bindParam(':firstname', $_POST['firstName']);
        if (empty($_POST['birthDate'])) {
            $stmt->bindParam(':birthdate', $null);
        } else {
            $stmt->bindParam(':birthdate', $_POST['birthDate']);
        }
        $stmt->bindParam(':updateDateContact', $date);
        $stmt->bindParam(':id', $_POST['id']);

        $stmt->execute();
    }

    public function updateAdresse($pdo)
    {
        $date = date('Y-m-d H:i:s');
        $null = null;

        $stmt = $pdo->prepare('UPDATE adresses SET codePostal = :codePostal,ville= :ville, rue = :rue,updateDateAdresse= :updateDateAdresse WHERE id = :id');
        $stmt->bindParam(':codePostal', $_POST['codePostal']);
        $stmt->bindParam(':ville', $_POST['ville']);
        if (empty($_POST['rue'])) {
            $stmt->bindParam(':rue', $null);
        } else {
            $stmt->bindParam(':rue', $_POST['rue']);
        }
        $stmt->bindParam(':updateDateAdresse', $date);

        $stmt->bindParam(':id', $_POST['id']);
        $stmt->execute();
    }

    public function deleteContact($pdo)
    {
        $stmt = $pdo->prepare('DELETE FROM contacts WHERE id = :id');
        $stmt->execute(array(
            'id' => $_POST['id']
        ));
        return $stmt;
    }

    public function deleteAdresse($pdo)
    {
        $stmt = $pdo->prepare('DELETE FROM adresses WHERE id = :id');
        $stmt->execute(array(
            'id' => $_POST['id']
        ));
        return $stmt;
    }
}