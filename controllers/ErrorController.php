<?php

class ErrorController extends AbstractController{
  public function e404(){
    return "404 La page que vous cherchez n'existe pas !";
  }
}