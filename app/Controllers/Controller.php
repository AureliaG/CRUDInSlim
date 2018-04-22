<?php
namespace App\Controllers;

class Controller {
       
    private $container;

    public function __construct($container)
    {
        $this->container = $container;
    }

    public function render($response, $file) 
    {
        $this->container->view->render($response, $file);
    }

    function connectionDb($sql) {

        require __DIR__.'/config.php';
      
        try {
      
          $tdl = new PDO($dsn, $user, $password, array(PDO::ATTR_ERRMODE => PDO::ERRMODE_EXCEPTION));
      
          $statement = $tdl->prepare($sql);
      
        } catch (Exception $e) {
          die('Erreur: ' . $e->getMessage());
        }
        return $statement;
      }
}