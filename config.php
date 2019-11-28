<?php
//Le Singleton, permet d'avoir une classe qui sera instanciée qu'une seule fois tout au long de notre application.
//Pour créer un singleton nous allons devoir utiliser plusieurs choses

//Un attribut statique qui conservera l'instance unique de notre classe
//Une méthode statique qui permet d'instancier l'objet ou de récupérer l'instance unique déjà créée
  
  class config {
    private static $instance = NULL; // L'attribut qui stockera l'instance unique
//La méthode statique qui permet d'instancier ou de récupérer l'instance unique
    public static function getConnexion() {
      if (!isset(self::$instance)) {
		try{
        self::$instance = new PDO('mysql:host=localhost;dbname=produit', 'root', '');
		self::$instance->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		}catch(Exception $e){
            die('Erreur: '.$e->getMessage());
		}
      }
      return self::$instance;
    } 	
  }
?>