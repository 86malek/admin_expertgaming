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

  $(document).on('submit', '.add', function(e){

    e.preventDefault();
      var form_data = $('#jquery-val-form').serialize();
      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("liste_rubrique_produit.php");
    
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
      };
      var request   = $.ajax({
        url:          'table/php/data_liste_produit.php?job=add_produit',
        data:         form_data,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess
      });	  
      
  });

  $(document).on('submit', '.edit_img_1', function(e){

      e.preventDefault();

      var id        = $('.edit_img_1').attr('data-id');
      var form_data = $('.edit_img_1').serialize();
      var id_prod        = $('.edit_img_1').attr('data-id-prod');

      var onSuccess = function (data) {
        console.log('Success');
        window.location.assign("modif_ajout_produit_image.php?id=" + id_prod);     
      };
      var onError = function (jqXHR, textStatus, errorThrown) {
          console.log(jqXHR);
          console.log(textStatus);
          console.log(errorThrown);
          alert("no se conecto");
      
      };
      
      var onBeforeSend = function () {
          console.log("Loading");
      };


      var request   = $.ajax({
        url:          'table/php/data_liste_produit_image.php?job=edit_produit_image_1&id=' + id,
        data:         form_data,
        dataType:     'json',
        contentType:  'application/json; charset=utf-8',
        type:         'get',
        async: false,
        beforeSend: onBeforeSend,
        error: onError,
        success: onSuccess
      });
    
  });

  $(document).on('submit', '.edit_img_2', function(e){

    e.preventDefault();

    var id        = $('.edit_img_2').attr('data-id');
    var form_data = $('.edit_img_2').serialize();
    var id_prod        = $('.edit_img_2').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_image.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_image.php?job=edit_produit_image_2&id=' + id,
      data:         form_data,
      dataType:     'json',
      contentType:  'application/json; charset=utf-8',
      type:         'get',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });
  
  });

  $(document).on('submit', '.edit_img_3', function(e){

    e.preventDefault();

    var id        = $('.edit_img_3').attr('data-id');
    var form_data = $('.edit_img_3').serialize();
    var id_prod        = $('.edit_img_3').attr('data-id-prod');

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_image.php?id=" + id_prod);     
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_image.php?job=edit_produit_image_3&id=' + id,
      data:         form_data,
      dataType:     'json',
      contentType:  'application/json; charset=utf-8',
      type:         'get',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });
  
  });

  $(document).on('submit', '.edit_img_4', function(e){

    e.preventDefault();

    var id        = $('.edit_img_4').attr('data-id');
    var id_prod        = $('.edit_img_4').attr('data-id-prod');
    var form_data = $('.edit_img_4').serialize();

    var onSuccess = function (data) {
      console.log('Success');
      window.location.assign("modif_ajout_produit_image.php?id=" + id_prod);    
    };
    var onError = function (jqXHR, textStatus, errorThrown) {
        console.log(jqXHR);
        console.log(textStatus);
        console.log(errorThrown);
        alert("no se conecto");
    
    };
    
    var onBeforeSend = function () {
        console.log("Loading");
    };


    var request   = $.ajax({
      url:          'table/php/data_liste_produit_image.php?job=edit_produit_image_4&id=' + id,
      data:         form_data,
      dataType:     'json',
      contentType:  'application/json; charset=utf-8',
      type:         'get',
      async: false,
      beforeSend: onBeforeSend,
      error: onError,
      success: onSuccess
    });
  
  });


});
});
