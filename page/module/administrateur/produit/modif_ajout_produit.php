<?php 

session_start();
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
    if (file_exists("../../../../config/" . $page) && $page != 'index.php') {
        include "../../../../config/" . $page;
    } else {
        echo "Page inexistante !";
    }
}
if(empty($_SESSION['id'])){

    ProtectEspace::administrateur("", "", "");

}else{

    ProtectEspace::administrateur($_SESSION['id'], $_SESSION['jeton'], $_SESSION['niveau']);

}
if(!empty($_GET["id"])){$id_produit = $_GET["id"];}else{$id_produit = "";}


$PDO_query_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
$PDO_query_produit_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
$PDO_query_produit_unique->execute();
$produit = $PDO_query_produit_unique->fetch();
$PDO_query_produit_unique->closeCursor();

?>

<!DOCTYPE html>
<html class="loading bordered-layout" lang="Fr" data-layout="bordered-layout" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title><?php if(!empty($_GET["id"])){echo'Produit Modification | Expert Gaming';}else{echo'Produit Ajout | Expert Gaming';} ?></title>
    <link rel="apple-touch-icon" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/images/ico/favicon.png">
    <link rel="shortcut icon" type="image/x-icon" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/images/ico/favicon.png">
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:ital,wght@0,300;0,400;0,500;0,600;1,400;1,500;1,600"
        rel="stylesheet">

    <!-- BEGIN: Vendor CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/vendors.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/forms/select/select2.min.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/css/extensions/sweetalert2.min.css">
    <!-- END: Vendor CSS-->

    <!-- BEGIN: Theme CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/bootstrap.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/bootstrap-extended.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/colors.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/components.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/dark-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/semi-dark-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/pages/ui-feather.css">

    <!-- BEGIN: Page CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/core/menu/menu-types/vertical-menu.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/themes/bordered-layout.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/forms/form-quill-editor.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/pages/page-blog.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/forms/form-validation.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/forms/pickers/form-flat-pickr.css">
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/css/plugins/extensions/ext-component-sweet-alerts.css">
    <link rel="stylesheet" type="text/css" href="//code.jquery.com/ui/1.10.3/themes/smoothness/jquery-ui.css">    
    <!-- END: Page CSS-->

    <!-- BEGIN: Custom CSS-->
    <link rel="stylesheet" type="text/css" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/assets/css/style.css">
    
    <!-- END: Custom CSS-->
</head>
<!-- END: Head-->

<!-- BEGIN: Body-->

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static" data-open="click"
    data-menu="vertical-menu-modern" data-col="">

    <!-- BEGIN: Header-->
    <?php
	$page = '';
	if (empty($page)) {
	 $page = "top";
	 // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
	 // On supprime également d'éventuels espaces
	 $page = trim($page.".php");
	
	}
	
	// On évite les caractères qui permettent de naviguer dans les répertoires
	$page = str_replace("../","protect",$page);
	$page = str_replace(";","protect",$page);
	$page = str_replace("%","protect",$page);
	
	// On interdit l'inclusion de dossiers protégés par htaccess
	if (preg_match("/include/",$page)) {
	 echo "Vous n'avez pas accès à ce répertoire";
	 }
	
	else {
	
		// On vérifie que la page est bien sur le serveur
		if (file_exists("../../../include/".$page) && $page != 'index.php') {
		   include("../../../include/".$page); 
		}
	
		else {
			echo "Page inexistante !";
		}
	}
	
	?>
    <!-- END: Header-->

    <!-- BEGIN: Main Menu-->
    <?php
	$page = '';
	if (empty($page)) {
	 $page = "menu";
	 // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
	 // On supprime également d'éventuels espaces
	 $page = trim($page.".php");
	
	}
	
	// On évite les caractères qui permettent de naviguer dans les répertoires
	$page = str_replace("../","protect",$page);
	$page = str_replace(";","protect",$page);
	$page = str_replace("%","protect",$page);
	
	// On interdit l'inclusion de dossiers protégés par htaccess
	if (preg_match("/include/",$page)) {
	 echo "Vous n'avez pas accès à ce répertoire";
	 }
	
	else {
	
		// On vérifie que la page est bien sur le serveur
		if (file_exists("../../../include/".$page) && $page != 'index.php') {
		   include("../../../include/".$page); 
		}
	
		else {
			echo "Page inexistante !";
		}
	}
	
	?>
    <!-- END: Main Menu-->

    <!-- BEGIN: Content-->
    <div class="app-content content ">
        <div class="content-overlay"></div>
        <div class="header-navbar-shadow"></div>
        <div class="content-wrapper">
            <div class="content-header row">
                <div class="content-header-left col-md-9 col-12 mb-2">
                    <div class="row breadcrumbs-top">
                        <div class="col-12">
                            <h2 class="content-header-title float-left mb-0">ADMINISTRATION</h2>
                            <div class="breadcrumb-wrapper">
                                <ol class="breadcrumb">

                                    <li class="breadcrumb-item active"><a href="liste_rubrique_produit.php">Liste des produits</a></li>

                                    <li class="breadcrumb-item "><?php if(!empty($_GET["id"])){echo'Modification du produit';}else{echo'Ajout du produit';} ?></li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">
                        
                        <?php if(!empty($id_produit)){echo '<a class="btn-icon btn btn-warning btn-round btn-sm waves-effect waves-float waves-light" href="modif_ajout_produit_image.php?id='.$id_produit.'">Galerie des photos</a>';} ?>
                        
                        <a class="btn-icon btn btn-success btn-round btn-sm waves-effect waves-float waves-light" href="liste_rubrique_produit.php">Revenir à la liste</a>                     

                    </div>
                </div>
            </div>

            <!-- Begin : main content -->
            <div class="content-body">
                <!-- Blog Edit -->
                <div class="blog-edit-wrapper">
                    <div class="row">
                        <div class="col-12">
                            <div class="card">
                                <div class="card-body">
                                    <div class="media mb-2">

                                        <div class="avatar mr-75">
                                            <img src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/images/portrait/small/man.png" width="38" height="38" alt="Avatar" />
                                        </div>

                                        <div class="media-body">
                                            <h6 class="mb-25"><?php echo Membre::info($_SESSION['id'], 'nom').' '.Membre::info($_SESSION['id'], 'prenom');?></h6>
                                            <p class="card-text"><?php echo $date = date("d-m-Y");?></p>
                                        </div>

                                    </div>

                                    <!-- Form -->
                                    <form method="post" id="jquery-val-form" class="<?php if(!empty($id_produit)){echo 'edit';}else{echo 'add';} ?>" data-id="<?php echo $id_produit; ?>">
                                                            
                                        <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>">

                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="basic-default-titre">Nom du produit *:</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="basic-default-titre"
                                                    name="titre"
                                                    placeholder="Maximum 150 caractéres !"
                                                    value="<?php if(!empty($id_produit)){echo $produit['eg_produit_nom'];}?>"
                                                    required
                                                    />                                                 
                                                </div>
                                            </div>                                            
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-menu">Menu *:</label>
                                                    <select class="select2 form-control" id="blog-edit-menu" name="menu" required>
                                                        <?php 
                                                                                                                           
                                                                
                                                                $PDO_query_menu_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_menu ORDER BY eg_menu_id DESC");
                                                                $PDO_query_menu_liste_select->execute();
                                                                while($menu_liste = $PDO_query_menu_liste_select->fetch()){

                                                                    if(isset($produit['eg_menu_id']) && $produit['eg_menu_id'] == $menu_liste['eg_menu_id']){
                                                                        echo '<option value="'.$menu_liste['eg_menu_id'].'" selected>'.$menu_liste['eg_menu_titre'].'</option>';
                                                                        
                                                                    }else{
                                                                        echo '<option value="'.$menu_liste['eg_menu_id'].'">'.$menu_liste['eg_menu_titre'].'</option>';

                                                                    }
                                                                }
                                                                if(!empty($_GET["id"])){echo '<option value="">Selectionnez un Menu ...</option>';}else{echo '<option value="" selected>Selectionnez un Menu ...</option>';}
                                                                $PDO_query_menu_liste_select->closeCursor();  

                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                        </div>
                                        <div class="row">

                                            <div class="col-md-3 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="basic-default-titre">Modele *:</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="basic-default-titre"
                                                    name="modele"
                                                    placeholder=""
                                                    value="<?php if(!empty($id_produit)){echo $produit['eg_produit_modele'];}?>"
                                                    required
                                                    />                                                 
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-marque">Marques *:</label>
                                                    <select class="select2 form-control" id="blog-edit-marque" name="marque">
                                                        <?php 
                                                                                                                           
                                                                
                                                                $PDO_query_marque_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_marque ORDER BY eg_marque_id DESC");
                                                                $PDO_query_marque_liste_select->execute();
                                                                while($marque_liste = $PDO_query_marque_liste_select->fetch()){

                                                                    if(isset($produit['eg_marque_id']) && $produit['eg_marque_id'] == $marque_liste['eg_marque_id']){
                                                                        echo '<option value="'.$marque_liste['eg_marque_id'].'" selected>'.$marque_liste['eg_marque_nom'].'</option>';
                                                                        
                                                                    }else{
                                                                        echo '<option value="'.$marque_liste['eg_marque_id'].'">'.$marque_liste['eg_marque_nom'].'</option>';

                                                                    }
                                                                }
                                                                if(!empty($_GET["id"])){echo '<option value="">Selectionnez une Marque ...</option>';}else{echo '<option value="" selected>Selectionnez une Marque ...</option>';}
                                                                $PDO_query_marque_liste_select->closeCursor();  

                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-cat">Catégorie *:</label>
                                                    <select class="select2 form-control" id="blog-edit-cat" name="cat">
                                                        <?php 
                                                                                                                           
                                                                
                                                                $PDO_query_cat_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_categorie ORDER BY eg_categorie_id DESC");
                                                                $PDO_query_cat_liste_select->execute();
                                                                while($cat_liste = $PDO_query_cat_liste_select->fetch()){

                                                                    if(isset($produit['eg_categorie_id']) && $produit['eg_categorie_id'] == $cat_liste['eg_categorie_id']){
                                                                        echo '<option value="'.$cat_liste['eg_categorie_id'].'" data-chained="'.$cat_liste['eg_menu_id'].'" selected>'.$cat_liste['eg_categorie_nom'].'</option>';
                                                                        
                                                                    }else{
                                                                        echo '<option value="'.$cat_liste['eg_categorie_id'].'" data-chained="'.$cat_liste['eg_menu_id'].'">'.$cat_liste['eg_categorie_nom'].'</option>';

                                                                    }
                                                                }
                                                                if(!empty($_GET["id"])){echo '<option value="">Selectionnez une catégorie ...</option>';}else{echo '<option value="" selected>Selectionnez une catégorie ...</option>';}
                                                                $PDO_query_cat_liste_select->closeCursor();  

                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>                                           

                                        </div>
                                        <div class="row">

                                            <div class="col-md-3 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-etoile">Nombre d'étoile *:</label>
                                                    <select class="select2 form-control" id="blog-edit-etoile" name="etoile" required>
                                                        <?php 
                                                            if(isset($produit['eg_produit_etoiles'])){
                                                                switch($produit['eg_produit_etoiles'])
                                                                {
                                                                    
                                                                    case '1':

                                                                        if($produit['eg_produit_etoiles'] == 1){ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1" selected>1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>';

                                                                        }else{ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>
                                                                            <option value="" selected>Selectionnez un chiffre ...</option>';}
                                                                    break; 
                                                                    case '2':

                                                                        if($produit['eg_produit_etoiles'] == 2){ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2" selected>2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>';

                                                                        }else{ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>
                                                                            <option value="" selected>Selectionnez un chiffre ...</option>';}
                                                                    break;

                                                                    case '3':

                                                                        if($produit['eg_produit_etoiles'] == 3){ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3" selected>3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>';

                                                                        }else{ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>
                                                                            <option value="" selected>Selectionnez un chiffre ...</option>';}
                                                                    break;

                                                                    case '4':

                                                                        if($produit['eg_produit_etoiles'] == 4){ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4" selected>4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>';

                                                                        }else{ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>
                                                                            <option value="" selected>Selectionnez un chiffre ...</option>';}
                                                                    break;

                                                                    case '5':

                                                                        if($produit['eg_produit_etoiles'] == 5){ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5" selected>5 étoiles</option>';

                                                                        }else{ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>
                                                                            <option value="" selected>Selectionnez un chiffre ...</option>';}
                                                                    break;
                                                                                            
                                                                    default:

                                                                        if($produit['eg_produit_etoiles'] == 0){ 
                                                                            echo '
                                                                            <option value="0" selected>0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>
                                                                            
                                                                            ';
                                                                        }else{ 
                                                                            echo '
                                                                            <option value="0">0 étoiles</option>
                                                                            <option value="1">1 étoile</option>
                                                                            <option value="2">2 étoiles</option>
                                                                            <option value="3">3 étoiles</option>
                                                                            <option value="4">4 étoiles</option>
                                                                            <option value="5">5 étoiles</option>                                                                            
                                                                            <option value="" selected>Selectionnez un chiffre ...</option>';}
                                                                } 
                                                            }else{

                                                                echo '
                                                                <option value="0">0 étoiles</option>
                                                                <option value="1">1 étoile</option>
                                                                <option value="2">2 étoiles</option>
                                                                <option value="3">3 étoiles</option>
                                                                <option value="4">4 étoiles</option>
                                                                <option value="5">5 étoiles</option>  
                                                                <option value="" selected>Selectionnez un chiffre ...</option>';

                                                            } 

                                                            
                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="basic-default-titre">Référence *:</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="basic-default-titre"
                                                    name="ref"
                                                    placeholder=""
                                                    value="<?php if(!empty($id_produit)){echo $produit['eg_produit_reference'];}?>"
                                                    required
                                                    />                                                 
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-scat">Sous-Catégorie *:</label>
                                                    <select class="select2 form-control" id="blog-edit-scat" name="scat">
                                                        <?php 
                                                                                                                           
                                                                
                                                                $PDO_query_scat_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_sous_categorie ORDER BY eg_sous_categorie_id DESC");
                                                                $PDO_query_scat_liste_select->execute();
                                                                while($scat_liste = $PDO_query_scat_liste_select->fetch()){

                                                                    if(isset($produit['eg_sous_categorie_id']) && $produit['eg_sous_categorie_id'] == $scat_liste['eg_sous_categorie_id']){
                                                                        echo '<option value="'.$scat_liste['eg_sous_categorie_id'].'" data-chained="'.$scat_liste['eg_sous_categorie_id_categorie'].'" selected>'.$scat_liste['eg_sous_categorie_nom'].'</option>';
                                                                        
                                                                    }else{
                                                                        echo '<option value="'.$scat_liste['eg_sous_categorie_id'].'" data-chained="'.$scat_liste['eg_sous_categorie_id_categorie'].'">'.$scat_liste['eg_sous_categorie_nom'].'</option>';

                                                                    }
                                                                }
                                                                if(!empty($_GET["id"])){echo '<option value="">Selectionnez une sous catégorie ...</option>';}else{echo '<option value="" selected>Selectionnez une sous catégorie ...</option>';}
                                                                $PDO_query_scat_liste_select->closeCursor();  

                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>                                           

                                        </div>
                                        <div class="row">
                                            <div class="col-md-3 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="basic-default-titre">Prix Intitial *:</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="basic-default-titre"
                                                    name="prix"
                                                    placeholder="0.000"
                                                    value="<?php if(!empty($id_produit)){echo $produit['eg_produit_prix'];}else{echo '';}?>"
                                                    required
                                                    />                                                 
                                                </div>
                                            </div>
                                            <div class="col-md-3 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="basic-default-titre">Prix Promo *:</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="basic-default-titre"
                                                    name="promo"
                                                    placeholder=""
                                                    value="<?php if(!empty($id_produit)){echo $produit['eg_produit_promo'];}else{echo '0.000';}?>"
                                                    required
                                                    />                                                 
                                                </div>
                                            </div>
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Statut *:</label>
                                                    <select class="select2 form-control" id="blog-edit-status" name="statut" required>
                                                        <?php 
                                                            if(isset($produit['eg_produit_statut'])){
                                                                switch($produit['eg_produit_statut'])
                                                                {
                                                                    case '1':
                                                                        if($produit['eg_produit_statut'] == 1){ echo '<option value="1" selected>Produit activé</option><option value="0">Produit non activé</option>';}else{ echo '<option value="1">Produit activé</option><option value="0">Produit non activé</option><option value="" selected>Selectionnez un Produit ...</option>';}
                                                                    break; 
                                                                                            
                                                                    default:
                                                                    if($produit['eg_produit_statut'] == 0){ echo '<option value="1">Produit activé</option><option value="0" selected>Produit non activé</option>';}else{ echo '<option value="1">Produit activé</option><option value="0">Produit non activé</option><option value="" selected>Selectionnez un Produit ...</option>';}
                                                                } 
                                                            }else{

                                                                echo '<option value="1">Produit activé</option><option value="0">Produit non activé</option><option value="" selected>Selectionnez un Produit ...</option>';

                                                            } 

                                                            
                                                            
                                                        ?>
                                                    </select>
                                                    
                                                </div>
                                            </div>

                                        </div>

                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-topvente">Top Vente *:</label>
                                                    <select class="select2 form-control" id="blog-edit-topvente" name="topvente" required>
                                                        <?php 
                                                            if(isset($produit['eg_produit_top_vente'])){
                                                                switch($produit['eg_produit_top_vente'])
                                                                {
                                                                    case '1':
                                                                        if($produit['eg_produit_top_vente'] == 1){ echo '<option value="1" selected>Top-vente activé</option><option value="0">Top-vente non activé</option>';}else{ echo '<option value="1">Top-vente activé</option><option value="0">Top-vente non activé</option><option value="" selected>Activez l\'icone Top-vente ...</option>';}
                                                                    break; 
                                                                                            
                                                                    default:
                                                                    if($produit['eg_produit_top_vente'] == 0){ echo '<option value="1">Top-vente activé</option><option value="0" selected>Top-vente non activé</option>';}else{ echo '<option value="1">Top-vente activé</option><option value="0">Top-vente non activé</option><option value="" selected>Activez l\'icone Top-vente ...</option>';}
                                                                } 
                                                            }else{

                                                                echo '<option value="1">Top-vente activé</option><option value="0">Top-vente non activé</option><option value="" selected>Activez l\'icone Top-vente ...</option>';

                                                            } 

                                                            
                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div> 
                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-dispo">Disponibilité *:</label>
                                                    <select class="select2 form-control" id="blog-edit-dispo" name="dispo" required>
                                                        <?php 
                                                            if(isset($produit['eg_produit_dispo'])){
                                                                switch($produit['eg_produit_dispo'])
                                                                {
                                                                    case '1':
                                                                        if($produit['eg_produit_dispo'] == 1){ echo '<option value="1" selected>Disponible</option><option value="0">Hors Stock</option>';}else{ echo '<option value="1">Disponible</option><option value="0">Hors Stock</option><option value="" selected>Activez la Disponibilité ...</option>';}
                                                                    break; 
                                                                                            
                                                                    default:
                                                                    if($produit['eg_produit_dispo'] == 0){ echo '<option value="1">Disponible</option><option value="0" selected>Hors Stock</option>';}else{ echo '<option value="1">Disponible</option><option value="0">Hors Stock</option><option value="" selected>Activez la Disponibilité ...</option>';}
                                                                } 
                                                            }else{

                                                                echo '<option value="1">Disponible</option><option value="0">Hors Stock</option><option value="" selected>Activez la Disponibilité ...</option>';

                                                            } 

                                                            
                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>                                           

                                        </div>
                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group mb-2">
                                                    <label>Discription courte *:</label>
                                                    
                                                    <div id="blog-editor-wrapper">
                                                        <div id="blog-editor-container">
                                                            <textarea name="desc" class="editor form-control" id="editor" data-sample-short required>
                                                            <?php
                                                            if(!empty($id_produit))
                                                            {echo $produit['eg_produit_description'];}                                                           
                                                            ?>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            

                                        </div>

                                        <div class="row">

                                            <div class="col-12">
                                                <div class="form-group mb-2">
                                                    <label>Discription longue *:</label>
                                                    
                                                    <div id="blog-editor-wrapper">
                                                        <div id="blog-editor-container">
                                                            <textarea name="desc_longue" class="editor form-control" id="editor_1" data-sample-short required>
                                                            <?php
                                                            if(!empty($id_produit))
                                                            {echo $produit['eg_produit_description_longue'];}                                                           
                                                            ?>
                                                            </textarea>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>                                            

                                        </div>

                                        <div class="row">
                                            <div class="col-12 mt-50">
                                                <button type="submit" class="btn btn-primary mr-1">Enregistrement</button>
                                                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                            </div>

                                        </div>
                                    </form>
                                    
                                    <!--/ Form -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <!--/ Blog Edit -->
            </div>
            <!-- End : main content -->

            
        </div>
    </div>
    <!-- END: Content-->

    <div class="sidenav-overlay"></div>
    <div class="drag-target"></div>

    <!-- BEGIN: Footer-->
    <?php
	$page = '';
	if (empty($page)) {
	 $page = "footer";
	 // On limite l'inclusion aux fichiers.php en ajoutant dynamiquement l'extension
	 // On supprime également d'éventuels espaces
	 $page = trim($page.".php");
	
	}
	
	// On évite les caractères qui permettent de naviguer dans les répertoires
	$page = str_replace("../","protect",$page);
	$page = str_replace(";","protect",$page);
	$page = str_replace("%","protect",$page);
	
	// On interdit l'inclusion de dossiers protégés par htaccess
	if (preg_match("/include/",$page)) {
	 echo "Vous n'avez pas accès à ce répertoire";
	 }
	
	else {
	
		// On vérifie que la page est bien sur le serveur
		if (file_exists("../../../include/".$page) && $page != 'index.php') {
		   include("../../../include/".$page); 
		}
	
		else {
			echo "Page inexistante !";
		}
	}
	
	?> 
    <!-- END: Footer-->

    
    <!-- BEGIN: Vendor JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/vendors.min.js"></script>
    <!-- BEGIN Vendor JS-->

    <!-- BEGIN: Page Vendor JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/forms/select/select2.full.min.js"></script>
    
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/pickers/flatpickr/flatpickr.min.js"></script>
    <!-- END: Page Vendor JS-->

    <!-- BEGIN: Theme JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/core/app-menu.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/core/app.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/extensions/sweetalert2.all.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/extensions/polyfill.min.js"></script>
    <!-- END: Theme JS-->

    <!-- BEGIN: Page JS-->
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/pages/page-blog-edit.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/forms/form-validation.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/extensions/ext-component-sweet-alerts.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/extensions/ext-component-blockui.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/vendors/js/forms/validation/jquery.validate.min.js"></script>
    <script src="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/app-assets/js/scripts/extensions/ext-component-blockui.js"></script>
    <!-- END: Page JS-->

    <script charset="utf-8"  src="<?php echo Admin::menuproduit();?>table/js/webapp_liste_produit.js"></script>
    
    

    <script src="ckeditor/js/sf.js"></script>
    <script src="ckeditor/js/tree-a.js"></script>
    <script src="https://cdn.ckeditor.com/4.12.1/standard-all/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>

    

    <script>
        
        

        CKEDITOR.disableAutoInline = true;
		CKEDITOR.addCss( 'img {max-width:100%; height: auto;}' );
		var editor = CKEDITOR.replace( 'editor', {
			extraPlugins: 'uploadimage,image2',
			removePlugins: 'image',
			height:250
		} );
		CKFinder.setupCKEditor( editor );
        


        CKEDITOR.disableAutoInline = true;
		CKEDITOR.addCss( 'img {max-width:100%; height: auto;}' );
		var editor_1 = CKEDITOR.replace( 'editor_1', {
			extraPlugins: 'uploadimage,image2',
			removePlugins: 'image',
			height:250
		} );
		CKFinder.setupCKEditor( editor_1 );     
        
 
 
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
            $.blockUI({
                message: '<div class="spinner-border text-white" role="status"></div>',
                timeout: 1000,
                css: {
                backgroundColor: 'transparent',
                border: '0'
                },
                overlayCSS: {
                opacity: 0.5
                }
            });
        });

    </script>

    <script src="<?php echo Admin::menuproduit();?>table/js/jquery.chained.js?v=1.0.0" type="text/javascript" charset="utf-8"></script>
    <script src="<?php echo Admin::menuproduit();?>table/js/jquery.chained.remote.js?v=1.0.0" type="text/javascript" charset="utf-8"></script>
    <script type="text/javascript" charset="utf-8">
               $(function () {
                $("#blog-edit-cat").chained("#blog-edit-menu");
                $("#blog-edit-scat").chained("#blog-edit-cat");
                //$("#engine").chained("#series, #model");

               });            
   </script>

    <script src="https://kit.fontawesome.com/7791373c6a.js" crossorigin="anonymous"></script>
</body>
<!-- END: Body-->

</html>