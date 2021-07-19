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

    if ($job == 'get_liste_marque' || $job == 'add_marque' || $job == 'edit_marque' || $job == 'del_marque') {

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

    if ($job == 'get_liste_marque') {

        InfoSite::listeMembre($_SESSION['id']);
        
        $PDO_query_marque = Bdd::connectBdd()->prepare("SELECT * FROM eg_marque ORDER BY eg_marque_id ASC");
        $PDO_query_marque->execute();

        while ($marque = $PDO_query_marque->fetch()) {

                        $functions = '
                        <a href="modif_ajout_marque.php?id='.$marque['eg_marque_id'].'" style="font-size: 0.9rem !important;" class="btn btn-info btn-sm waves-effect waves-float waves-light mr-1"><i class="bi bi-pen"></i></a>';

                        $PDO_query_verif_produit = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_marque_id  = :eg_marque_id");
                        $PDO_query_verif_produit->bindParam(":eg_marque_id", $marque['eg_marque_id'], PDO::PARAM_INT);
                        $PDO_query_verif_produit->execute();

                        $produit_existe = $PDO_query_verif_produit->rowCount();

                        $PDO_query_verif_produit->closeCursor();

                        if($produit_existe == 0){

                            $functions .= 
                                '<a href="#" style="font-size: 0.9rem !important;" class="btn btn-danger btn-sm waves-effect waves-float waves-light" data-id="' .
                                $marque['eg_marque_id'] .'" data-name="' .$marque['eg_marque_nom'] .'" id="delete-record"><i class="bi bi-trash"></i></a>
                            ';

                        }else{

                            $functions .= 
                                '<a style="font-size: 0.9rem !important;" class="btn btn-secondary btn-sm waves-effect waves-float waves-light"><i class="bi bi-trash"></i></a>
                            ';

                        }

                        switch($marque['eg_marque_statut'])
                        {
                            case '1':
                                $statut = '<div class="badge badge-success">Actif</div>';
                            break; 
                                                    
                            default:
                                $statut = '<div class="badge badge-light-danger">Non-Actif</div>';
                        }

                        $date = date_create($marque['eg_marque_date']);

                        $logo = '<div class="media-left">
                                    <img src="'.$marque['eg_marque_logo'].'" alt="avatar" width="150">
                                </div>';


                        $name_user = Membre::info($marque['eg_marque_user'], 'nom').' '.Membre::info($marque['eg_marque_user'], 'prenom');

                        $titre = $marque['eg_marque_nom'];

                        $id = $marque['eg_marque_id'];

                        $mysql_data[] = [
                            "responsive_id" => "",
                            "id" => $id,
                            "full_name" => $name_user,
                            "logo" => $logo,
                            "post" => $titre,
                            "titre" => $titre,
                            "start_date" => date_format($date, "d/m/Y"),
                            "status" => $statut,                
                            "Actions" => $functions
                        ];
        }

        $PDO_query_marque->closeCursor();
        $result = 'success';
        $message = 'Succès de requête';

        $bdd = null;
        $PDO_query_comm = null;


    }elseif ($job == 'add_marque') {
        try {
            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_marque (`eg_marque_date`, `eg_marque_user`, `eg_marque_nom`, `eg_marque_logo`, `eg_marque_statut`)
			 VALUES (now(), :user, :marque_titre, :logo, :statut)");

            $query->bindParam(":marque_titre", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":logo", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":statut", $_POST['statut'], PDO::PARAM_INT);
            $query->bindParam(":user", $_POST['user'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Niveau ajouté avec succés';
            
        } catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;
        $bdd = null;

    }elseif ($job == 'del_marque') {

        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {

            try {
                $query_del = Bdd::connectBdd()->prepare("DELETE FROM eg_marque WHERE eg_marque_id = :id");
                $query_del->bindParam(":id", $id, PDO::PARAM_INT);
                $query_del->execute();
                $query_del->closeCursor();
                $result = 'success';
                $message = 'Succès de requête';
            } catch (PDOException $x) {
                die("Secured");
                $result = 'error';
                $message = 'Échec de requête';
            }
            $query_del = null;
            $bdd = null;

        }

    }elseif ($job == 'edit_marque') {

        if ($id == '') {

            $result = 'Échec';
            $message = 'Échec id';

        } else {

            $query = Bdd::connectBdd()->prepare("UPDATE eg_marque SET eg_marque_date = now(), eg_marque_user = :eg_marque_user, eg_marque_nom = :eg_marque_nom, eg_marque_logo = :eg_marque_logo, eg_marque_statut = :eg_marque_statut  WHERE eg_marque_id = :eg_marque_id");

            $query->bindParam(":eg_marque_id", $id, PDO::PARAM_INT);

            $query->bindParam(":eg_marque_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_marque_nom", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":eg_marque_logo", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":eg_marque_statut", $_POST['statut'], PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            $result = 'success';
            $message = 'Succès de requête';
        }
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
