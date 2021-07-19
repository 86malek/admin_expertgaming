<div class="main-menu menu-fixed menu-light menu-accordion menu-shadow" data-scroll-to-active="true">

    <div class="navbar-header">
        <ul class="nav navbar-nav flex-row">
            <li class="nav-item mr-auto">
                <a class="navbar-brand" href="index.html">
                    <span class="brand-logo">
                        <img src="https://<?php echo $_SERVER['SERVER_NAME'];?>/admin_expertgaming/app-assets/images/logo/logoEG.png" alt="logo Expert Gamning" class="">
                    </span>
                </a>
            </li>

            <li class="nav-item nav-toggle">
                <a class="nav-link modern-nav-toggle pr-0" data-toggle="collapse">
                    <i class="d-block d-xl-none text-primary toggle-icon font-medium-4" data-feather="x"></i>
                    <i class="d-none d-xl-block collapse-toggle-icon font-medium-4  text-primary" data-feather="disc" data-ticon="disc"></i>
                </a>
            </li>

        </ul>

    </div>

    <div class="shadow-bottom"></div>

    <div class="main-menu-content">
        <ul class="navigation navigation-main" id="main-menu-navigation" data-menu="menu-navigation">
            
            <li class=" nav-item">
                <a class="nav-lik d-flex" href="#">
                    <i class="fas fa-home"></i>
                    <span class="menu-title text-truncate" data-i18n="Home">Accueil</span>
                </a>
            </li> 
            <li class=" navigation-header"><span data-i18n="Actualités">Actualités</span><i data-feather="more-horizontal"></i></li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i class="fas fa-rss" aria-hidden="true"></i>
                    <span class="menu-title text-truncate" data-i18n="Actualités site" id="communication">Actualités site</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="http://<?php echo $_SERVER['SERVER_NAME']?>/<?php echo $PARAM_url_non_doc_site; ?>/page/module/administrateur/communication/liste_comm.php">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Gestion Actualités">Gestion Actu.</span>
                        </a>
                    </li> 
                    <li>
                        <a class="d-flex align-items-center" href="http://<?php echo $_SERVER['SERVER_NAME']?>/<?php echo $PARAM_url_non_doc_site; ?>/page/module/administrateur/communication/liste_comm_archive.php">
                            <i data-feather="circle"></i>
                            <span class="menu-item text-truncate" data-i18n="Archive">Archive</span>
                        </a>
                    </li>
                </ul>
            </li>  
            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Navigation</span><i data-feather="more-horizontal"></i></li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i class="fas fa-stream" aria-hidden="true"></i>
                    <span class="menu-title text-truncate" data-i18n="Menu navigation" id="Menu_navigation">Menu navigation</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/navigation/liste_rubrique_menu.php">
                            <i class="far fa-window-minimize"></i>
                            <span class="menu-item text-truncate" data-i18n="Gestion Menu">Gestion Menu</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i class="fas fa-border-all" aria-hidden="true"></i>
                    <span class="menu-title text-truncate" data-i18n="Catégories" id="Cat">Catégories</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/navigation/liste_rubrique_cat.php">
                            <i class="far fa-window-minimize"></i>
                            <span class="menu-item text-truncate" data-i18n="Gestion Cat">Gestion Cat.</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i class="fas fa-list" aria-hidden="true"></i>
                    <span class="menu-title text-truncate" data-i18n="Sous-Catégories" id="scat">Sous-Catégories</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/navigation/liste_rubrique_scat.php">
                            <i class="far fa-window-minimize"></i>
                            <span class="menu-item text-truncate" data-i18n="Gestion Sous-Cat">Gestion Sous-Cat.</span>
                        </a>
                    </li>
                </ul>
            </li>


            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Branding</span><i data-feather="more-horizontal"></i></li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i class="fab fa-shopify" aria-hidden="true"></i>
                    <span class="menu-title text-truncate" data-i18n="Marques" id="Marques">Marques</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/branding/liste_rubrique_marque.php">
                            <i class="far fa-window-minimize"></i>
                            <span class="menu-item text-truncate" data-i18n="Gestion Marque">Gestion Marque</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class=" navigation-header"><span data-i18n="Apps &amp; Pages">Catalogue</span><i data-feather="more-horizontal"></i>
            </li>
            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                    <i class="fas fa-trademark" aria-hidden="true"></i>
                    <span class="menu-title text-truncate" data-i18n="Produits" id="Produits">Produits</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/produit/liste_rubrique_produit.php">
                            <i class="far fa-window-minimize"></i>
                            <span class="menu-item text-truncate" data-i18n="Gestion produit">Gestion produit</span>
                        </a>
                    </li>
                </ul>
            </li>

            <li class=" nav-item">
                <a class="d-flex align-items-center" href="#">
                <i class="far fa-file-image" aria-hidden="true"></i>
                    <span class="menu-title text-truncate" data-i18n="Marques" id="Marques">Biblio Images</span>
                </a>
                <ul class="menu-content">
                    <li>
                        <a class="d-flex align-items-center" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/communication/liste_comm.php">
                            <i class="far fa-window-minimize"></i>
                            <span class="menu-item text-truncate" data-i18n="Gestion Marque">Bibliothèque</span>
                        </a>
                    </li>
                </ul>
            </li>
            <li class=" navigation-header"><span data-i18n="">Administration</span><i data-feather="more-horizontal"></i></li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-user-cog" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Admin">Admin</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" title="Gestion du personnel" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/admin/listeMembre.php"><i class="far fa-window-minimize"></i><span class="menu-item text-truncate" data-i18n="G.Personnel">G.Personnel</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" title="Type d'activation" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/admin/activation.php"><i class="far fa-window-minimize"></i><span class="menu-item text-truncate" data-i18n="Type d'activation">Type d'activation</span></a>
                    </li>
                    <li><a class="d-flex align-items-center" title="Liste des connexions" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/admin/listeJeton.php"><i class="far fa-window-minimize"></i><span class="menu-item text-truncate" data-i18n="Liste des connexions">Liste des connexions</span></a>
                    </li>
                </ul>
            </li>

            <li class=" navigation-header"><span data-i18n="">Client</span><i data-feather="more-horizontal"></i></li>
            <li class=" nav-item"><a class="d-flex align-items-center" href="#"><i class="fas fa-user-cog" aria-hidden="true"></i><span class="menu-title text-truncate" data-i18n="Admin">Devis</span></a>
                <ul class="menu-content">
                    <li><a class="d-flex align-items-center" title="Gestion des devis" href="https://<?php echo $_SERVER['SERVER_NAME']?>/admin_expertgaming/page/module/administrateur/devis/liste_rubrique_devis.php"><i class="far fa-window-minimize"></i><span class="menu-item text-truncate" data-i18n="Gestion des devis">Gestion des devis</span></a>
                    </li>
                </ul>
            </li>

        </ul>
    </div>
</div>