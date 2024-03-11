<?php
// L'autoloader c'est une classe qui va charger automatiquement les classes .
// pour pas avoir besoin de les inclure manuellement à chaque fois. 

namespace App; 

//la classe Autoloader fait partie de l'espace de noms App.

//Définit la classe
class Autoloader{


//C'est une méthode (une fonction à l'intérieur d'une classe) qui permet d'enregistrer l'autoloader.
	public static function register(){
		spl_autoload_register(array(__CLASS__, 'autoload'));
// la méthode autoload() de la cette classe pour charger automatiquement les classes lorsqu'elles sont utilisées.
	}

//Cette méthode est celle qui est appelée automatiquement lorsque PHP rencontre une classe non chargée. 
//Elle prend le nom de la classe comme argument et cherche le fichier qui  correspond à cette classe.( $cateogry $topic etc)
	public static function autoload($class){

		//$class = Model\Managers\TopicManager (FullyQualifiedClassName)
		//namespace = Model\Managers, nom de la classe = TopicManager
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
/////////////////////////////////////////////////////////////////////////////////////////
		// on explose notre variable $class par \
		$parts = preg_split('#\\\#', $class);
		//$parts = ['Model', 'Managers', 'TopicManager']

		// on extrait le dernier element 
		$className = array_pop($parts);
		//$className = TopicManager

		// on créé le chemin vers la classe
		// on utilise DS car plus propre et meilleure portabilité entre les différents systèmes (windows/linux) 

		$path = strtolower(implode(DS, $parts));
		//$path = 'model/manager'
		$file = $className.'.php';
		//$file = TopicManager.php

		$filepath = BASE_DIR.$path.DS.$file;
		//$filepath = model/managers/TopicManager.php
		if(file_exists($filepath)){
			require $filepath;
		}
	}
}
?>