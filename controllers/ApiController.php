<?php

class ApiController extends AbstractController{

    public function authAction(){
        include_once ('../views/auth.php');

    }

    public function authVerificationAction(){
        return json_encode(array('success' => true, "user" => $_POST));

    }
    public function getAction(){
        header('Content-Type: text/html; charset=utf-8');

        $getContacts = new ApiModel();
        $contacts = $getContacts->getContact($this->pdo);
        return json_encode($contacts, JSON_PRETTY_PRINT);
    }

    public function postAction()
    {
        if(!$_SESSION['token'])
        {
            header('Location: /api/auth');
        }else{
            $token = sha1(uniqid());
            $_SESSION['token'] = $token;
        }

        $addContacts = new ApiModel();
        $contactsName = $addContacts->getContactsNames($this->pdo);
        include_once('../views/createForm.php');

    }

    public function postVerificationAction(){
        $formOk = true;
        $errors = [];
        if($_POST) {
            if (empty($_POST['civilite'])) {
                $errors['civilite'] = 'Veuillez rentrer une civilité';
                $formOk = false;
            }
            if (empty($_POST['lastName'])) {
                $errors['lastName'] = 'Veuillez rentrer un nom de famille';
                $formOk = false;
            }
            if (empty($_POST['firstName'])) {
                $errors['firstName'] = 'Veuillez rentrer un prénom';
                $formOk = false;
            }

            if (!$formOk) {
                http_response_code(400);
                return json_encode(array('success' => false, "errors" => $errors));
            } else {
                $addContactApi = new ApiModel();
                $addContactApi->postContact($this->pdo);
                return json_encode(array('success' => true, "user" => $_POST));
            }
        } else {
            http_response_code(400);
            return json_encode(array('success' => false, "errors" => array('Missing form data')));
        }

    }

    public function postAdresseVerificationAction(){
        $formOk = true;
        $errors = [];
        if($_POST) {
            if (empty($_POST['codePostal'])) {
                $errors['codePostal'] = 'Veuillez rentrer une code postal';
                $formOk = false;
            }
            if (empty($_POST['ville'])) {
                $errors['ville'] = 'Veuillez rentrer une ville';
                $formOk = false;
            }
            if(empty($_POST['contactName'])){
                $errors['contactName'] = 'Veuillez choisir un contact';
                $formOk = false;
            }
            if (!$formOk) {
                http_response_code(400);
                return json_encode(array('success' => false, "errors" => $errors));
            } else {
                $addContactApi = new ApiModel();
                $addContactApi->postAdresse($this->pdo);
                return json_encode(array('success' => true, "user" => $_POST));
            }
        } else {
            http_response_code(400);
            return json_encode(array('success' => false, "errors" => array('Missing form data')));
        }
    }


    public function updateVerificationAction(){

        $formOk = true;
        $errors = [];
        if($_POST) {
            if (empty($_POST['civilite'])) {
                $errors['civilite'] = 'Veuillez rentrer une civilité';
                $formOk = false;
            }
            if (empty($_POST['lastName'])) {
                $errors['lastName'] = 'Veuillez rentrer un nom de famille';
                $formOk = false;
            }
            if (empty($_POST['firstName'])) {
                $errors['firstName'] = 'Veuillez rentrer un prénom';
                $formOk = false;
            }

            if (!$formOk) {
                http_response_code(400);
                return json_encode(array('success' => false, "errors" => $errors));
            } else {
                $updateContact = new ApiModel();
                $updateContact->updateContact($this->pdo);
                return json_encode(array('success' => true, "user" => $_POST));
            }
        } else {
            http_response_code(400);
            return json_encode(array('success' => false, "errors" => array('Missing form data')));
        }

    }

    public function updateAdresseVerificationAction(){
        $formOk = true;
        $errors = [];
        if($_POST) {
            if (empty($_POST['codePostal'])) {
                $errors['codePostal'] = 'Veuillez rentrer une code postal';
                $formOk = false;
            }
            if (empty($_POST['ville'])) {
                $errors['ville'] = 'Veuillez rentrer une ville';
                $formOk = false;
            }
            if (!$formOk) {
                http_response_code(400);
                return json_encode(array('success' => false, "errors" => $errors));
            } else {
                $updateAdresse = new ApiModel();
                $updateAdresse->updateAdresse($this->pdo);
                return json_encode(array('success' => true, "user" => $_POST));
            }
        } else {
            http_response_code(400);
            return json_encode(array('success' => false, "errors" => array('Missing form data')));
        }
    }

    public function updateAction(){

        if(!$_SESSION['token'])
        {
            header('Location: /api/auth');
        }else{
            $token = sha1(uniqid());
            $_SESSION['token'] = $token;
        }
        $contactsValues = new ApiModel();
        $contacts = $contactsValues->getContactValues($this->pdo);
        include_once('../views/updateForm.php');
    }

    public function deleteAction(){

        if(!$_SESSION['token'])
        {
            header('Location: /api/auth');
        }else{
            $token = sha1(uniqid());
            $_SESSION['token'] = $token;
        }
        $addContacts = new ApiModel();
        $contactsName = $addContacts->getContactsNames($this->pdo);
        $adresses = $addContacts->getAdresses($this->pdo);

        include_once('../views/deleteForm.php');

    }

    public function deleteContactAction(){
        if($_POST['id']){
            $deleteContact = new ApiModel();
            $deleteContact->deleteContact($this->pdo);
            return json_encode(array('success' => true, "user" => $_POST));
        }
    }

    public function deleteAdresseAction(){
        if($_POST['id']){
            $deleteAdresse = new ApiModel();
            $deleteAdresse->deleteAdresse($this->pdo);
            return json_encode(array('success' => true, "user" => $_POST));
        }
    }
}