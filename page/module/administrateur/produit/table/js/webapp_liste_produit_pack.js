/**
 * DataTables Basic
 */

 $(function () {
  'use strict';
  $(document).ready(function(){   

  $(document).on('click', '#delete-record', function (e) {
    Swal.fire({
		  title: 'Êtes-vous sûr ?',
		  text: "Vous ne pourrez pas annuler cela !",
		  type: 'warning',
		  showCancelButton: true,
		  confirmButtonColor: '#3085d6',
		  cancelButtonColor: '#d33',
		  confirmButtonText: 'Oui, supprimez-le !',
		  confirmButtonClass: 'btn btn-primary',
		  cancelButtonClass: 'btn btn-danger ml-1',
		  buttonsStyling: false,
		}).then(function (result) {
		  if (result.value) {
							e.preventDefault();
							var id      = $("#delete-record").data('id');
							var name      = $("#delete-record").data('name');
							var request = $.ajax({
							url:          'table/php/data_liste_produit.php?job=del_produit&id=' + id,
							cache:        false,
							dataType:     'json',
							contentType:  'application/json; charset=utf-8',
							type:         'get'
							});
							
							request.done(function(output){
								if (output.result == 'success'){
									  Swal.fire({
										  type: "success",
										  title: 'Supprimée!',
										  text: "Produit '" + name + "' supprimé avec succès.",
										  confirmButtonClass: 'btn btn-success',
										});
                    dt_basic.ajax.reload();
								} else {
									Swal.fire({
									  title: 'Annulée',
									  text: "Une erreur s'est produite lors de l'enregistrement " + textStatus,
									  type: 'error',
									  confirmButtonClass: 'btn btn-success',
									})
								}
							});
							request.fail(function(jqXHR, textStatus){
								Swal.fire({
								  title: 'Annulée',
								  text: "Une erreur s'est produite lorsxxx de l'enregistrement " + textStatus,
								  type: 'error',
								  confirmButtonClass: 'btn btn-success',
								})
							})
			
		  }
		  else if (result.dismiss === Swal.DismissReason.cancel) {
			  
			Swal.fire({
			  title: 'Annulée',
			  text: 'Votre fichier est en sécurité',
			  type: 'error',
			  confirmButtonClass: 'btn btn-success',
			})
		  }
		})
  }); 


//////////////////////////////////////////////////////////////////


  $(document).on('submit', '.add_pack_1', function(e){

    e.preventDefault();
      var form_data = $('.add_pack_1').serialize();
      var id_prod   = $('.add_pack_1').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_1').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_1',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_2', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_2').serialize();
      var id_prod   = $('.add_pack_2').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_2').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_2',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_3', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_3').serialize();
      var id_prod   = $('.add_pack_3').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_3').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_3',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_4', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_4').serialize();
      var id_prod   = $('.add_pack_4').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_4').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_4',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_5', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_5').serialize();
      var id_prod   = $('.add_pack_5').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_5').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_5',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_6', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_6').serialize();
      var id_prod   = $('.add_pack_6').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_6').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_6',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_7', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_7').serialize();
      var id_prod   = $('.add_pack_7').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_7').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_7',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_8', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_8').serialize();
      var id_prod   = $('.add_pack_8').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_8').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_8',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_9', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_9').serialize();
      var id_prod   = $('.add_pack_9').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_9').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_9',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_10', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_10').serialize();
      var id_prod   = $('.add_pack_10').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_10').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_10',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_11', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_11').serialize();
      var id_prod   = $('.add_pack_11').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_11').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_11',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });
  
  $(document).on('submit', '.add_pack_12', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_12').serialize();
      var id_prod   = $('.add_pack_12').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_12').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_12',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });

  $(document).on('submit', '.add_pack_13', function(e){
    
    e.preventDefault();
      var form_data = $('.add_pack_13').serialize();
      var id_prod   = $('.add_pack_13').attr('data-id-prod');
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.add_pack_13').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=add_produit_pack_13',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess

      });	
        
      
  });


/////////////////////////////////////////////////////


  $(document).on('submit', '.edit_pack_1', function(e){
      e.preventDefault();

      var id        = $('.edit_pack_1').attr('data-id');
      var form_data = $('.edit_pack_1').serialize();
      var id_prod   = $('.edit_pack_1').attr('data-id-prod');

      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.edit_pack_1').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };


      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_1',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess
      });	

  });

  $(document).on('submit', '.edit_pack_2', function(e){
      e.preventDefault();

      var id        = $('.edit_pack_2').attr('data-id');
      var form_data = $('.edit_pack_2').serialize();
      var id_prod   = $('.edit_pack_2').attr('data-id-prod');

      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
          $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
          $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
          $('.edit_pack_2').block({
            message: '<div class="spinner-border text-primary" role="status"></div>',
            timeout: 1000,
            css: {
              backgroundColor: 'transparent',
              border: '0'
            },
            overlayCSS: {
              backgroundColor: '#fff',
              opacity: 0.8
            }
          });
      };


      var request   = $.ajax({
        url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_2',
        data:         form_data,
        type:         'post',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess
      });	

  });

  $(document).on('submit', '.edit_pack_3', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_3').attr('data-id');
    var form_data = $('.edit_pack_3').serialize();
    var id_prod   = $('.edit_pack_3').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_3').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_3',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_4', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_4').attr('data-id');
    var form_data = $('.edit_pack_4').serialize();
    var id_prod   = $('.edit_pack_4').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_4').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_4',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_5', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_5').attr('data-id');
    var form_data = $('.edit_pack_5').serialize();
    var id_prod   = $('.edit_pack_5').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_5').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_5',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_6', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_6').attr('data-id');
    var form_data = $('.edit_pack_6').serialize();
    var id_prod   = $('.edit_pack_6').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_6').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_6',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_7', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_7').attr('data-id');
    var form_data = $('.edit_pack_7').serialize();
    var id_prod   = $('.edit_pack_7').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_7').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_7',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_8', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_8').attr('data-id');
    var form_data = $('.edit_pack_8').serialize();
    var id_prod   = $('.edit_pack_8').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_8').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_8',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_9', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_9').attr('data-id');
    var form_data = $('.edit_pack_9').serialize();
    var id_prod   = $('.edit_pack_9').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_9').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_9',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_10', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_10').attr('data-id');
    var form_data = $('.edit_pack_10').serialize();
    var id_prod   = $('.edit_pack_10').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_10').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_10',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_11', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_11').attr('data-id');
    var form_data = $('.edit_pack_11').serialize();
    var id_prod   = $('.edit_pack_11').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_11').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_11',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_12', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_12').attr('data-id');
    var form_data = $('.edit_pack_12').serialize();
    var id_prod   = $('.edit_pack_12').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_12').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_12',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  $(document).on('submit', '.edit_pack_13', function(e){
    e.preventDefault();

    var id        = $('.edit_pack_13').attr('data-id');
    var form_data = $('.edit_pack_13').serialize();
    var id_prod   = $('.edit_pack_13').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_pack.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
        $('#submit').text('Envoi en cours'); // Onchange la valeur pour avoir un retour visuel
        $('#submit').attr("disabled", true); // On s'assure du fait que le bouton ne sera plus cliquable, tu peut meme rajouter une classe ?!?!
        $('.edit_pack_13').block({
          message: '<div class="spinner-border text-primary" role="status"></div>',
          timeout: 1000,
          css: {
            backgroundColor: 'transparent',
            border: '0'
          },
          overlayCSS: {
            backgroundColor: '#fff',
            opacity: 0.8
          }
        });
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_pack.php?job=edit_produit_pack_13',
      data:         form_data,
      type:         'post',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });	

  });

  


});
});
