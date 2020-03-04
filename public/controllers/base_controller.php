
<?php
class BaseController
{
protected $folder; 
//met la valeur d'un certain répertoire dans le dossier views, contenant les fichiers de modèles de vues de la sertion en cours.

// La méthode rende data pour les utilisateurs.
function render($file, $data = array(), $masterfile = 'master_view.php')
{
  // Vérifier si le fichier appélé exsite ou pas
  $view_file = 'views/' . $this->folder . '/' . $file . '.php';
  if (is_file($view_file)) {
    // Si il exsite, on cree les variables qui contiennent les valeurs quand on appelle de la fonction 
    extract($data);
    // Ensuite, on enregistre la valeur de retour lorsque on exécute le fichier de modèle de vue avec ces données dans une variable, mais pas présenter dans le navigateur.
    ob_start();
    require_once($view_file);
    $content = ob_get_clean();
    //Après avoir enregistré les résultats dans la variable $content, on appelle le modèle général du système pour afficher sur navigateur. 
    require_once('views/layouts/'.$masterfile);
  } else {
    // Si le fichier que l'on souhaite de l'appeller n'exsite pas, on va accéder à la page erreur.
    header('Location: index.php?controller=pages&action=error');
  }
}
}
