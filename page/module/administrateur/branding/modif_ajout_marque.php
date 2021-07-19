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
if(!empty($_GET["id"])){$id_marque = $_GET["id"];}else{$id_marque = "";}


$PDO_query_marque_unique = Bdd::connectBdd()->prepare("SELECT * FROM eg_marque WHERE eg_marque_id = :id");
$PDO_query_marque_unique->bindParam(":id", $id_marque, PDO::PARAM_INT);
$PDO_query_marque_unique->execute();
$marque = $PDO_query_marque_unique->fetch();
$PDO_query_marque_unique->closeCursor();

?>

<!DOCTYPE html>
<html class="loading bordered-layout" lang="Fr" data-layout="bordered-layout" data-textdirection="ltr">

<!-- BEGIN: Head-->
<head>
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width,initial-scale=1.0,user-scalable=0,minimal-ui">
    <title><?php if(!empty($_GET["id"])){echo'Marque Modification | Expert Gaming';}else{echo'Marque Ajout | Expert Gaming';} ?></title>
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

                                    <li class="breadcrumb-item active"><a href="liste_rubrique_marque.php">Marques</a></li>

                                    <li class="breadcrumb-item ">Gestion des menus</li>

                                </ol>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="content-header-right text-md-right col-md-3 col-12 d-md-block d-none">
                    <div class="form-group breadcrumb-right">

                        <a class="btn-icon btn btn-success btn-round btn-sm waves-effect waves-float waves-light" href="liste_rubrique_marque.php">Revenir à la liste</a>

                        
                        

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
                                    <form method="post" id="jquery-val-form" class="<?php if(!empty($id_marque)){echo 'edit';}else{echo 'add';} ?>" data-id="<?php echo $id_marque; ?>">
                                                            
                                        <input name="user" type="hidden" value="<?php echo Membre::info($_SESSION['id'], 'id');?>">

                                        <div class="row">

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="basic-default-titre">Nom de la marque *:</label>
                                                    <input
                                                    type="text"
                                                    class="form-control"
                                                    id="basic-default-titre"
                                                    name="titre"
                                                    placeholder="Maximum 150 caractéres !"
                                                    value="<?php if(!empty($id_marque)){echo $marque['eg_marque_nom'];}?>"
                                                    required
                                                    />                                                 
                                                </div>
                                            </div>

                                            <div class="col-md-6 col-12">
                                                <div class="form-group mb-2">
                                                    <label for="blog-edit-status">Status *:</label>
                                                    <select class="select2 form-control" id="blog-edit-status" name="statut" required>
                                                        <?php 
                                                            if(isset($marque['eg_marque_statut'])){
                                                                switch($marque['eg_marque_statut'])
                                                                {
                                                                    case '1':
                                                                        if($marque['eg_marque_statut'] == 1){ echo '<option value="1" selected>Marque activée</option><option value="0">Marque non activée</option>';}else{ echo '<option value="1">Marque activée</option><option value="0">Marque non activée</option><option value="" selected>Slectionnez une Marque ...</option>';}
                                                                    break; 
                                                                                            
                                                                    default:
                                                                    if($marque['eg_marque_statut'] == 0){ echo '<option value="1">Marque activée</option><option value="0" selected>Marque non activée</option>';}else{ echo '<option value="1">Marque activée</option><option value="0">Marque non activée</option><option value="" selected>Slectionnez une marque ...</option>';}
                                                                } 
                                                            }else{

                                                                echo '<option value="1">Marque activée</option><option value="0">Marque non activée</option><option value="" selected>Slectionnez une Marque ...</option>';

                                                            } 

                                                            
                                                            
                                                        ?>
                                                    </select>
                                                </div>
                                            </div>

                                            <div class="col-12 mb-2">
                                                <div class="border rounded p-2">
                                                    <h4 class="mb-1">Logo de la Marque *:</h4>

                                                    <div class="media flex-column flex-md-row">

                                                        <?php
                                                        if(!empty($id_marque))
                                                        {
                                                            echo '<img src="'.$marque['eg_marque_logo'].'" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                        }
                                                        else
                                                        {
                                                            echo '<img src="../../../../app-assets/images/slider/03.jpg" id="blog-feature-image" class="rounded mr-2 mb-1 mb-md-0" width="150" alt="Blog Featured Image" />';
                                                        }
                                                        ?>

                                                        <div class="media-body">

                                                            <small class="text-muted">Aucune limite de taille et de poids pour les images !</small>

                                                            <p class="my-50">
                                                                <a id="blog-image-text">

                                                                    <?php 
                                                                    if(!empty($id_marque)){
                                                                        echo $marque['eg_marque_logo'];
                                                                    }else{
                                                                        echo 'C:\fakepath\image.jpg';
                                                                    }
                                                                    ?>
                                                                    
                                                                </a>
                                                            </p>

                                                            <div class="d-inline-block col-12 ">
                                                                    <div class="custom-file">

                                                                        <div class="col-md-4 col-6">
                                                                            <div class="form-group">
                                                                            <input id="ckfinder-input-1" type="text" class="form-control" name="img" value="<?php 
                                                                                if(!empty($id_marque)){
                                                                                    echo $marque['eg_marque_logo'];
                                                                                }
                                                                                ?>" <?php if(empty($id_marque)){echo 'required';}?>> 
                                                                            </div>
                                                                        </div>
                                                                        <div class="col-md-4 col-6">
                                                                            <div class="form-group">
                                                                            <a id="ckfinder-popup-1" class="btn btn-dark waves-effect waves-float waves-light">
                                                                                <i data-feather="upload" class="mr-25"></i>
                                                                                <span>Choisir une image</span>
                                                                            </a> 
                                                                            </div>
                                                                        </div>                                       
                                                                        

                                                                    </div>
                                                            </div>

                                                        </div>
                                                    </div>
                                                </div>
                                            </div>


                                            <div class="col-12 mt-50">
                                                <button type="submit" class="btn btn-primary mr-1">Enregistrement</button>
                                                <button type="reset" class="btn btn-outline-secondary">Annuler</button>
                                                <a class="btn btn-outline-danger ml-2" href="liste_rubrique_marque.php">Revenir à la liste des marques</a>
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

    <script charset="utf-8"  src="<?php echo Admin::menubranding();?>table/js/webapp_liste_marque.js"></script>
    <script src="ckeditor/ckeditor.js"></script>
    <script src="ckfinder/ckfinder.js"></script>

    

    <script>
        
        ClassicEditor
        .create( document.querySelector( '#editor' ), {


            image: {
            // Configure the available styles.
                styles: [
                    'alignLeft', 'alignCenter', 'alignRight'
                ],

            // Configure the available image resize options.
                resizeOptions: [
                    {
                        name: 'resizeImage:original',
                        label: 'Original',
                        value: null
                    },
                    {
                        name: 'resizeImage:50',
                        label: '50%',
                        value: '50'
                    },
                    {
                        name: 'resizeImage:75',
                        label: '75%',
                        value: '75'
                    }
                ],

            // You need to configure the image toolbar, too, so it shows the new style
            // buttons as well as the resize buttons.
                toolbar: [
                    'imageStyle:alignLeft', 'imageStyle:alignCenter', 'imageStyle:alignRight',
                    '|',
                    'resizeImage',
                    '|',
                    'imageTextAlternative'
                ]
            },
            ckfinder: {
                uploadUrl: 'http://localhost/intranet_etai/page/module/administrateur/communication/ckfinder/core/connector/php/connector.php?command=QuickUpload&type=Files&responseType=json',
            },
            toolbar: {
                items: [ 'ckfinder', 'imageUpload', '|', 'heading', '|',
                'alignment', '|',
                'bold', 'italic', 'strikethrough', 'underline', 'subscript', 'superscript', '|',
                'link', '|',
                'bulletedList', 'numberedList', 'todoList',
                '|', // break point
                'fontfamily', 'fontsize', 'fontColor', 'fontBackgroundColor', '|',
                'code', 'codeBlock', '|',
                'insertTable', '|',
                'outdent', 'indent', '|',
                'blockQuote', '|',
                'undo', 'redo' ],
                viewportTopOffset: 30,
                shouldNotGroupWhenFull: true
            }
        } )
        .catch( error => {
            console.error( error );
        } );
 
 
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
        button1 = document.getElementById( 'ckfinder-popup-1' );
        button1.onclick = function() {
            selectFileWithCKFinder( 'ckfinder-input-1' );
        };

        function selectFileWithCKFinder( elementId ) {
            CKFinder.modal( {
                chooseFiles: true,
                width: 1200,
                height: 800,
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

    </script>
    

    <script src="https://kit.fontawesome.com/7791373c6a.js" crossorigin="anonymous"></script>
</body>
<!-- END: Body-->

</html>