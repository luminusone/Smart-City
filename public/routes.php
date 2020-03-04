
<?php
$controllers = array(
  'pages' => ['dashboard', 'error', 'login'] ,
  'users' => ['index','create', 'remove', 'edit'],
  'streets' => ['index', 'create', 'remove', 'edit', 'update'],
  'lights' => ['index', 'create', 'remove', 'edit', 'update'],
  'trafics' => ['index', 'create'],
  'pollutions' => ['index', 'create']
); // Les contrôleurs du système et les actions peuvent être appelés par cet contrôleur.
// Si les paramètres reçus de l’URL ne sont pas valides (aucun contrôleur de liste ni aucune action ne peuvent être appelés).
// la page d'erreur sera appelée.
if (!array_key_exists($controller, $controllers) || !in_array($action, $controllers[$controller])) {
  $controller = 'pages';
  $action = 'error';
}

// Incorporer le fichier de définition du contrôleur pour pouvoir utiliser la classe de définition dans ce fichier 
include_once('controllers/' . $controller . '_controller.php');
//Créez le nom de la classe du contrôleur à partir des valeurs obtenues par l'URL,
// puis appelez-le pour l'afficher.
$klass = str_replace('_', '', ucwords($controller, '_')) . 'Controller';
$controller = new $klass;
$controller->$action();
