<?php

session_start();

$page = "";

if (empty($page)) {
    $page = "function";
    // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
    // On supprime également d'éventuels espaces
    $page = trim($page . ".php");
}

// On évite les caractères qui permettent de naviguer dans les répertoires
$page = str_replace("../", "protect", $page);
$page = str_replace(";", "protect", $page);
$page = str_replace("%", "protect", $page);

// On interdit l'inclusion de dossiers protégés par htaccess
if (preg_match("/config/", $page)) {
    echo $page;
} else {
    // On vérifie que la page est bien sur le serveur
    if (file_exists("../../../../../../config/" . $page) && $page != 'index.php') {
        include "../../../../../../config/" . $page;
    } else {
        echo "Page inexistante !";
    }
}

$job = '';
$id = '';

if (isset($_GET['job'])) {
    $job = $_GET['job'];

    if ($job == 'get_liste_produit' || $job == 'add_produit_image_1' || $job == 'add_produit_image_2' || $job == 'add_produit_image_3' || $job == 'add_produit_image_4' || $job == 'edit_produit_image_1' || $job == 'edit_produit_image_2' ||  $job == 'edit_produit_image_3' ||   $job == 'edit_produit_image_4' || $job == 'del_produit') {

        if (isset($_GET['id'])) {
            $id = $_GET['id'];
            if (!is_numeric($id)) {
                $id = '';
            }
        }

    } else {
        $job = '';
    }

}

$mysql_data = [];

if ($job != '') {

    if ($job == 'add_produit_image_1') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_image_produit (`eg_image_produit_date`, `eg_image_produit_user`, `eg_image_produit_nom`, `eg_image_produit_ordre`, `eg_produit_id`, `eg_image_produit_statut`, `eg_image_produit_title`) VALUES (now(), :eg_image_produit_user, :eg_image_produit_nom, :eg_image_produit_ordre,  :eg_produit_id, :eg_image_produit_statut, :eg_image_produit_title)");
            
            $query->bindParam(":eg_image_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_POST['img1'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_title", $_POST['title'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Image 1 ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_image_2') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_image_produit (`eg_image_produit_date`, `eg_image_produit_user`, `eg_image_produit_nom`, `eg_image_produit_ordre`, `eg_produit_id`, `eg_image_produit_statut`, `eg_image_produit_title`) VALUES (now(), :eg_image_produit_user, :eg_image_produit_nom, :eg_image_produit_ordre,  :eg_produit_id, :eg_image_produit_statut, :eg_image_produit_title)");
            
            $query->bindParam(":eg_image_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_POST['img2'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_title", $_POST['title'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Image 1 ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_image_3') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_image_produit (`eg_image_produit_date`, `eg_image_produit_user`, `eg_image_produit_nom`, `eg_image_produit_ordre`, `eg_produit_id`, `eg_image_produit_statut`, `eg_image_produit_title`) VALUES (now(), :eg_image_produit_user, :eg_image_produit_nom, :eg_image_produit_ordre,  :eg_produit_id, :eg_image_produit_statut, :eg_image_produit_title)");
            
            $query->bindParam(":eg_image_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_POST['img3'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_title", $_POST['title'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Image 1 ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_image_4') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_image_produit (`eg_image_produit_date`, `eg_image_produit_user`, `eg_image_produit_nom`, `eg_image_produit_ordre`, `eg_produit_id`, `eg_image_produit_statut`, `eg_image_produit_title`) VALUES (now(), :eg_image_produit_user, :eg_image_produit_nom, :eg_image_produit_ordre,  :eg_produit_id, :eg_image_produit_statut, :eg_image_produit_title)");
            
            $query->bindParam(":eg_image_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_POST['img4'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_title", $_POST['title'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Image 1 ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'edit_produit_image_1') {

        

            $query = Bdd::connectBdd()->prepare("UPDATE eg_image_produit SET eg_image_produit_date = now(), eg_image_produit_user = :eg_image_produit_user, eg_image_produit_nom = :eg_image_produit_nom, eg_image_produit_ordre = :eg_image_produit_ordre, eg_produit_id = :eg_produit_id, eg_image_produit_statut = :eg_image_produit_statut WHERE eg_image_produit_id = :eg_image_produit_id");

            $query->bindParam(":eg_image_produit_id", $_POST['id_produit_image'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_POST['img1'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            $result = 'success';
            $message = 'Succès de requête';
        
    }elseif ($job == 'edit_produit_image_2') {

        

            $query = Bdd::connectBdd()->prepare("UPDATE eg_image_produit SET eg_image_produit_date = now(), eg_image_produit_user = :eg_image_produit_user, eg_image_produit_nom = :eg_image_produit_nom, eg_image_produit_ordre = :eg_image_produit_ordre, eg_produit_id = :eg_produit_id, eg_image_produit_statut = :eg_image_produit_statut WHERE eg_image_produit_id = :eg_image_produit_id");

            $query->bindParam(":eg_image_produit_id", $_POST['id_produit_image'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_POST['img2'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            $result = 'success';
            $message = 'Succès de requête';
        
    }elseif ($job == 'edit_produit_image_3') {
       

            $query = Bdd::connectBdd()->prepare("UPDATE eg_image_produit SET eg_image_produit_date = now(), eg_image_produit_user = :eg_image_produit_user, eg_image_produit_nom = :eg_image_produit_nom, eg_image_produit_ordre = :eg_image_produit_ordre, eg_produit_id = :eg_produit_id, eg_image_produit_statut = :eg_image_produit_statut WHERE eg_image_produit_id = :eg_image_produit_id");

            $query->bindParam(":eg_image_produit_id", $_POST['id_produit_image'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_POST['img3'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            $result = 'success';
            $message = 'Succès de requête';
        
    }elseif ($job == 'edit_produit_image_4') {

        
            $query = Bdd::connectBdd()->prepare("UPDATE eg_image_produit SET eg_image_produit_date = now(), eg_image_produit_user = :eg_image_produit_user, eg_image_produit_nom = :eg_image_produit_nom, eg_image_produit_ordre = :eg_image_produit_ordre, eg_produit_id = :eg_produit_id, eg_image_produit_statut = :eg_image_produit_statut WHERE eg_image_produit_id = :eg_image_produit_id");

            $query->bindParam(":eg_image_produit_id", $_POST['id_produit_image'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_POST['img4'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            $result = 'success';
            $message = 'Succès de requête';
        
    }
}

$data = [
    "result" => $result,
    "message" => $message,
    "data" => $mysql_data,
];

$json_data = json_encode($data, JSON_UNESCAPED_UNICODE);
print $json_data;
?>
