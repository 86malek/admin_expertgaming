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
    <title><?php if(!empty($_GET["id"])){echo'PACK Produit Modification | Expert Gaming';}else{echo'PACK Produit Ajout | Expert Gaming';} ?></title>
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

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static menu-collapsed" data-open="click" data-menu="vertical-menu-modern" data-col="">

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
                                <h2 class="content-header-title float-left mb-0">CATALOGUE</h2>
                                <div class="breadcrumb-wrapper">
                                    <ol class="breadcrumb">
                                    
                                        <li class="breadcrumb-item active"><a href="liste_rubrique_produit.php">Liste des produits</a></li>

                                        <li class="breadcrumb-item "><?php if(!empty($_GET["id"])){echo'Modification du produit';}else{echo'Ajout du produit';} ?></li>

                                        <li class="breadcrumb-item "><?php if(!empty($_GET["id"])){echo'Modif des packs pour :';}else{echo'Ajout des packs produit';} ?> <?php if(!empty($id_produit)){echo '<b>'.$produit['eg_produit_nom'].'</b>';}?></li>

                                    </ol>
                                </div>
                            </div>
                        </div>
                    </div>
                    <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                        <div class="form-group breadcrumb-right">

                            <a class="btn-icon btn btn-warning btn-round btn-sm waves-effect waves-float waves-light" href="modif_ajout_produit.php?id=<?php echo $id_produit;?>">Revenir au produit</a>
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
                                <!-- PROCESSEUR -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_1_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 1");
                                            $PDO_query_pack_1_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_1_unique->execute();
                                            $pack_1 = $PDO_query_pack_1_unique->fetch();
                                            $pack_existe_1 = $PDO_query_pack_1_unique->rowCount();
                                            $PDO_query_pack_1_unique->closeCursor();

                                            $PDO_query_pack_1_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_1_produit_unique->bindParam(":id", $pack_1['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_1_produit_unique->execute();
                                            $pack_1_image_produit = $PDO_query_pack_1_produit_unique->fetch();
                                            $PDO_query_pack_1_produit_unique->closeCursor();

                                            $PDO_query_pack_1_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_1_produit_unique->bindParam(":id", $pack_1['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_1_produit_unique->execute();
                                            $pack_1_table_produit = $PDO_query_pack_1_produit_unique->fetch();
                                            $PDO_query_pack_1_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_1 > 0){echo 'edit_pack_1';}else{echo 'add_pack_1';} ?>" data-id="<?php if($pack_existe_1 > 0){echo $pack_1['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="1">    
                                            <?php if($pack_existe_1 > 0){?>  
                                            <input name="id_produit_pack_1" type="hidden" value="<?php echo $pack_1['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">PROCESSEUR *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_1 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_1_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_1_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-processeur">Processeur *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-processeur" name="processeur" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_processeur_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 14 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_processeur_liste_select->execute();
                                    
                                                                                                    while($processeur_liste = $PDO_query_processeur_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_1_table_produit['eg_produit_id']) && $pack_1_table_produit['eg_produit_id'] == $processeur_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$processeur_liste['eg_produit_id'].'" selected>'.$processeur_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$processeur_liste['eg_produit_id'].'">'.$processeur_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_1['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez un PROCESSEUR</option>';}
                                    
                                                                                                    $PDO_query_processeur_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_1 > 0){echo $pack_1['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_1['eg_pack_produit_statut'])){
                                                                    switch($pack_1['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_1['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>PROCESSEUR activé</option><option value="0">PROCESSEUR non activé</option>';}else{ echo '<option value="1" selected>PROCESSEUR activé</option><option value="0">PROCESSEUR non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_1['eg_pack_produit_statut'] == 0){ echo '<option value="1">PROCESSEUR activé</option><option value="0" selected>PROCESSEUR non activé</option>';}else{ echo '<option value="1" selected>PROCESSEUR activé</option><option value="0">PROCESSEUR non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>PROCESSEUR activé</option><option value="0">PROCESSEUR non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement du processeur</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- CARTE MERE -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_2_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 2");
                                            $PDO_query_pack_2_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_2_unique->execute();
                                            $pack_2 = $PDO_query_pack_2_unique->fetch();
                                            $pack_existe_2 = $PDO_query_pack_2_unique->rowCount();
                                            $PDO_query_pack_2_unique->closeCursor();

                                            $PDO_query_pack_2_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_2_produit_unique->bindParam(":id", $pack_2['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_2_produit_unique->execute();
                                            $pack_2_image_produit = $PDO_query_pack_2_produit_unique->fetch();
                                            $PDO_query_pack_2_produit_unique->closeCursor();

                                            $PDO_query_pack_2_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_2_produit_unique->bindParam(":id", $pack_2['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_2_produit_unique->execute();
                                            $pack_2_table_produit = $PDO_query_pack_2_produit_unique->fetch();
                                            $PDO_query_pack_2_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_2 > 0){echo 'edit_pack_2';}else{echo 'add_pack_2';} ?>" data-id="<?php if($pack_existe_2 > 0){echo $pack_2['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="2">    
                                            <?php if($pack_existe_2 > 0){?>  
                                            <input name="id_produit_pack_2" type="hidden" value="<?php echo $pack_2['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">CARTE MERE *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_2 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_2_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_2_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-mother">Carte mère *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-mother" name="mother" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_mother_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 15 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_mother_liste_select->execute();
                                    
                                                                                                    while($mother_liste = $PDO_query_mother_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_2_table_produit['eg_produit_id']) && $pack_2_table_produit['eg_produit_id'] == $mother_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$mother_liste['eg_produit_id'].'" selected>'.$mother_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$mother_liste['eg_produit_id'].'">'.$mother_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_2['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez une carte mère</option>';}
                                    
                                                                                                    $PDO_query_mother_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_2 > 0){echo $pack_2['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-2">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-2" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_2['eg_pack_produit_statut'])){
                                                                    switch($pack_2['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_2['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>CARTE MERE activé</option><option value="0">CARTE MERE non activé</option>';}else{ echo '<option value="1" selected>CARTE MERE activé</option><option value="0">CARTE MERE non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_2['eg_pack_produit_statut'] == 0){ echo '<option value="1">CARTE MERE activé</option><option value="0" selected>CARTE MERE non activé</option>';}else{ echo '<option value="1" selected>CARTE MERE activé</option><option value="0">CARTE MERE non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>CARTE MERE activé</option><option value="0">CARTE MERE non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement de la carte mère</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- MEMOIRE VIVE -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_3_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 3");
                                            $PDO_query_pack_3_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_3_unique->execute();
                                            $pack_3 = $PDO_query_pack_3_unique->fetch();
                                            $pack_existe_3 = $PDO_query_pack_3_unique->rowCount();
                                            $PDO_query_pack_3_unique->closeCursor();

                                            $PDO_query_pack_3_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_3_produit_unique->bindParam(":id", $pack_3['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_3_produit_unique->execute();
                                            $pack_3_image_produit = $PDO_query_pack_3_produit_unique->fetch();
                                            $PDO_query_pack_3_produit_unique->closeCursor();

                                            $PDO_query_pack_3_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_3_produit_unique->bindParam(":id", $pack_3['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_3_produit_unique->execute();
                                            $pack_3_table_produit = $PDO_query_pack_3_produit_unique->fetch();
                                            $PDO_query_pack_3_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_3 > 0){echo 'edit_pack_3';}else{echo 'add_pack_3';} ?>" data-id="<?php if($pack_existe_3 > 0){echo $pack_3['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="3">    
                                            <?php if($pack_existe_3 > 0){?>  
                                            <input name="id_produit_pack_3" type="hidden" value="<?php echo $pack_3['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">MEMOIRE VIVE *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_3 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_3_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_3_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-ram">Mémoire vive *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-ram" name="ram" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_ram_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 20 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_ram_liste_select->execute();
                                    
                                                                                                    while($ram_liste = $PDO_query_ram_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_3_table_produit['eg_produit_id']) && $pack_3_table_produit['eg_produit_id'] == $ram_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$ram_liste['eg_produit_id'].'" selected>'.$ram_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$ram_liste['eg_produit_id'].'">'.$ram_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_3['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez une ou des mémoire vive</option>';}
                                    
                                                                                                    $PDO_query_ram_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_3 > 0){echo $pack_3['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-3">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-3" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_3['eg_pack_produit_statut'])){
                                                                    switch($pack_3['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_3['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>MEMOIRE VIVE activé</option><option value="0">MEMOIRE VIVE non activé</option>';}else{ echo '<option value="1" selected>MEMOIRE VIVE activé</option><option value="0">MEMOIRE VIVE non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_3['eg_pack_produit_statut'] == 0){ echo '<option value="1">MEMOIRE VIVE activé</option><option value="0" selected>MEMOIRE VIVE non activé</option>';}else{ echo '<option value="1" selected>MEMOIRE VIVE activé</option><option value="0">MEMOIRE VIVE non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>MEMOIRE VIVE activé</option><option value="0">MEMOIRE VIVE non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement de la mémoire vive</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- BOITIER -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_4_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 4");
                                            $PDO_query_pack_4_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_4_unique->execute();
                                            $pack_4 = $PDO_query_pack_4_unique->fetch();
                                            $pack_existe_4 = $PDO_query_pack_4_unique->rowCount();
                                            $PDO_query_pack_4_unique->closeCursor();

                                            $PDO_query_pack_4_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_4_produit_unique->bindParam(":id", $pack_4['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_4_produit_unique->execute();
                                            $pack_4_image_produit = $PDO_query_pack_4_produit_unique->fetch();
                                            $PDO_query_pack_4_produit_unique->closeCursor();

                                            $PDO_query_pack_4_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_4_produit_unique->bindParam(":id", $pack_4['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_4_produit_unique->execute();
                                            $pack_4_table_produit = $PDO_query_pack_4_produit_unique->fetch();
                                            $PDO_query_pack_4_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_4 > 0){echo 'edit_pack_4';}else{echo 'add_pack_4';} ?>" data-id="<?php if($pack_existe_4 > 0){echo $pack_4['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="4">    
                                            <?php if($pack_existe_4 > 0){?>  
                                            <input name="id_produit_pack_4" type="hidden" value="<?php echo $pack_4['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">BOITIER *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_4 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_4_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_4_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-case">Boitier *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-case" name="case" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_case_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 19 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_case_liste_select->execute();
                                    
                                                                                                    while($case_liste = $PDO_query_case_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_4_table_produit['eg_produit_id']) && $pack_4_table_produit['eg_produit_id'] == $case_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$case_liste['eg_produit_id'].'" selected>'.$case_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$case_liste['eg_produit_id'].'">'.$case_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_4['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez un BOITIER</option>';}
                                    
                                                                                                    $PDO_query_case_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_4 > 0){echo $pack_4['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-4">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-4" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_4['eg_pack_produit_statut'])){
                                                                    switch($pack_4['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_4['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>BOITIER activé</option><option value="0">BOITIER non activé</option>';}else{ echo '<option value="1" selected>BOITIER activé</option><option value="0">BOITIER non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_4['eg_pack_produit_statut'] == 0){ echo '<option value="1">BOITIER activé</option><option value="0" selected>BOITIER non activé</option>';}else{ echo '<option value="1" selected>BOITIER activé</option><option value="0">BOITIER non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>BOITIER activé</option><option value="0">BOITIER non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement du boitier</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- ALIMENTATION -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_5_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 5");
                                            $PDO_query_pack_5_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_5_unique->execute();
                                            $pack_5 = $PDO_query_pack_5_unique->fetch();
                                            $pack_existe_5 = $PDO_query_pack_5_unique->rowCount();
                                            $PDO_query_pack_5_unique->closeCursor();

                                            $PDO_query_pack_5_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_5_produit_unique->bindParam(":id", $pack_5['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_5_produit_unique->execute();
                                            $pack_5_image_produit = $PDO_query_pack_5_produit_unique->fetch();
                                            $PDO_query_pack_5_produit_unique->closeCursor();

                                            $PDO_query_pack_5_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_5_produit_unique->bindParam(":id", $pack_5['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_5_produit_unique->execute();
                                            $pack_5_table_produit = $PDO_query_pack_5_produit_unique->fetch();
                                            $PDO_query_pack_5_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_5 > 0){echo 'edit_pack_5';}else{echo 'add_pack_5';} ?>" data-id="<?php if($pack_existe_5 > 0){echo $pack_5['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="5">    
                                            <?php if($pack_existe_5 > 0){?>  
                                            <input name="id_produit_pack_5" type="hidden" value="<?php echo $pack_5['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">ALIMENTATION *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_5 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_5_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_5_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-alim">Alimentation *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-alim" name="alim" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_alim_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 17 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_alim_liste_select->execute();
                                    
                                                                                                    while($alim_liste = $PDO_query_alim_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_5_table_produit['eg_produit_id']) && $pack_5_table_produit['eg_produit_id'] == $alim_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$alim_liste['eg_produit_id'].'" selected>'.$alim_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$alim_liste['eg_produit_id'].'">'.$alim_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_5['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez une ALIMENTATION</option>';}
                                    
                                                                                                    $PDO_query_alim_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_5 > 0){echo $pack_5['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-5">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-5" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_5['eg_pack_produit_statut'])){
                                                                    switch($pack_5['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_5['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>ALIMENTATION activé</option><option value="0">ALIMENTATION non activé</option>';}else{ echo '<option value="1" selected>ALIMENTATION activé</option><option value="0">ALIMENTATION non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_5['eg_pack_produit_statut'] == 0){ echo '<option value="1">ALIMENTATION activé</option><option value="0" selected>ALIMENTATION non activé</option>';}else{ echo '<option value="1" selected>ALIMENTATION activé</option><option value="0">ALIMENTATION non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>ALIMENTATION activé</option><option value="0">ALIMENTATION non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement de l'alimentation</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- STOCKAGE -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_6_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 6");
                                            $PDO_query_pack_6_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_6_unique->execute();
                                            $pack_6 = $PDO_query_pack_6_unique->fetch();
                                            $pack_existe_6 = $PDO_query_pack_6_unique->rowCount();
                                            $PDO_query_pack_6_unique->closeCursor();

                                            $PDO_query_pack_6_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_6_produit_unique->bindParam(":id", $pack_6['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_6_produit_unique->execute();
                                            $pack_6_image_produit = $PDO_query_pack_6_produit_unique->fetch();
                                            $PDO_query_pack_6_produit_unique->closeCursor();

                                            $PDO_query_pack_6_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_6_produit_unique->bindParam(":id", $pack_6['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_6_produit_unique->execute();
                                            $pack_6_table_produit = $PDO_query_pack_6_produit_unique->fetch();
                                            $PDO_query_pack_6_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_6 > 0){echo 'edit_pack_6';}else{echo 'add_pack_6';} ?>" data-id="<?php if($pack_existe_6 > 0){echo $pack_6['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="6">    
                                            <?php if($pack_existe_6 > 0){?>  
                                            <input name="id_produit_pack_6" type="hidden" value="<?php echo $pack_6['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">STOCKAGE *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_6 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_6_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_6_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-stockage">Stockage *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-stockage" name="stockage" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_SSD_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 21 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_SSD_liste_select->execute();
                                    
                                                                                                    while($ssd_liste = $PDO_query_SSD_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_6_table_produit['eg_produit_id']) && $pack_6_table_produit['eg_produit_id'] == $ssd_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$ssd_liste['eg_produit_id'].'" selected>'.$ssd_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$ssd_liste['eg_produit_id'].'">'.$ssd_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_6['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez un STOCKAGE</option>';}
                                    
                                                                                                    $PDO_query_SSD_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_6 > 0){echo $pack_6['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-6">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-6" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_6['eg_pack_produit_statut'])){
                                                                    switch($pack_6['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_6['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>STOCKAGE activé</option><option value="0">STOCKAGE non activé</option>';}else{ echo '<option value="1" selected>STOCKAGE activé</option><option value="0">STOCKAGE non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_6['eg_pack_produit_statut'] == 0){ echo '<option value="1">STOCKAGE activé</option><option value="0" selected>STOCKAGE non activé</option>';}else{ echo '<option value="1" selected>STOCKAGE activé</option><option value="0">STOCKAGE non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>STOCKAGE activé</option><option value="0">STOCKAGE non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement du stockage</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- GRAPHIQUE -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_7_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 7");
                                            $PDO_query_pack_7_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_7_unique->execute();
                                            $pack_7 = $PDO_query_pack_7_unique->fetch();
                                            $pack_existe_7 = $PDO_query_pack_7_unique->rowCount();
                                            $PDO_query_pack_7_unique->closeCursor();

                                            $PDO_query_pack_7_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_7_produit_unique->bindParam(":id", $pack_7['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_7_produit_unique->execute();
                                            $pack_7_image_produit = $PDO_query_pack_7_produit_unique->fetch();
                                            $PDO_query_pack_7_produit_unique->closeCursor();

                                            $PDO_query_pack_7_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_7_produit_unique->bindParam(":id", $pack_7['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_7_produit_unique->execute();
                                            $pack_7_table_produit = $PDO_query_pack_7_produit_unique->fetch();
                                            $PDO_query_pack_7_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_7 > 0){echo 'edit_pack_7';}else{echo 'add_pack_7';} ?>" data-id="<?php if($pack_existe_7 > 0){echo $pack_7['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="7">    
                                            <?php if($pack_existe_7 > 0){?>  
                                            <input name="id_produit_pack_7" type="hidden" value="<?php echo $pack_7['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">CARTE GRAPHIQUE *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_7 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_7_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_7_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-gpu">Carte graphique *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-gpu" name="gpu" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_GPU_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 16 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_GPU_liste_select->execute();
                                    
                                                                                                    while($gpu_liste = $PDO_query_GPU_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_7_table_produit['eg_produit_id']) && $pack_7_table_produit['eg_produit_id'] == $gpu_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$gpu_liste['eg_produit_id'].'" selected>'.$gpu_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$gpu_liste['eg_produit_id'].'">'.$gpu_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_7['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez une CARTE GRAPHIQUE</option>';}
                                    
                                                                                                    $PDO_query_GPU_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_7 > 0){echo $pack_7['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-7">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-7" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_7['eg_pack_produit_statut'])){
                                                                    switch($pack_7['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_7['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>CARTE GRAPHIQUE activé</option><option value="0">CARTE GRAPHIQUE non activé</option>';}else{ echo '<option value="1" selected>CARTE GRAPHIQUE activé</option><option value="0">CARTE GRAPHIQUE non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_7['eg_pack_produit_statut'] == 0){ echo '<option value="1">CARTE GRAPHIQUE activé</option><option value="0" selected>CARTE GRAPHIQUE non activé</option>';}else{ echo '<option value="1" selected>CARTE GRAPHIQUE activé</option><option value="0">CARTE GRAPHIQUE non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>CARTE GRAPHIQUE activé</option><option value="0">CARTE GRAPHIQUE non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement de la carte graphique</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- MONITEUR -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_8_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 8");
                                            $PDO_query_pack_8_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_8_unique->execute();
                                            $pack_8 = $PDO_query_pack_8_unique->fetch();
                                            $pack_existe_8 = $PDO_query_pack_8_unique->rowCount();
                                            $PDO_query_pack_8_unique->closeCursor();

                                            $PDO_query_pack_8_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_8_produit_unique->bindParam(":id", $pack_8['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_8_produit_unique->execute();
                                            $pack_8_image_produit = $PDO_query_pack_8_produit_unique->fetch();
                                            $PDO_query_pack_8_produit_unique->closeCursor();

                                            $PDO_query_pack_8_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_8_produit_unique->bindParam(":id", $pack_8['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_8_produit_unique->execute();
                                            $pack_8_table_produit = $PDO_query_pack_8_produit_unique->fetch();
                                            $PDO_query_pack_8_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_8 > 0){echo 'edit_pack_8';}else{echo 'add_pack_8';} ?>" data-id="<?php if($pack_existe_8 > 0){echo $pack_8['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="8">    
                                            <?php if($pack_existe_8 > 0){?>  
                                            <input name="id_produit_pack_8" type="hidden" value="<?php echo $pack_8['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">MONITEUR *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_8 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_8_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_8_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-moniteur">Moniteur *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-moniteur" name="moniteur" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_moniteur_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 6 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_moniteur_liste_select->execute();
                                    
                                                                                                    while($moniteur_liste = $PDO_query_moniteur_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_8_table_produit['eg_produit_id']) && $pack_8_table_produit['eg_produit_id'] == $moniteur_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$moniteur_liste['eg_produit_id'].'" selected>'.$moniteur_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$moniteur_liste['eg_produit_id'].'">'.$moniteur_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_8['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez un MONITEUR</option>';}
                                    
                                                                                                    $PDO_query_moniteur_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_8 > 0){echo $pack_8['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-8">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-8" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_8['eg_pack_produit_statut'])){
                                                                    switch($pack_8['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_8['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>MONITEUR activé</option><option value="0">MONITEUR non activé</option>';}else{ echo '<option value="1" selected>MONITEUR activé</option><option value="0">MONITEUR non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_8['eg_pack_produit_statut'] == 0){ echo '<option value="1">MONITEUR activé</option><option value="0" selected>MONITEUR non activé</option>';}else{ echo '<option value="1" selected>MONITEUR activé</option><option value="0">MONITEUR non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>MONITEUR activé</option><option value="0">MONITEUR non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement du moniteur</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- CLAVIER -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_9_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 9");
                                            $PDO_query_pack_9_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_9_unique->execute();
                                            $pack_9 = $PDO_query_pack_9_unique->fetch();
                                            $pack_existe_9 = $PDO_query_pack_9_unique->rowCount();
                                            $PDO_query_pack_9_unique->closeCursor();

                                            $PDO_query_pack_9_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_9_produit_unique->bindParam(":id", $pack_9['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_9_produit_unique->execute();
                                            $pack_9_image_produit = $PDO_query_pack_9_produit_unique->fetch();
                                            $PDO_query_pack_9_produit_unique->closeCursor();

                                            $PDO_query_pack_9_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_9_produit_unique->bindParam(":id", $pack_9['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_9_produit_unique->execute();
                                            $pack_9_table_produit = $PDO_query_pack_9_produit_unique->fetch();
                                            $PDO_query_pack_9_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_9 > 0){echo 'edit_pack_9';}else{echo 'add_pack_9';} ?>" data-id="<?php if($pack_existe_9 > 0){echo $pack_9['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="9">    
                                            <?php if($pack_existe_9 > 0){?>  
                                            <input name="id_produit_pack_9" type="hidden" value="<?php echo $pack_9['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">CLAVIER *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_9 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_9_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_9_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-clavier">Clavier *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-clavier" name="clavier" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_clavier_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 2 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_clavier_liste_select->execute();
                                    
                                                                                                    while($clavier_liste = $PDO_query_clavier_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_9_table_produit['eg_produit_id']) && $pack_9_table_produit['eg_produit_id'] == $clavier_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$clavier_liste['eg_produit_id'].'" selected>'.$clavier_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$clavier_liste['eg_produit_id'].'">'.$clavier_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_9['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez un CLAVIER</option>';}
                                    
                                                                                                    $PDO_query_clavier_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_9 > 0){echo $pack_9['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-9">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-9" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_9['eg_pack_produit_statut'])){
                                                                    switch($pack_9['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_9['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>CLAVIER activé</option><option value="0">CLAVIER non activé</option>';}else{ echo '<option value="1" selected>CLAVIER activé</option><option value="0">CLAVIER non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_9['eg_pack_produit_statut'] == 0){ echo '<option value="1">CLAVIER activé</option><option value="0" selected>CLAVIER non activé</option>';}else{ echo '<option value="1" selected>CLAVIER activé</option><option value="0">CLAVIER non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>CLAVIER activé</option><option value="0">CLAVIER non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement du clavier</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- SOURIE -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_10_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 10");
                                            $PDO_query_pack_10_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_10_unique->execute();
                                            $pack_10 = $PDO_query_pack_10_unique->fetch();
                                            $pack_existe_10 = $PDO_query_pack_10_unique->rowCount();
                                            $PDO_query_pack_10_unique->closeCursor();

                                            $PDO_query_pack_10_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_10_produit_unique->bindParam(":id", $pack_10['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_10_produit_unique->execute();
                                            $pack_10_image_produit = $PDO_query_pack_10_produit_unique->fetch();
                                            $PDO_query_pack_10_produit_unique->closeCursor();

                                            $PDO_query_pack_10_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_10_produit_unique->bindParam(":id", $pack_10['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_10_produit_unique->execute();
                                            $pack_10_table_produit = $PDO_query_pack_10_produit_unique->fetch();
                                            $PDO_query_pack_10_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_10 > 0){echo 'edit_pack_10';}else{echo 'add_pack_10';} ?>" data-id="<?php if($pack_existe_10 > 0){echo $pack_10['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="10">    
                                            <?php if($pack_existe_10 > 0){?>  
                                            <input name="id_produit_pack_10" type="hidden" value="<?php echo $pack_10['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">SOURIE *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_10 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_10_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_10_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-sourie">Sourie *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-sourie" name="sourie" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_sourie_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 7 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_sourie_liste_select->execute();
                                    
                                                                                                    while($sourie_liste = $PDO_query_sourie_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_10_table_produit['eg_produit_id']) && $pack_10_table_produit['eg_produit_id'] == $sourie_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$sourie_liste['eg_produit_id'].'" selected>'.$sourie_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$sourie_liste['eg_produit_id'].'">'.$sourie_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_10['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez une SOURIE</option>';}
                                    
                                                                                                    $PDO_query_sourie_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_10 > 0){echo $pack_10['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-10">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-10" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_10['eg_pack_produit_statut'])){
                                                                    switch($pack_10['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_10['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>SOURIE activé</option><option value="0">SOURIE non activé</option>';}else{ echo '<option value="1" selected>SOURIE activé</option><option value="0">SOURIE non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_10['eg_pack_produit_statut'] == 0){ echo '<option value="1">SOURIE activé</option><option value="0" selected>SOURIE non activé</option>';}else{ echo '<option value="1" selected>SOURIE activé</option><option value="0">SOURIE non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>SOURIE activé</option><option value="0">SOURIE non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement de la sourie</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- CASQUE -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_11_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 11");
                                            $PDO_query_pack_11_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_11_unique->execute();
                                            $pack_11 = $PDO_query_pack_11_unique->fetch();
                                            $pack_existe_11 = $PDO_query_pack_11_unique->rowCount();
                                            $PDO_query_pack_11_unique->closeCursor();

                                            $PDO_query_pack_11_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_11_produit_unique->bindParam(":id", $pack_11['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_11_produit_unique->execute();
                                            $pack_11_image_produit = $PDO_query_pack_11_produit_unique->fetch();
                                            $PDO_query_pack_11_produit_unique->closeCursor();

                                            $PDO_query_pack_11_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_11_produit_unique->bindParam(":id", $pack_11['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_11_produit_unique->execute();
                                            $pack_11_table_produit = $PDO_query_pack_11_produit_unique->fetch();
                                            $PDO_query_pack_11_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_11 > 0){echo 'edit_pack_11';}else{echo 'add_pack_11';} ?>" data-id="<?php if($pack_existe_11 > 0){echo $pack_11['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="11">    
                                            <?php if($pack_existe_11 > 0){?>  
                                            <input name="id_produit_pack_11" type="hidden" value="<?php echo $pack_11['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">CASQUE *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_11 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_11_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_11_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-casque">Casque *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-casque" name="casque" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_casque_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 1 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_casque_liste_select->execute();
                                    
                                                                                                    while($casque_liste = $PDO_query_casque_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_11_table_produit['eg_produit_id']) && $pack_11_table_produit['eg_produit_id'] == $casque_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$casque_liste['eg_produit_id'].'" selected>'.$casque_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$casque_liste['eg_produit_id'].'">'.$casque_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_11['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez une SOURIE</option>';}
                                    
                                                                                                    $PDO_query_casque_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_11 > 0){echo $pack_11['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-11">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-11" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_11['eg_pack_produit_statut'])){
                                                                    switch($pack_11['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_11['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>CASQUE activé</option><option value="0">CASQUE non activé</option>';}else{ echo '<option value="1" selected>CASQUE activé</option><option value="0">CASQUE non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_11['eg_pack_produit_statut'] == 0){ echo '<option value="1">CASQUE activé</option><option value="0" selected>CASQUE non activé</option>';}else{ echo '<option value="1" selected>CASQUE activé</option><option value="0">CASQUE non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>CASQUE activé</option><option value="0">CASQUE non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement du casque</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- WEBCAM -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_12_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 12");
                                            $PDO_query_pack_12_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_12_unique->execute();
                                            $pack_12 = $PDO_query_pack_12_unique->fetch();
                                            $pack_existe_12 = $PDO_query_pack_12_unique->rowCount();
                                            $PDO_query_pack_12_unique->closeCursor();

                                            $PDO_query_pack_12_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_12_produit_unique->bindParam(":id", $pack_12['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_12_produit_unique->execute();
                                            $pack_12_image_produit = $PDO_query_pack_12_produit_unique->fetch();
                                            $PDO_query_pack_12_produit_unique->closeCursor();

                                            $PDO_query_pack_12_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_12_produit_unique->bindParam(":id", $pack_12['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_12_produit_unique->execute();
                                            $pack_12_table_produit = $PDO_query_pack_12_produit_unique->fetch();
                                            $PDO_query_pack_12_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_12 > 0){echo 'edit_pack_12';}else{echo 'add_pack_12';} ?>" data-id="<?php if($pack_existe_12 > 0){echo $pack_12['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="12">    
                                            <?php if($pack_existe_12 > 0){?>  
                                            <input name="id_produit_pack_12" type="hidden" value="<?php echo $pack_12['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">WEBCAM *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_12 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_12_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_12_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-webcam">Webcam *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-webcam" name="webcam" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_webcam_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 9 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_webcam_liste_select->execute();
                                    
                                                                                                    while($webcam_liste = $PDO_query_webcam_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_12_table_produit['eg_produit_id']) && $pack_12_table_produit['eg_produit_id'] == $webcam_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$webcam_liste['eg_produit_id'].'" selected>'.$webcam_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$webcam_liste['eg_produit_id'].'">'.$webcam_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_12['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez une WEBCAM</option>';}
                                    
                                                                                                    $PDO_query_webcam_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_12 > 0){echo $pack_12['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-12">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-12" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_12['eg_pack_produit_statut'])){
                                                                    switch($pack_12['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_12['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>WEBCAM activé</option><option value="0">WEBCAM non activé</option>';}else{ echo '<option value="1" selected>WEBCAM activé</option><option value="0">WEBCAM non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_12['eg_pack_produit_statut'] == 0){ echo '<option value="1">WEBCAM activé</option><option value="0" selected>WEBCAM non activé</option>';}else{ echo '<option value="1" selected>WEBCAM activé</option><option value="0">WEBCAM non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>WEBCAM activé</option><option value="0">WEBCAM non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement du casque</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>
                                <!-- TAPIS -->
                                <div class="card">
                                    <div class="card-body">
                                        <?php
                                            $PDO_query_pack_13_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_pack_produit WHERE eg_produit_id = :id AND eg_pack_produit_ordre = 13");
                                            $PDO_query_pack_13_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_pack_13_unique->execute();
                                            $pack_13 = $PDO_query_pack_13_unique->fetch();
                                            $pack_existe_13 = $PDO_query_pack_13_unique->rowCount();
                                            $PDO_query_pack_13_unique->closeCursor();

                                            $PDO_query_pack_13_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_pack_13_produit_unique->bindParam(":id", $pack_13['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_13_produit_unique->execute();
                                            $pack_13_image_produit = $PDO_query_pack_13_produit_unique->fetch();
                                            $PDO_query_pack_13_produit_unique->closeCursor();

                                            $PDO_query_pack_13_produit_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_produit_id = :id");
                                            $PDO_query_pack_13_produit_unique->bindParam(":id", $pack_13['eg_pack_produit_ajout_id'], PDO::PARAM_INT);
                                            $PDO_query_pack_13_produit_unique->execute();
                                            $pack_13_table_produit = $PDO_query_pack_13_produit_unique->fetch();
                                            $PDO_query_pack_13_produit_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($pack_existe_13 > 0){echo 'edit_pack_13';}else{echo 'add_pack_13';} ?>" data-id="<?php if($pack_existe_13 > 0){echo $pack_12['eg_pack_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="ordre" type="hidden" value="13">    
                                            <?php if($pack_existe_13 > 0){?>  
                                            <input name="id_produit_pack_13" type="hidden" value="<?php echo $pack_13['eg_pack_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">TAPIS *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                                if($pack_existe_13 > 0)
                                                                {
                                                                    echo '<img src="'.$pack_13_image_produit['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="'.$pack_13_table_produit['eg_produit_nom'].'" />';
                                                                }
                                                                else
                                                                {
                                                                    echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                                }
                                                            ?>

                                                            <div class="media-body">
                                                                

                                                                <div class="d-inline-block col-12 ">

                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">

                                                                                <div class="form-group">

                                                                                    <label for="blog-edit-tapis">Tapis *:</label>
                                                                                    <select class="select2 form-control" id="blog-edit-tapis" name="tapis" required>
                                                                                            <?php                                                                                                                    
                                                                
                                                                                                    $PDO_query_tapis_liste_select = Bdd::connectBdd()->prepare("SELECT * FROM eg_produit WHERE eg_categorie_id = 8 ORDER BY eg_produit_id DESC");
                                                                                                    $PDO_query_tapis_liste_select->execute();
                                    
                                                                                                    while($tapis_liste = $PDO_query_tapis_liste_select->fetch()){
                                    
                                                                                                        if(isset($pack_13_table_produit['eg_produit_id']) && $pack_13_table_produit['eg_produit_id'] == $tapis_liste['eg_produit_id']){
                                                                                                            echo '<option value="'.$tapis_liste['eg_produit_id'].'" selected>'.$tapis_liste['eg_produit_nom'].'</option>';
                                                                                                            
                                                                                                        }else{
                                                                                                            echo '<option value="'.$tapis_liste['eg_produit_id'].'">'.$tapis_liste['eg_produit_nom'].'</option>';
                                                                                                        }
                                                                                                    }
                                    
                                                                                                    if(isset($pack_13['eg_pack_produit_id'])){echo '';}else{echo '<option value="" selected>Selectionnez un TAPIS</option>';}
                                    
                                                                                                    $PDO_query_tapis_liste_select->closeCursor();  
                                    
                                                                                                
                                                                                            ?>
                                                                                    </select>
                                                                                    

                                                                                </div>

                                                                            </div>                                      
                                                                            

                                                                        </div>

                                                                </div>
                                                                

                                                            </div>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">                                                                        
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="basic-default-quantite">Quantité *:</label>
                                                        <input
                                                        type="text"
                                                        class="form-control"
                                                        id="basic-default-quantite"
                                                        name="quantite"
                                                        placeholder="..."
                                                        value="<?php if($pack_existe_13 > 0){echo $pack_13['eg_pack_produit_quantite'];}?>"
                                                        required
                                                        />                                                 
                                                    </div>
                                                </div>
                                                <div class="col-md-6 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut-13">Statut *:</label>
                                                        <select class="select2 form-control" id="blog-edit-statut-13" name="statut" required>
                                                            <?php 
                                                                if(isset($pack_13['eg_pack_produit_statut'])){
                                                                    switch($pack_13['eg_pack_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($pack_13['eg_pack_produit_statut'] == 1){ echo '<option value="1" selected>TAPIS activé</option><option value="0">TAPIS non activé</option>';}else{ echo '<option value="1" selected>TAPIS activé</option><option value="0">TAPIS non activé</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($pack_13['eg_pack_produit_statut'] == 0){ echo '<option value="1">TAPIS activé</option><option value="0" selected>TAPIS non activé</option>';}else{ echo '<option value="1" selected>TAPIS activé</option><option value="0">TAPIS non activé</option>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>TAPIS activé</option><option value="0">TAPIS non activé</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>

                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement du tapis</button>
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

    <script charset="utf-8"  src="<?php echo Admin::menuproduit();?>table/js/webapp_liste_produit_pack.js"></script>
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