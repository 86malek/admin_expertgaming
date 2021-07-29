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
if(!empty($_GET["id"])){$id_scat = $_GET["id"];}else{$id_scat = "";}


$PDO_query_scat_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_sous_categorie WHERE eg_sous_categorie_id = :id");
$PDO_query_scat_unique->bindParam(":id", $id_scat, PDO::PARAM_INT);
$PDO_query_scat_unique->execute();
$scat = $PDO_query_scat_unique->fetch();
$PDO_query_scat_unique->closeCursor();

?>

<!DOCTYPE html>
<html class="loading bordered-layout" lang="Fr" data-layout="bordered-layout" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title><?php if(!empty($_GET["id"])){echo'Sous-Catégorie Modification | Expert Gaming';}else{echo'Sous-Catégorie Ajout | Expert Gaming';} ?></title>
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

                                    <li class="breadcrumb-item"><a href="liste_rubrique_cat.php">Menu navigation</a></li>

                                    <li class="breadcrumb-item active">Gestion des sous-catégories</li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">

                        <a class="btn-icon btn btn-success btn-round btn-sm waves-effect waves-float waves-light" href="liste_rubrique_scat.php">Revenir à la liste</a>                      

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
                                    <form method="post" id="jquery-val-form" class="<?php if(!empty($id_scat)){echo 'edit';}else{echo 'add';} ?>" data-id="<?php if(!empty($id_scat)){echo $id_scat;} ?>">
                                                            
                                        <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>">
                                        <input name="id_scat" type="hidden" value="<?php echo $id_scat;?>">

                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="basic-default-titre">Titre de la Sous-Catégorie *:</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="basic-default-titre"
                                                    name="titre"
                                                    placeholder=""
                                                    value="<?php if(!empty($id_scat)){echo $scat['eg_sous_categorie_nom'];}?>"
                                                    required
                                                    />                                                 
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-menu">Liaison Catégorie principale *:</label>
                                                    <select class="select2 form-control" id="blog-edit-menu" name="cat" required>
                                                        <?php 
                                                                                                                           
                                                                
                                                                $PDO_query_cat_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_categorie ORDER BY eg_categorie_id DESC");
                                                                $PDO_query_cat_liste_select->execute();
                                                                while($cat_liste = $PDO_query_cat_liste_select->fetch()){

                                                                    if(isset($scat['eg_sous_categorie_id_categorie']) && $scat['eg_sous_categorie_id_categorie'] == $cat_liste['eg_categorie_id']){
                                                                        echo '<option value="'.$cat_liste['eg_categorie_id'].'" selected>'.$cat_liste['eg_categorie_nom'].'</option>';
                                                                        
                                                                    }else{
                                                                        echo '<option value="'.$cat_liste['eg_categorie_id'].'">'.$cat_liste['eg_categorie_nom'].'</option>';

                                                                    }
                                                                }
                                                                if(!empty($_GET["id"])){echo '<option value="">Selectionnez une catégorie ...</option>';}else{echo '<option value="" selected>Selectionnez une catégorie ...</option>';}
                                                                $PDO_query_cat_liste_select->closeCursor();                                  
                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-md-12 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Status *:</label>
                                                    <select class="select2 form-control" id="blog-edit-status" name="statut" required>
                                                        <?php 
                                                            if(isset($scat['eg_sous_categorie_statut'])){
                                                                switch($scat['eg_sous_categorie_statut'])
                                                                {
                                                                    case '1':
                                                                        if($scat['eg_sous_categorie_statut'] == 1){ echo '<option value="1" selected>Sous-Catégorie activée</option><option value="0">Sous-Catégorie non activée</option>';}else{ echo '<option value="1">Sous-Catégorie activée</option><option value="0">Sous-Catégorie non activée</option>';}
                                                                    break; 
                                                                                            
                                                                    default:
                                                                    if($scat['eg_sous_categorie_statut'] == 0){ echo '<option value="1">Sous-Catégorie activée</option><option value="0" selected>Sous-Catégorie non activée</option>';}else{ echo '<option value="1">Sous-Catégorie activée</option><option value="0">Sous-Catégorie non activée</option>';}
                                                                } 
                                                            }else{

                                                                echo '<option value="1" selected>Sous-Catégorie activée</option><option value="0">Sous-Catégorie non activée</option>';

                                                            } 

                                                            
                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 mt-50">
                                                <button type="submit" class="btn btn-primary mr-1" id="submit">Enregistrement</button>
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
    <!-- END: Page JS-->

    <script charset="utf-8"  src="<?php echo Admin::menunavigation();?>table/js/webapp_liste_scat.js"></script>

    

<script>       
       
 
       
        $(window).on('load', function () {
            if (feather) {
                feather.replace({
                    width: 14,
                    height: 14
                });
            }
        });
        

    </script>
    

    <script src="https://kit.fontawesome.com/7791373c6a.js" crossorigin="anonymous"></script>
</body>
<!-- END: Body-->

</html>