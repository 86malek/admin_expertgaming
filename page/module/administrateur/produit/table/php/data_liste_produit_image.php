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

    if ($job == 'get_liste_produit' || $job == 'add_produit' || $job == 'edit_produit_image_1' || $job == 'edit_produit_image_2' ||  $job == 'edit_produit_image_3' ||   $job == 'edit_produit_image_4' || $job == 'del_produit') {

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

    if ($job == 'get_liste_produit') {

        $PDO_query_produit = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit ORDER BY eg_produit_id ASC");
        $PDO_query_produit->execute();

        while ($produit = $PDO_query_produit->fetch()) {

                        $functions = '
                        <a href="modif_ajout_produit.php?id='.$produit['eg_produit_id'].'" style="font-size: 0.9rem !important;" class="btn btn-info btn-sm waves-effect waves-float waves-light mr-1"">Modifer les details</a>';
                        $biblioimg = '
                        <a href="modif_ajout_produit.php?id='.$produit['eg_produit_id'].'" style="font-size: 0.9rem !important;" class="btn btn-warning btn-sm waves-effect waves-float waves-light mr-1"">Gestion des photos</a>';

                        $PDO_query_verif_img = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id  = :eg_produit_id");
                        $PDO_query_verif_img->bindParam(":eg_produit_id", $produit['eg_produit_id'], PDO::PARAM_INT);
                        $PDO_query_verif_img->execute();

                        $img_existe = $PDO_query_verif_img->rowCount();

                        if($img_existe > 0){
                        $img_prod = $PDO_query_verif_img->fetch();
                        $logo = '
                        <div class="media-left">
                            <img src="upload/'.$img_prod['eg_image_produit_nom'].'" alt="avatar" width="90">
                        </div>';
                        }else{

                            $logo='Aucune-Image'; 
                        }


                        $PDO_query_verif_img->closeCursor();

                        if($produit['eg_categorie_id'] != 0){
                            $PDO_query_verif_cat = Bdd::connectBdd()->prepare("SELECT * FROM eg_categorie WHERE eg_categorie_id = :eg_categorie_id");
                            $PDO_query_verif_cat->bindParam(":eg_categorie_id", $produit['eg_categorie_id'], PDO::PARAM_INT);
                            $PDO_query_verif_cat->execute();
                            $menu_titre_cat = $PDO_query_verif_cat->fetch();
                            $PDO_query_verif_cat->closeCursor();
                            $cat = $menu_titre_cat['eg_categorie_nom'];
                        }else{$cat = '.';}
                        if($produit['eg_menu_id'] != 0){
                            $PDO_query_verif_menu = Bdd::connectBdd()->prepare("SELECT * FROM eg_menu WHERE eg_menu_id = :eg_menu_id");
                            $PDO_query_verif_menu->bindParam(":eg_menu_id", $produit['eg_menu_id'], PDO::PARAM_INT);
                            $PDO_query_verif_menu->execute();
                            $titre_menu = $PDO_query_verif_menu->fetch();
                            $PDO_query_verif_menu->closeCursor();
                            $menu = $titre_menu['eg_menu_titre'];
                        }else{$menu = '.';}

                        if($produit['eg_sous_categorie_id'] != 0){
                            $PDO_query_verif_scat = Bdd::connectBdd()->prepare("SELECT * FROM eg_sous_categorie WHERE eg_sous_categorie_id = :eg_sous_categorie_id");
                            $PDO_query_verif_scat->bindParam(":eg_sous_categorie_id", $produit['eg_sous_categorie_id'], PDO::PARAM_INT);
                            $PDO_query_verif_scat->execute();
                            $titre_scat = $PDO_query_verif_scat->fetch();
                            $PDO_query_verif_scat->closeCursor();
                            $scat = $titre_scat['eg_sous_categorie_nom'];
                        }else{$scat = '.';}


                            $app = '<b>'.$menu.'</b> > <b>'.$cat.'</b> > <b>'.$scat.'</b>';


                        if($img_existe == 0){

                            $functions .= 
                                '<a href="#" style="font-size: 0.9rem !important;" class="btn btn-danger btn-sm waves-effect waves-float waves-light" data-id="' .
                                $produit['eg_produit_id'] .'" data-name="' .$produit['eg_produit_nom'] .'" id="delete-record">Supprimer</a>
                            ';

                        }else{

                            $functions .= 
                                '<a style="font-size: 0.9rem !important;" class="btn btn-secondary btn-sm waves-effect waves-float waves-light mt-1">Supp impossible</a>
                            ';

                        }

                        switch($produit['eg_produit_statut'])
                        {
                            case '1':
                                $statut = '<div class="badge badge-success">Actif</div>';
                            break; 
                                                    
                            default:
                                $statut = '<div class="badge badge-light-danger">Non-Actif</div>';
                        }

                        $date = date_create($produit['eg_produit_date']);

                        if($produit['eg_produit_promo'] == 0.000){

                            $badgepromo = '<div class="badge badge-light-secondary">Hors promo</div>';
                            $prix = '<b>'.$produit['eg_produit_prix'].'</b>';

                        }else{
                            $badgepromo = '<div class="badge badge-light-danger">En Promo</div>';
                            $prix = '<strike><b>'.$produit['eg_produit_prix'].'</b></strike><br><b class="text-danger">'.$produit['eg_produit_promo'].'</b>';

                        }
                        $promo = '<b>'.$produit['eg_produit_promo'].'</b>';

                        /*$logo = '
                                <div class="media-left">
                                    <img src="'.Admin::menuproduit().$img_prod['eg_image_produit_nom'].'" alt="avatar" width="150">
                                </div>';*/


                        


                        $name_user = Membre::info($produit['eg_produit_user'], 'nom').' '.Membre::info($produit['eg_produit_user'], 'prenom');

                        $titre = $produit['eg_produit_nom'];
                        $modele = $produit['eg_produit_modele'];
                        $ref = $produit['eg_produit_reference'];

                        switch($produit['eg_produit_dispo'])
                        {
                            case '1':
                                $dispo = '<div class="badge badge-success">Dispo</div>';
                            break; 
                                                    
                            default:
                                $dispo = '<div class="badge badge-light-danger">Non-dispo</div>';
                        }

                        switch($produit['eg_produit_top_vente'])
                        {
                            case '1':
                                $top = '<div class="badge badge-success">Top-Vente</div>';
                            break; 
                                                    
                            default:
                                $top = '<div class="badge badge-light-secondary">Normal</div>';
                        }                        

                        $id = $produit['eg_produit_id'];

                        $mysql_data[] = [
                            "responsive_id" => "",
                            "id" => $id,
                            "full_name" => $name_user,
                            "logo" => $logo,
                            "post" => $app,
                            "titre" => $titre,
                            "modele" => $modele,
                            "ref" => $ref,
                            "prix" => $prix,
                            "bpromo" => $badgepromo,
                            "top" => $top,
                            "dispo" => $dispo,
                            "start_date" => date_format($date, "d/m/Y"),
                            "status" => $statut,   
                            "biblioimg" => $biblioimg,             
                            "Actions" => $functions
                        ];
        }

        $PDO_query_produit->closeCursor();
        $result = 'success';
        $message = 'Succès de requête';

        $bdd = null;
        $PDO_query_comm = null;


    }elseif ($job == 'add_produit') {
        try {

            $query = Bdd::connectBdd()->prepare("INSERT INTO eg_produit (`eg_produit_date`, `eg_produit_user`, `eg_categorie_id`, `eg_sous_categorie_id`,`eg_menu_id`, `eg_produit_nom`, `eg_produit_etoiles`, `eg_produit_reference`, `eg_produit_modele`, `eg_produit_prix`, `eg_produit_promo`, `eg_produit_disponibilite`, `eg_produit_description`, `eg_produit_top_vente`, `eg_produit_statut`, `eg_produit_dispo`, `eg_marque_id`, `eg_produit_description_longue`) VALUES (now(), :eg_produit_user, :eg_categorie_id, :eg_sous_categorie_id,  :eg_menu_id, :eg_produit_nom, :eg_produit_etoiles, :eg_produit_reference, :eg_produit_modele, :eg_produit_prix, :eg_produit_promo, :eg_produit_disponibilite, :eg_produit_description, :eg_produit_top_vente, :eg_produit_statut, :eg_produit_dispo, :eg_marque_id, :eg_produit_description_longue)");
            
            $query->bindParam(":eg_produit_user", $_GET['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_categorie_id", $_GET['cat'], PDO::PARAM_INT);
            $query->bindParam(":eg_sous_categorie_id", $_GET['scat'], PDO::PARAM_INT);
            $query->bindParam(":eg_menu_id", $_GET['menu'], PDO::PARAM_INT);
            $query->bindParam(":eg_marque_id", $_GET['marque'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_nom", $_GET['titre'], PDO::PARAM_STR);
            $query->bindParam(":eg_produit_etoiles", $_GET['etoile'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_reference", $_GET['ref'], PDO::PARAM_STR);
            $query->bindParam(":eg_produit_modele", $_GET['modele'], PDO::PARAM_STR);
            $query->bindParam(":eg_produit_prix", $_GET['prix'], PDO::PARAM_STR);
            $query->bindParam(":eg_produit_promo", $_GET['promo'], PDO::PARAM_STR);
            $query->bindParam(":eg_produit_disponibilite", $_GET['dispo'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_description", $_GET['desc'], PDO::PARAM_STR);
            $query->bindParam(":eg_produit_description_longue", $_GET['desc_longue'], PDO::PARAM_STR);
            $query->bindParam(":eg_produit_top_vente", $_GET['topvente'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_statut", $_GET['statut'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_dispo", $_GET['dispo'], PDO::PARAM_INT);

            $query->execute();
            $query->closeCursor();

            $result = 'success';
            $message = 'Produit ajouté avec succés';
            
        } catch (PDOException $x) {
            die("Secured");
            $result = 'error';
            $message = 'Échec de requête';
        }
        $query = null;
        $bdd = null;

    }elseif ($job == 'del_produit') {

        if ($id == '') {
            $result = 'Échec';
            $message = 'Échec id';
        } else {

            try {
                $query_del = Bdd::connectBdd()->prepare("DELETE FROM eg_produit WHERE eg_produit_id = :id");
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

    }elseif ($job == 'edit_produit_image_1') {

        if ($id == '') {

            $result = 'Échec';
            $message = 'Échec id';

        } else {

            $query = Bdd::connectBdd()->prepare("UPDATE eg_image_produit SET eg_image_produit_date = now(), eg_image_produit_user = :eg_image_produit_user, eg_image_produit_nom = :eg_image_produit_nom, eg_image_produit_ordre = :eg_image_produit_ordre, eg_produit_id = :eg_produit_id, eg_image_produit_statut = :eg_image_produit_statut WHERE eg_image_produit_id = :eg_image_produit_id");

            $query->bindParam(":eg_image_produit_id", $id, PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_user", $_GET['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_GET['img1'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_GET['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_GET['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_GET['statut'], PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            $result = 'success';
            $message = 'Succès de requête';
        }
    }elseif ($job == 'edit_produit_image_2') {

        if ($id == '') {

            $result = 'Échec';
            $message = 'Échec id';

        } else {

            $query = Bdd::connectBdd()->prepare("UPDATE eg_image_produit SET eg_image_produit_date = now(), eg_image_produit_user = :eg_image_produit_user, eg_image_produit_nom = :eg_image_produit_nom, eg_image_produit_ordre = :eg_image_produit_ordre, eg_produit_id = :eg_produit_id, eg_image_produit_statut = :eg_image_produit_statut WHERE eg_image_produit_id = :eg_image_produit_id");

            $query->bindParam(":eg_image_produit_id", $id, PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_user", $_GET['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_GET['img2'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_GET['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_GET['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_GET['statut'], PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            $result = 'success';
            $message = 'Succès de requête';
        }
    }elseif ($job == 'edit_produit_image_3') {

        if ($id == '') {

            $result = 'Échec';
            $message = 'Échec id';

        } else {

            $query = Bdd::connectBdd()->prepare("UPDATE eg_image_produit SET eg_image_produit_date = now(), eg_image_produit_user = :eg_image_produit_user, eg_image_produit_nom = :eg_image_produit_nom, eg_image_produit_ordre = :eg_image_produit_ordre, eg_produit_id = :eg_produit_id, eg_image_produit_statut = :eg_image_produit_statut WHERE eg_image_produit_id = :eg_image_produit_id");

            $query->bindParam(":eg_image_produit_id", $id, PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_user", $_GET['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_GET['img3'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_GET['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_GET['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_GET['statut'], PDO::PARAM_INT);

            $query->execute();

            $query->closeCursor();

            $result = 'success';
            $message = 'Succès de requête';
        }
    }elseif ($job == 'edit_produit_image_4') {

        if ($id == '') {

            $result = 'Échec';
            $message = 'Échec id';

        } else {

            $query = Bdd::connectBdd()->prepare("UPDATE eg_image_produit SET eg_image_produit_date = now(), eg_image_produit_user = :eg_image_produit_user, eg_image_produit_nom = :eg_image_produit_nom, eg_image_produit_ordre = :eg_image_produit_ordre, eg_produit_id = :eg_produit_id, eg_image_produit_statut = :eg_image_produit_statut WHERE eg_image_produit_id = :eg_image_produit_id");

            $query->bindParam(":eg_image_produit_id", $id, PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_user", $_GET['user'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_nom", $_GET['img4'], PDO::PARAM_STR);
            $query->bindParam(":eg_image_produit_ordre", $_GET['ordre'], PDO::PARAM_INT);
            $query->bindParam(":eg_produit_id", $_GET['id_produit'], PDO::PARAM_INT);
            $query->bindParam(":eg_image_produit_statut", $_GET['statut'], PDO::PARAM_INT);

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
