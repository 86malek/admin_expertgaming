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

    if ($job == 'get_liste_banniere_top' || $job == 'add_image' || $job == 'edit_image' || $job == 'del_image') {

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

    if ($job == 'get_liste_banniere_top') {

        InfoSite::listeMembre($_SESSION['id']);
        
        $PDO_query_banniere = Bdd::connectBdd()->prepare("SELECT * FROM eg_banniere ORDER BY eg_banniere_id ASC");
        $PDO_query_banniere->execute();

        while ($banniere = $PDO_query_banniere->fetch()) {

            $functions = '
            <a href="modif_ajout_banniere_top.php?id='.$banniere['eg_banniere_id'].'" style="font-size: 0.9rem !important;" class="btn btn-info btn-sm waves-effect waves-float waves-light"><i class="bi bi-pen"></i></a>
            <a href="#" style="font-size: 0.9rem !important;" class="btn btn-danger btn-sm waves-effect waves-float waves-light" data-id="'. $banniere['eg_banniere_id'] .'" data-name="' .$banniere['eg_banniere_nom'] .'" id="delete-record"><i class="bi bi-trash"></i></a>
                ';

            switch($banniere['eg_banniere_statut'])
            {
                case '1':
                    $statut = '<div class="badge badge-success">Active</div>';
                break; 
                                        
                default:
                    $statut = '<div class="badge badge-light-danger">Non-Active</div>';
            }

            $date = date_create($banniere['eg_banniere_date']);

            $image = '<div class="media-left">
                        <a href="'.$banniere['eg_banniere_lien'].'"><img src="'.$banniere['eg_banniere_image'].'" alt="'.$banniere['eg_banniere_nom'].'" width="200" loading="lazy"></a>
                    </div>';


            $name_user = Membre::info($banniere['eg_banniere_user'], 'nom').' '.Membre::info($banniere['eg_banniere_user'], 'prenom');

            $titre = $banniere['eg_banniere_nom'];

            $lien = '<a href="'.$banniere['eg_banniere_lien'].'" target="_blank">Lien</a>';

            $id = $banniere['eg_banniere_id'];

            $mysql_data[] = [
                "responsive_id" => "",
                "id" => $id,
                "full_name" => $name_user,
                "image" => $image,
                "post" => $titre,
                "titre" => $titre,
                "lien" => $lien,
                "start_date" => date_format($date, "d/m/Y"),
                "status" => $statut,                
                "Actions" => $functions
            ];
        }

        $PDO_query_banniere->closeCursor();
        $result = 'success';
        $message = 'Succès de requête';
        $PDO_query_banniere = null;


    }elseif ($job == 'add_image') {
        try {
            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_banniere (`eg_banniere_date`, `eg_banniere_user`, `eg_banniere_nom`, `eg_banniere_image`, `eg_banniere_statut`, `eg_banniere_lien`)
			 VALUES (now(), :eg_banniere_user, :eg_banniere_nom, :eg_banniere_image, :eg_banniere_statut, :eg_banniere_lien)");

            $query->bindParam(":eg_banniere_nom", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":eg_banniere_lien", $_POST['lien'], PDO::PARAM_STR);
            $query->bindParam(":eg_banniere_image", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":eg_banniere_statut", $_POST['statut'], PDO::PARAM_INT);
            $query->bindParam(":eg_banniere_user", $_POST['user'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Image ajoutée avec succés';
            
        } catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;
        $bdd = null;

    }elseif ($job == 'del_image') {

        

            try {
                $query_del = Bdd::connectBdd()->prepare("DELETE FROM eg_banniere WHERE eg_banniere_id = :eg_banniere_id");
                $query_del->bindParam(":eg_banniere_id", $id, PDO::PARAM_INT);
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

        

    }elseif ($job == 'edit_image') {

        

            $query = Bdd::connectBdd()->prepare("UPDATE eg_banniere SET eg_banniere_date = now(), eg_banniere_user = :eg_banniere_user, eg_banniere_nom = :eg_banniere_nom, eg_banniere_image = :eg_banniere_image, eg_banniere_statut = :eg_banniere_statut, eg_banniere_lien = :eg_banniere_lien  WHERE eg_banniere_id = :eg_banniere_id");

            $query->bindParam(":eg_banniere_id", $_POST['id_banniere'], PDO::PARAM_INT);
            $query->bindParam(":eg_banniere_user", $_POST['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_banniere_nom", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":eg_banniere_image", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":eg_banniere_statut", $_POST['statut'], PDO::PARAM_INT);
            $query->bindParam(":eg_banniere_lien", $_POST['lien'], PDO::PARAM_STR);

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
