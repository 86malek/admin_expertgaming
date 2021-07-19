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

    if ($job == 'get_liste_scat' || $job == 'add_scat' || $job == 'edit_scat' || $job == 'del_scat') {

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

    if ($job == 'get_liste_scat') {

        $PDO_query_scategorie = Bdd::connectBdd()->prepare("SELECT * FROM eg_sous_categorie ORDER BY eg_sous_categorie_id ASC");
        $PDO_query_scategorie->execute();

        while ($scat = $PDO_query_scategorie->fetch()) {

                        $functions = '
                        <a href="modif_ajout_scat.php?id='.$scat['eg_sous_categorie_id'].'" style="font-size: 0.9rem !important;" class="btn btn-info btn-sm waves-effect waves-float waves-light mr-25 mb-25""><i class="bi bi-pen"></i></a>';

                        $PDO_query_verif_scat = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_sous_categorie_id  = :eg_sous_categorie_id");
                        $PDO_query_verif_scat->bindParam(":eg_sous_categorie_id", $scat['eg_sous_categorie_id'], PDO::PARAM_INT);
                        $PDO_query_verif_scat->execute();

                        $scat_existe = $PDO_query_verif_scat->rowCount();

                        $PDO_query_verif_scat->closeCursor();


                        $PDO_query_verif_cat = Bdd::connectBdd()->prepare("SELECT * FROM eg_categorie WHERE eg_categorie_id = :eg_categorie_id");
                        $PDO_query_verif_cat->bindParam(":eg_categorie_id", $scat['eg_sous_categorie_id_categorie'], PDO::PARAM_INT);
                        $PDO_query_verif_cat->execute();
                        $menu_titre_cat = $PDO_query_verif_cat->fetch();
                        $PDO_query_verif_cat->closeCursor();

                        $PDO_query_verif_menu = Bdd::connectBdd()->prepare("SELECT * FROM eg_menu WHERE eg_menu_id = :eg_menu_id");
                        $PDO_query_verif_menu->bindParam(":eg_menu_id", $menu_titre_cat['eg_menu_id'], PDO::PARAM_INT);
                        $PDO_query_verif_menu->execute();
                        $titre_menu = $PDO_query_verif_menu->fetch();
                        $PDO_query_verif_menu->closeCursor();


                        if($scat_existe == 0){

                            $functions .= 
                                '<a href="#" style="font-size: 0.9rem !important;" class="btn btn-danger btn-sm waves-effect waves-float waves-light pr-1" data-id="' .
                                $scat['eg_sous_categorie_id'] .'" data-name="' .$scat['eg_sous_categorie_nom'] .'" id="delete-record mb-25"><i class="bi bi-trash"></i></a>
                            ';

                        }else{

                            $functions .= 
                                '<a style="font-size: 0.9rem !important;" class="btn btn-secondary btn-sm waves-effect waves-float waves-light mb-25"><i class="bi bi-trash"></i></a>
                            ';

                        }

                        switch($scat['eg_sous_categorie_statut'])
                        {
                            case '1':
                                $statut = '<div class="badge badge-success">Actif</div>';
                            break; 
                                                    
                            default:
                                $statut = '<div class="badge badge-light-danger">Non-Actif</div>';
                        }

                        $date = date_create($scat['eg_sous_categorie_date']);

                        $name_user = Membre::info($scat['eg_sous_categorie_user'], 'nom').' '.Membre::info($scat['eg_sous_categorie_user'], 'prenom');

                        $titre = '<b>'.$titre_menu['eg_menu_titre'].'</b> > <b>'.$menu_titre_cat['eg_categorie_nom'].'</b> > '.$scat['eg_sous_categorie_nom'];

                        $id = $scat['eg_sous_categorie_id'];

                        $mysql_data[] = [
                            "responsive_id" => "",
                            "id" => $id,
                            "full_name" => $name_user,
                            "post" => $titre,
                            "titre" => $titre,
                            "start_date" => date_format($date, "d/m/Y"),
                            "status" => $statut,                
                            "Actions" => $functions
                        ];
        }

        $PDO_query_scategorie->closeCursor();
        $result = 'success';
        $message = 'Succès de requête';

        $bdd = null;
        $PDO_query_comm = null;


    }elseif ($job == 'add_scat') {
        try {
            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_sous_categorie (`eg_sous_categorie_date`, `eg_sous_categorie_user`, `eg_sous_categorie_id_categorie`, `eg_sous_categorie_nom`, `eg_sous_categorie_statut`)
			 VALUES (now(), :user, :cat_id, :scat_titre, :statut)");

            $query->bindParam(":scat_titre", $_GET['titre'], PDO::PARAM_STR);
            $query->bindParam(":cat_id", $_GET['cat'], PDO::PARAM_INT);
            $query->bindParam(":statut", $_GET['statut'], PDO::PARAM_INT);
            $query->bindParam(":user", $_GET['user'], PDO::PARAM_INT);

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

    }elseif ($job == 'del_scat') {

        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {

            try {
                $query_del = Bdd::connectBdd()->prepare("DELETE FROM eg_sous_categorie WHERE eg_sous_categorie_id = :id");
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

    }elseif ($job == 'edit_scat') {

        if ($id == '') {

            $result = 'Échec';
            $message = 'Échec id';

        } else {

            $query = Bdd::connectBdd()->prepare("UPDATE eg_sous_categorie SET eg_sous_categorie_date = now(), eg_sous_categorie_user = :eg_sous_categorie_user, eg_sous_categorie_id_categorie = :eg_sous_categorie_id_categorie, eg_sous_categorie_nom = :eg_sous_categorie_nom, eg_sous_categorie_statut = :eg_sous_categorie_statut  WHERE eg_sous_categorie_id = :eg_sous_categorie_id");

            $query->bindParam(":eg_sous_categorie_id", $id, PDO::PARAM_INT);

            $query->bindParam(":eg_sous_categorie_user", $_GET['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_sous_categorie_nom", $_GET['titre'], PDO::PARAM_STR);
            $query->bindParam(":eg_sous_categorie_id_categorie", $_GET['cat'], PDO::PARAM_INT);
            $query->bindParam(":eg_sous_categorie_statut", $_GET['statut'], PDO::PARAM_INT);

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
