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
    <title><?php if(!empty($_GET["id"])){echo'Images Produit Modification | Expert Gaming';}else{echo'Images Produit Ajout | Expert Gaming';} ?></title>
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

<body class="vertical-layout vertical-menu-modern  navbar-floating footer-static  menu-collapsed" data-open="click"
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

                                        <li class="breadcrumb-item "><?php if(!empty($_GET["id"])){echo'Modif des images pour :';}else{echo'Ajout des images produit';} ?> <?php if(!empty($id_produit)){echo '<b>'.$produit['eg_produit_nom'].'</b>';}?></li>

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

                                <div class="card">
                                    <div class="card-body">
                                        <!-- Form 1-->
                                        <?php
                                            $PDO_query_img_1_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 1");
                                            $PDO_query_img_1_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_img_1_unique->execute();
                                            $img1 = $PDO_query_img_1_unique->fetch();
                                            $img_existe_1 = $PDO_query_img_1_unique->rowCount();
                                            $PDO_query_img_1_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($img_existe_1 > 0){echo 'edit_img_1';}else{echo 'add_img_1';} ?>" data-id="<?php if($img_existe_1 > 0){echo $img1['eg_image_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="title" type="hidden" value="<?php echo $produit['eg_produit_nom'];?>">
                                            <input name="ordre" type="hidden" value="1">    
                                            <?php if($img_existe_1 > 0){?>  
                                            <input name="id_produit_image" type="hidden" value="<?php echo $img1['eg_image_produit_id']; ?>">
                                            <?php }?> 

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">Image numéro 1 *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                            if($img_existe_1 > 0)
                                                            {
                                                                echo '<img src="'.$img1['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                            }
                                                            else
                                                            {
                                                                echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                            }
                                                            ?>

                                                            <div class="media-body">

                                                                <small class="text-muted">Aucune limite de taille et de poids pour les images !</small>

                                                                <p class="my-50">
                                                                    <a id="blog-image-text-1">

                                                                        <?php 
                                                                        if($img_existe_1 > 0){
                                                                            echo '<a href="'.$img1['eg_image_produit_nom'].'" target="_blank">Lien vers l\'image</a>';
                                                                        }else{
                                                                            echo 'C:\fakepath\image.jpg';
                                                                        }
                                                                        ?>
                                                                        
                                                                    </a>
                                                                </p>

                                                                <div class="d-inline-block col-12 ">
                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">
                                                                                <div class="form-group">
                                                                                <input id="ckfinder-input-1" type="text" class="form-control" name="img1" value="<?php 
                                                                                    if($img_existe_1 > 0){
                                                                                        echo $img1['eg_image_produit_nom'];
                                                                                    }
                                                                                    ?>" required> 
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-6">
                                                                                <div class="form-group">
                                                                                <a id="ckfinder-popup-1" class="btn btn-dark waves-effect waves-float waves-light">
                                                                                    <i data-feather="upload" class="mr-25"></i>
                                                                                    <span>Choisir une premiere image</span>
                                                                                </a> 
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
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut">Statut *:</label>
                                                        <select class="form-control" id="blog-edit-statut" name="statut" required>
                                                            <?php 
                                                                if(isset($img1['eg_image_produit_statut'])){
                                                                    switch($img1['eg_image_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($img1['eg_image_produit_statut'] == 1){ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';}else{ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($img1['eg_image_produit_statut'] == 0){ echo '<option value="1">Image activée</option><option value="0" selected>Image non activée</option>';}else{ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement de la premiere image</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>                         
                                
                                <div class="card">
                                    <div class="card-body">
                                        <!-- Form 1-->
                                        <?php
                                            $PDO_query_img_2_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 2");
                                            $PDO_query_img_2_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_img_2_unique->execute();
                                            $img2 = $PDO_query_img_2_unique->fetch();
                                            $img_existe_2 = $PDO_query_img_2_unique->rowCount();
                                            $PDO_query_img_2_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($img_existe_2 >0){echo 'edit_img_2';}else{echo 'add_img_2';} ?>" data-id="<?php if($img_existe_2 > 0){echo $img2['eg_image_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="title" type="hidden" value="<?php echo $produit['eg_produit_nom'];?>">
                                            <input name="ordre" type="hidden" value="2"> 
                                            <?php if($img_existe_2 > 0){?>  
                                            <input name="id_produit_image" type="hidden" value="<?php echo $img2['eg_image_produit_id']; ?>">
                                            <?php }?>

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">Image numéro 2 *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                            if($img_existe_2 > 0)
                                                            {
                                                                echo '<img src="'.$img2['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                            }
                                                            else
                                                            {
                                                                echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                            }
                                                            ?>

                                                            <div class="media-body">

                                                                <small class="text-muted">Aucune limite de taille et de poids pour les images !</small>

                                                                <p class="my-50">
                                                                    <a id="blog-image-text-1">

                                                                        <?php 
                                                                        if($img_existe_2 > 0){
                                                                            echo '<a href="'.$img2['eg_image_produit_nom'].'" target="_blank">Lien vers l\'image</a>';
                                                                        }else{
                                                                            echo 'C:\fakepath\image.jpg';
                                                                        }
                                                                        ?>
                                                                        
                                                                    </a>
                                                                </p>

                                                                <div class="d-inline-block col-12 ">
                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">
                                                                                <div class="form-group">
                                                                                <input id="ckfinder-input-2" type="text" class="form-control" name="img2" value="<?php 
                                                                                    if($img_existe_2 > 0){
                                                                                        echo $img2['eg_image_produit_nom'];
                                                                                    }
                                                                                    ?>" required> 
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-6">
                                                                                <div class="form-group">
                                                                                <a id="ckfinder-popup-2" class="btn btn-dark waves-effect waves-float waves-light">
                                                                                    <i data-feather="upload" class="mr-25"></i>
                                                                                    <span>Choisir une deuxième image</span>
                                                                                </a> 
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
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut">Statut *:</label>
                                                        <select class="form-control" id="blog-edit-statut" name="statut" required>
                                                            <?php 
                                                                if(isset($img1['eg_image_produit_statut'])){
                                                                    switch($img1['eg_image_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($img1['eg_image_produit_statut'] == 1){ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';}else{ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($img1['eg_image_produit_statut'] == 0){ echo '<option value="1">Image activée</option><option value="0" selected>Image non activée</option>';}else{ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement de la deuxième image</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <!-- Form 1-->
                                        <?php
                                            $PDO_query_img_3_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 3");
                                            $PDO_query_img_3_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_img_3_unique->execute();
                                            $img3 = $PDO_query_img_3_unique->fetch();
                                            $img_existe_3 = $PDO_query_img_3_unique->rowCount();
                                            $PDO_query_img_3_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($img_existe_3 > 0){echo 'edit_img_3';}else{echo 'add_img_3';} ?>" data-id="<?php if($img_existe_3 > 0){echo $img3['eg_image_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="title" type="hidden" value="<?php echo $produit['eg_produit_nom'];?>">
                                            <input name="ordre" type="hidden" value="3">   
                                            <?php if($img_existe_3 > 0){?>  
                                            <input name="id_produit_image" type="hidden" value="<?php echo $img3['eg_image_produit_id']; ?>">
                                            <?php }?> 

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">Image numéro 3 *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                            if($img_existe_3 > 0)
                                                            {
                                                                echo '<img src="'.$img3['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                            }
                                                            else
                                                            {
                                                                echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                            }
                                                            ?>

                                                            <div class="media-body">

                                                                <small class="text-muted">Aucune limite de taille et de poids pour les images !</small>

                                                                <p class="my-50">
                                                                    <a id="blog-image-text-1">

                                                                        <?php 
                                                                        if($img_existe_3 > 0){
                                                                            echo '<a href="'.$img3['eg_image_produit_nom'].'" target="_blank">Lien vers l\'image</a>';
                                                                        }else{
                                                                            echo 'C:\fakepath\image.jpg';
                                                                        }
                                                                        ?>
                                                                        
                                                                    </a>
                                                                </p>

                                                                <div class="d-inline-block col-12 ">
                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">
                                                                                <div class="form-group">
                                                                                <input id="ckfinder-input-3" type="text" class="form-control" name="img3" value="<?php 
                                                                                    if($img_existe_3 > 0){
                                                                                        echo $img3['eg_image_produit_nom'];
                                                                                    }
                                                                                    ?>" required> 
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-6">
                                                                                <div class="form-group">
                                                                                <a id="ckfinder-popup-3" class="btn btn-dark waves-effect waves-float waves-light">
                                                                                    <i data-feather="upload" class="mr-25"></i>
                                                                                    <span>Choisir une troisème image</span>
                                                                                </a> 
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
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut">Statut *:</label>
                                                        <select class="form-control" id="blog-edit-statut" name="statut" required>
                                                            <?php 
                                                                if(isset($img1['eg_image_produit_statut'])){
                                                                    switch($img1['eg_image_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($img1['eg_image_produit_statut'] == 1){ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';}else{ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($img1['eg_image_produit_statut'] == 0){ echo '<option value="1">Image activée</option><option value="0" selected>Image non activée</option>';}else{ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement de la troisème image</button>
                                                    <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                </div>

                                            </div>
                                        </form>                                    
                                        <!--/ Form -->
                                    </div>
                                </div>

                                <div class="card">
                                    <div class="card-body">
                                        <!-- Form 1-->
                                        <?php
                                            $PDO_query_img_4_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_image_produit WHERE eg_produit_id = :id AND eg_image_produit_ordre = 4");
                                            $PDO_query_img_4_unique->bindParam(":id", $id_produit, PDO::PARAM_INT);
                                            $PDO_query_img_4_unique->execute();
                                            $img4 = $PDO_query_img_4_unique->fetch();
                                            $img_existe_4 = $PDO_query_img_4_unique->rowCount();
                                            $PDO_query_img_4_unique->closeCursor();
                                        ?>

                                        <form method="post" id="jquery-val-form" class="<?php if($img_existe_4 > 0){echo 'edit_img_4';}else{echo 'add_img_4';} ?>" data-id="<?php if($img_existe_4 > 0){echo $img4['eg_image_produit_id'];}else{echo '';} ?>" data-id-prod="<?php echo $id_produit ?>">  

                                            <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>"> 
                                            <input name="id_produit" type="hidden" value="<?php echo $id_produit;?>"> 
                                            <input name="title" type="hidden" value="<?php echo $produit['eg_produit_nom'];?>">
                                            <input name="ordre" type="hidden" value="4">   
                                            <?php if($img_existe_4 > 0){?>  
                                            <input name="id_produit_image" type="hidden" value="<?php echo $img4['eg_image_produit_id']; ?>">
                                            <?php }?> 

                                            <div class="row">                           
                                                <div class="col-12 mb-2">
                                                    <div class="border rounded p-2">
                                                        <h4 class="mb-1">Image numéro 4 *:</h4>                                                

                                                        <div class="media flex-column flex-md-row">

                                                            <?php
                                                            if($img_existe_4 > 0)
                                                            {
                                                                echo '<img src="'.$img4['eg_image_produit_nom'].'" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                            }
                                                            else
                                                            {
                                                                echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image-1" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                            }
                                                            ?>

                                                            <div class="media-body">

                                                                <small class="text-muted">Aucune limite de taille et de poids pour les images !</small>

                                                                <p class="my-50">
                                                                    <a id="blog-image-text-1">

                                                                        <?php 
                                                                        if($img_existe_4 > 0){
                                                                            echo '<a href="'.$img4['eg_image_produit_nom'].'" target="_blank">Lien vers l\'image</a>';
                                                                        }else{
                                                                            echo 'C:\fakepath\image.jpg';
                                                                        }
                                                                        ?>
                                                                        
                                                                    </a>
                                                                </p>

                                                                <div class="d-inline-block col-12 ">
                                                                        <div class="custom-file">

                                                                            <div class="col-md-12 col-6">
                                                                                <div class="form-group">
                                                                                <input id="ckfinder-input-4" type="text" class="form-control" name="img4" value="<?php 
                                                                                    if($img_existe_4 > 0){
                                                                                        echo $img3['eg_image_produit_nom'];
                                                                                    }
                                                                                    ?>" required> 
                                                                                </div>
                                                                            </div>
                                                                            <div class="col-md-4 col-6">
                                                                                <div class="form-group">
                                                                                <a id="ckfinder-popup-4" class="btn btn-dark waves-effect waves-float waves-light">
                                                                                    <i data-feather="upload" class="mr-25"></i>
                                                                                    <span>Choisir une quatirème image</span>
                                                                                </a> 
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
                                                <div class="col-md-12 col-12">
                                                    <div class="form-group mb-2">
                                                        <label for="blog-edit-statut">Statut *:</label>
                                                        <select class="form-control" id="blog-edit-statut" name="statut" required>
                                                            <?php 
                                                                if(isset($img1['eg_image_produit_statut'])){
                                                                    switch($img1['eg_image_produit_statut'])
                                                                    {
                                                                        case '1':
                                                                            if($img1['eg_image_produit_statut'] == 1){ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';}else{ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';}
                                                                        break; 
                                                                                                
                                                                        default:
                                                                        if($img1['eg_image_produit_statut'] == 0){ echo '<option value="1">Image activée</option><option value="0" selected>Image non activée</option>';}else{ echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>>';}
                                                                    } 
                                                                }else{

                                                                    echo '<option value="1" selected>Image activée</option><option value="0">Image non activée</option>';

                                                                } 

                                                                
                                                                
                                                            ?>
                                                        </select>
                                                        
                                                    </div>
                                                </div>
                                            </div>
                                            <div class="row">
                                                <div class="col-12 mt-50">
                                                    <button type="submit" class="btn btn-success mr-1" id="submit">Enregistrement de la troisème image</button>
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

    <script charset="utf-8"  src="<?php echo Admin::menuproduit();?>table/js/webapp_liste_produit_image.js"></script>
    
    
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>

    

    <script>
 
        button1 = document.getElementById( 'ckfinder-popup-1' );
        button1.onclick = function() {
            selectFileWithCKFinder( 'ckfinder-input-1' );
        };

        button2 = document.getElementById( 'ckfinder-popup-2' );
        button2.onclick = function() {
            selectFileWithCKFinder( 'ckfinder-input-2' );
        };

        button3 = document.getElementById( 'ckfinder-popup-3' );
        button3.onclick = function() {
            selectFileWithCKFinder( 'ckfinder-input-3' );
        };

        button4 = document.getElementById( 'ckfinder-popup-4' );
        button4.onclick = function() {
            selectFileWithCKFinder( 'ckfinder-input-4' );
        };

        function selectFileWithCKFinder( elementId ) {
            CKFinder.modal( {
                chooseFiles: true,
                width: 800,
                height: 600,
                onInit: function( finder ) {
                    finder.on( 'files:choose', function( evt ) {
                        var file = evt.data.files.first();
                        var output = document.getElementById( elementId );
                        output.value = file.getUrl();
                    } );

                    finder.on( 'file:choose:resizedImage', function( evt ) {
                        var output = document.getElementById( elementId );
                        output.value = evt.data.resizedUrl;
                    } );
                }
            } );
        }
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