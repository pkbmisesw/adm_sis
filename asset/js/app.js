$( document ).ready(function() {
	//untuk memanggil plugin select2
    $('#kat_akun').select2({
	  	placeholder: 'Pilih Kategori Akun',
	  	language: "id"
	});
	$('#kat_sub').select2({
	  	placeholder: 'Pilih Kategori Sub',
	  	language: "id"
	});
	
	$('#kategori').select2({
	  	placeholder: 'Pilih Kategori',
	  	language: "id"
	});

	//saat pilihan provinsi di pilih maka mengambil data di data-wilayah menggunakan ajax
	$("#kat_akun").change(function(){
	      $("img#load1").show();
	      var id_kat_akun = $(this).val(); 
	      $.ajax({
	         type: "POST",
	         dataType: "html",
	         url: "data.php?jenis=kat_sub",
	         data: "id_kat_akun="+id_kat_akun,
	         success: function(msg){
				 console.log(msg);
	            $("select#kat_sub").html(msg);                                                       
	            $("img#load1").hide();
	            getAjaxKota();                                                        
	         }
	      });                    
     });  

	$("#kat_sub").change(getAjaxKota);
     function getAjaxKota(){
          //$("img#load2").show();
          var id_kat_sub = $("#kat_sub").val();
     }

});