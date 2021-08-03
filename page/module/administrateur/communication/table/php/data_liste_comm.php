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

/*page_protect();
if (!checkAdmin()) {
    die("Secured");
    exit();
}*/

$job = '';
$id = '';
$st = '';

if (isset($_GET['job'])) {
    $job = $_GET['job'];

    if ($job == 'get_liste_comm' || $job == 'add_comm' || $job == 'comm_edit' || $job == 'del_com') {

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
    if ($job == 'get_liste_comm') {

        $PDO_query_comm = Bdd::connectBdd()->prepare("SELECT * FROM eg_comm WHERE eg_comm_statut <> 3 ORDER BY eg_comm_id ASC");
        $PDO_query_comm->execute();

        while ($communication = $PDO_query_comm->fetch()) {

            $functions = '

            <a href="modif_comm.php?id='.$communication['eg_comm_id'].'" style="font-size: 1.5rem !important;" class="btn waves-effect waves-float waves-light mr-25 mb-25 p-0">
                <i class="bi bi-pencil-square"></i>
            </a>
            <a href="#" id="delete-record" data-id="' .$communication['eg_comm_id'].'" data-name="' .$communication['eg_comm_titre'].'" style="font-size: 1.5rem !important;" class="btn waves-effect waves-float waves-light mr-25 mb-25 p-0">
                <i class="bi bi-trash"></i>
            </a>
            
            ';


            $date = date_create($communication['eg_comm_date']);
            $name_user = Membre::info($_SESSION['id'], 'nom').' '.Membre::info($_SESSION['id'], 'prenom');
            $titre = $communication['eg_comm_titre'];
            $id = $communication['eg_comm_id'];

            switch($communication['eg_comm_cat'])
            {
                case '1':
                    $cat = '<div class="badge badge-light-success">Information générale</div>';
                break;
                case '2':
                    $cat = '<div class="badge badge-light-info">Divers</div>';
                break;  
                case '3':
                    $cat = '<div class="badge badge-light-info">Tech</div>';
                break; 
                case '5':
                    $cat = '<div class="badge badge-light-secondary">Annonce</div>';
                break;                            
                default:
                    $cat = '<div class="badge badge-light-info">Attente de catégorie</div>';
            }


            switch($communication['eg_comm_statut'])
            {
                case '1':
                    $statut = '<div class="badge badge-light-warning">Active</div>';
                break;
                case '0':
                    $statut = '<div class="badge badge-light-success">Non-active</div>';
                break;
            }
            $stitre = $communication['eg_comm_sous_titre'];
            $photo = Membre::info($_SESSION['id'], 'photo');
            if($photo != NULL)
            {
                $avatar = $photo;
            }
            else
            {
                $avatar = 'https://'.$_SERVER['SERVER_NAME'].'/'.$PARAM_url_non_doc_site.'/app-assets/images/portrait/small/man.png';
            }


            $mysql_data[] = [
                "responsive_id" => "",
                "id" => $id,
                "full_name" => $name_user,
                "post" => $stitre,
                "titre" => $titre,
                "cat" => $cat,
                "city" => "Krasnosilka",
                "start_date" => date_format($date, "d/m/Y"),
                "age" => "61",
                "experience" => "1 Year",
                "status" => $statut,
                "avatar" => $avatar,
                "Actions" => $functions
            ];
        }

        $PDO_query_comm->closeCursor();
        $result = 'success';
        $message = 'Succès de requête';

        $bdd = null;
        $PDO_query_comm = null;


    } elseif ($job == 'add_comm') {
        try {
            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_comm (`eg_comm_titre`, `eg_comm_sous_titre`, `eg_comm_date`, `eg_comm_desc`, `eg_comm_img`, `eg_comm_statut`, `eg_comm_cat`, `eg_comm_user`)
			 VALUES (:comm_titre, :comm_sous_titre, now(), :article, :img, :statut, :cat, :user)");

            $query->bindParam(":comm_titre", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":comm_sous_titre", $_POST['stitre'], PDO::PARAM_STR);
            $query->bindParam(":article", $_POST['article'], PDO::PARAM_STR);
            $query->bindParam(":img", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":statut", $_POST['statut'], PDO::PARAM_INT);
            $query->bindParam(":cat", $_POST['cat'], PDO::PARAM_INT);
            $query->bindParam(":user", $_POST['user'], PDO::PARAM_STR);

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
    } elseif ($job == 'del_com') {
        if ($id == '') {
            $result = 'error';
            $message = 'Échec id';
        } else {
            
                $query_select_del = Bdd::connectBdd()->prepare("DELETE FROM `eg_comm` WHERE eg_comm_id = :eg_comm_id");
                $query_select_del->bindParam(":eg_comm_id", $id, PDO::PARAM_INT);
                $query_select_del->execute(); 
                $query_select_del->closeCursor();

                $result = 'success';
                $message = 'Succès de requête';
           
        }
    } elseif ($job == 'comm_edit') {
       
            $query = Bdd::connectBdd()->prepare("UPDATE eg_comm SET eg_comm_user = :eg_comm_user, eg_comm_date = NOW(), eg_comm_cat = :eg_comm_cat, eg_comm_titre = :eg_comm_titre, eg_comm_sous_titre = :eg_comm_sous_titre, eg_comm_desc = :eg_comm_desc, eg_comm_img = :eg_comm_img, eg_comm_statut = :eg_comm_statut  WHERE eg_comm_id = :eg_comm_id");
            $query->bindParam(":eg_comm_id", $_POST['id_comm'], PDO::PARAM_INT);
            $query->bindParam(":eg_comm_user", $_POST['user'], PDO::PARAM_STR);
            $query->bindParam(":eg_comm_cat", $_POST['cat'], PDO::PARAM_INT);
            $query->bindParam(":eg_comm_titre", $_POST['titre'], PDO::PARAM_STR);
            $query->bindParam(":eg_comm_sous_titre", $_POST['stitre'], PDO::PARAM_STR);
            $query->bindParam(":eg_comm_desc", $_POST['article'], PDO::PARAM_STR);
            $query->bindParam(":eg_comm_img", $_POST['img'], PDO::PARAM_STR);
            $query->bindParam(":eg_comm_statut", $_POST['statut'], PDO::PARAM_INT);
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
