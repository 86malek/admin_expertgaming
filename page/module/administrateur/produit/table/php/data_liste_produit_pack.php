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

    if (
        $job == 'get_liste_produit' || 

        $job == 'add_produit_pack_1' || 
        $job == 'add_produit_pack_2' || 
        $job == 'add_produit_pack_3' || 
        $job == 'add_produit_pack_4' || 
        $job == 'add_produit_pack_5' || 
        $job == 'add_produit_pack_6' ||
        $job == 'add_produit_pack_7' ||
        $job == 'add_produit_pack_8' ||
        $job == 'add_produit_pack_9' ||
        $job == 'add_produit_pack_10' ||
        $job == 'add_produit_pack_11' ||
        $job == 'add_produit_pack_12' ||
        $job == 'add_produit_pack_13' ||

        $job == 'edit_produit_pack_1' || 
        $job == 'edit_produit_pack_2' ||  
        $job == 'edit_produit_pack_3' ||   
        $job == 'edit_produit_pack_4' || 
        $job == 'edit_produit_pack_5' ||
        $job == 'edit_produit_pack_6' ||
        $job == 'edit_produit_pack_7' ||
        $job == 'edit_produit_pack_8' ||
        $job == 'edit_produit_pack_9' ||
        $job == 'edit_produit_pack_10' ||
        $job == 'edit_produit_pack_11' ||
        $job == 'edit_produit_pack_12' ||
        $job == 'edit_produit_pack_13' ||

        $job == 'del_produit'
        ) {

        if (isset($_POST['id'])) {
            $id = $_POST['id'];
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

    if ($job == 'add_produit_pack_1') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['processeur'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Processeur ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_2') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['mother'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Mother ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_3') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['ram'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_4') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['case'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_5') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['alim'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_6') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['stockage'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_7') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['gpu'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_8') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['moniteur'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_9') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['clavier'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_10') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['sourie'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_11') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['casque'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_12') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['webcam'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'add_produit_pack_13') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_pack_produit (`eg_pack_produit_date`, `eg_pack_produit_user`, `eg_pack_produit_quantite`, `eg_pack_produit_ajout_id`, `eg_pack_produit_ordre`, `eg_produit_id`, `eg_pack_produit_statut`) VALUES (now(), :eg_pack_produit_user, :eg_pack_produit_quantite, :eg_pack_produit_ajout_id, :eg_pack_produit_ordre, :eg_produit_id, :eg_pack_produit_statut)");
            
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['tapis'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'RAM ajouté avec succées';
            
        }catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;

    }elseif ($job == 'edit_produit_pack_1') {

        

            $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

            $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_1'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ajout_id", $_POST['processeur'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            $result = 'success';
            $message = 'Processeur modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_2') {

        

        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_2'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['mother'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'MOTHER modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_3') {
       

        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_3'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['ram'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_4') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_4'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['case'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_5') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_5'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['alim'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_6') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_6'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['stockage'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_7') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_7'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['gpu'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_8') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_8'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['moniteur'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_9') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_9'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['clavier'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_10') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_10'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['sourie'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_11') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_11'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['casque'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_12') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_12'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['webcam'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
    }elseif ($job == 'edit_produit_pack_13') {

        
        $query = Bdd::connectBdd()->prepare("UPDATE eg_pack_produit SET eg_pack_produit_date = now(), eg_pack_produit_user = :eg_pack_produit_user, eg_pack_produit_quantite = :eg_pack_produit_quantite, eg_pack_produit_ajout_id = :eg_pack_produit_ajout_id, eg_pack_produit_ordre = :eg_pack_produit_ordre, eg_produit_id = :eg_produit_id, eg_pack_produit_statut = :eg_pack_produit_statut WHERE eg_pack_produit_id = :eg_pack_produit_id");

        $query->bindParam(":eg_pack_produit_id", $_POST['id_produit_pack_13'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_user", $_POST['user'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_quantite", $_POST['quantite'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ajout_id", $_POST['tapis'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_ordre", $_POST['ordre'], PDO::PARAM_INT);
        $query->bindParam(":eg_produit_id", $_POST['id_produit'], PDO::PARAM_INT);
        $query->bindParam(":eg_pack_produit_statut", $_POST['statut'], PDO::PARAM_INT);

        $query->execute();

        $query->closeCursor();

        $result = 'success';
        $message = 'RAM modifeé avec Succès';
        
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
