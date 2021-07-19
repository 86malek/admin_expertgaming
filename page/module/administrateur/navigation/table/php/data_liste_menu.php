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

    if ($job == 'get_liste_menu' || $job == 'add_menu' || $job == 'edit_menu' || $job == 'del_menu') {

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

    if ($job == 'get_liste_menu') {

        $PDO_query_menu = Bdd::connectBdd()->prepare("SELECT * FROM eg_menu ORDER BY eg_menu_id ASC");
        $PDO_query_menu->execute();

        while ($menu = $PDO_query_menu->fetch()) {

                        $functions = '
                        <a href="modif_ajout_menu.php?id='.$menu['eg_menu_id'].'" style="font-size: 0.9rem !important;" class="btn btn-info btn-sm waves-effect waves-float waves-light mr-1""><i class="bi bi-pen"></i></a>';

                        $PDO_query_verif_menu = Bdd::connectBdd()->prepare("SELECT * FROM eg_categorie WHERE eg_menu_id  = :eg_menu_id");
                        $PDO_query_verif_menu->bindParam(":eg_menu_id", $menu['eg_menu_id'], PDO::PARAM_STR);
                        $PDO_query_verif_menu->execute();

                        $menu_existe = $PDO_query_verif_menu->rowCount();

                        $PDO_query_verif_menu->closeCursor();

                        if($menu_existe == 0){
                            $functions .= 
                                '<a href="#" style="font-size: 0.9rem !important;" class="btn btn-danger btn-sm waves-effect waves-float waves-light pr-1" data-id="' .
                                $menu['eg_menu_id'] .'" data-name="' .$menu['eg_menu_titre'] .'" id="delete-record"><i class="bi bi-trash"></i></a>
                            ';
                        }else{

                            $functions .= 
                                '<a style="font-size: 0.9rem !important;" class="btn btn-secondary btn-sm waves-effect waves-float waves-light"><i class="bi bi-trash"></i></a>
                            ';

                        }

            
                        switch($menu['eg_menu_hot'])
                        {
                            case '1':
                                $hot = '<div class="badge badge-success">Icone HOT activée</div>';
                            break; 
                                                    
                            default:
                                $hot = '<div class="badge badge-light-danger">Icone HOT non-activée</div>';
                        }

                        switch($menu['eg_menu_statut'])
                        {
                            case '1':
                                $statut = '<div class="badge badge-success">Actif</div>';
                            break; 
                                                    
                            default:
                                $statut = '<div class="badge badge-light-danger">Non-Actif</div>';
                        }

                        $date = date_create($menu['eg_menu_date']);

                        $ordre = '<div class="badge badge-light-dark">'.$menu['eg_menu_ordre'].'</div>';


                        $name_user = Membre::info($menu['eg_menu_user'], 'nom').' '.Membre::info($menu['eg_menu_user'], 'prenom');

                        $titre = $menu['eg_menu_titre'];

                        $id = $menu['eg_menu_id'];

                        $mysql_data[] = [
                            "responsive_id" => "",
                            "id" => $id,
                            "full_name" => $name_user,
                            "post" => $titre,
                            "titre" => $titre,
                            "start_date" => date_format($date, "d/m/Y"),
                            "status" => $statut,                
                            "hot" => $hot,
                            "ordre" => $ordre,
                            "Actions" => $functions
                        ];
        }

        $PDO_query_menu->closeCursor();
        $result = 'success';
        $message = 'Succès de requête';

        $bdd = null;
        $PDO_query_comm = null;


    }elseif ($job == 'add_menu') {
        try {
            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_menu (`eg_menu_date`, `eg_menu_user`, `eg_menu_titre`, `eg_menu_hot`, `eg_menu_ordre`, `eg_menu_statut`)
			 VALUES (now(), :user, :menu_titre, :menu_hot, :ordre, :statut)");

            $query->bindParam(":menu_titre", $_GET['titre'], PDO::PARAM_STR);
            $query->bindParam(":menu_hot", $_GET['hot'], PDO::PARAM_INT);
            $query->bindParam(":ordre", $_GET['ordre'], PDO::PARAM_INT);
            $query->bindParam(":statut", $_GET['statut'], PDO::PARAM_INT);
            $query->bindParam(":user", $_GET['user'], PDO::PARAM_STR);

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

    }elseif ($job == 'del_menu') {

        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {

            try {
                $query_del = Bdd::connectBdd()->prepare("DELETE FROM eg_menu WHERE eg_menu_id = :id");
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

    }elseif ($job == 'edit_menu') {

        if ($id == '') {

            $result = 'Échec';
            $message = 'Échec id';

        } else {

            $query = Bdd::connectBdd()->prepare("UPDATE eg_menu SET eg_menu_date = now(), eg_menu_user = :eg_menu_user, eg_menu_titre = :eg_menu_titre, eg_menu_hot = :eg_menu_hot, eg_menu_ordre = :eg_menu_ordre, eg_menu_statut = :eg_menu_statut  WHERE eg_menu_id = :eg_menu_id");

            $query->bindParam(":eg_menu_id", $id, PDO::PARAM_INT);

            $query->bindParam(":eg_menu_user", $_GET['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_menu_titre", $_GET['titre'], PDO::PARAM_STR);
            $query->bindParam(":eg_menu_hot", $_GET['hot'], PDO::PARAM_INT);
            $query->bindParam(":eg_menu_ordre", $_GET['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_menu_statut", $_GET['statut'], PDO::PARAM_INT);

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
