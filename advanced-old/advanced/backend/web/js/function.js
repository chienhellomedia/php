  $(document).on('click', '#cate-images', function(event) {
    event.preventDefault();
    $('#modal-id-cate').modal('show');
    $('#modal-id-cate').on('hide.bs.modal', function(e){
      var img = $('#cate-images').val();
      $('.show-img-cate').attr('src', img);
    });

  }); 
  $(document).on('click', '#supplier-image', function(event) {
  	event.preventDefault();
  	$('#modal-id-supplier').modal('show');
  	$('#modal-id-supplier').on('hide.bs.modal', function(e){
  		var img = $('#supplier-image').val();
  		$('#img-supplier').attr('src', img);
  	});

  });  

  $(document).on('click', '#product-image', function(event) {
    event.preventDefault();
    $('#modal-id-product').modal('show');
    $('#modal-id-product').on('hide.bs.modal', function(e){
      var img = $('#product-image').val();
      $('.show-img-product').attr('src', img);
    });
  }); 

  $(document).on('click', '#blog-image', function(event) {
  	event.preventDefault();
  	$('#modal-id-blog').modal('show');
  	$('#modal-id-blog').on('hide.bs.modal', function(e){
  		// var img = $('#product-image').val();
  		// $('.show-img-pro').attr('src', img);
  	});
  });

  $( function() {
    $( "#product-startsale" ).datepicker({
      dateFormat: "yy-mm-dd"
    }); 
    $( "#product-endsale" ).datepicker({
      dateFormat: "yy-mm-dd"
    });
  } );


  $(document).ready(function() {
    $('a#add_img').click(function(event){
      event.preventDefault();
      var n_row = $('#entry_img').find('div.r');  
 // alert(n_row.length);
 var 
 html = '<div class="r row-img-'+n_row.length+'">';
 html +='<input type="hidden" name="image[]" id="img-'+n_row.length+'" class="form-control">';
 html +='<img src="" id="show-img-'+n_row.length+'" class="img-responsive">';
 html +='<h5>Ảnh chi tiết '+n_row.length+' </h5>';
 html +='<a href="#" id="img-'+n_row.length+'" title="Chọn hình ảnh" class="btn btn-info btn-sm select-img" data-id=""><i class="fa fa-picture-o"></i> Chọn ảnh</a>';
 html +='<a href="#" id="img-'+n_row.length+'" title="Xóa hình ảnh" class="btn btn-danger btn-sm remove-image"><i class="fa fa-trash-o "></i> Xóa ảnh</a>';
 html+='</div>';


 $('#entry_img').append(html);
});

    $(document).on('click', 'a.select-img', function(event) {
      event.preventDefault();
      var id= $(this).attr('id');
      $('#modal-id-product').modal('show');
      $('#modal-id-product').one('hide.bs.modal', function(e) {
        var imgUrl = $('input#image').val();
        if(imgUrl !='') {
         $('input#'+id).val(imgUrl);
         $('img#show-'+id).attr('src',imgUrl);
       }

     });
    });

    $(document).on('click', 'a.remove-image', function(event) {
      event.preventDefault();
      var id = $(this).attr('id');
  // alert(id);
  $('input#'+id).val('');
  $('img#show-'+id).attr('src','');
  $('div.row-'+id).remove();

});
  });

  // ========================================//
  
  $(document).ready(function() {
    $('#product-pricesale').blur(function(event) {
      if ($('#product-saleoff').val()) {
        var psale = $('#product-price').val() * ($('#product-saleoff').val() / 100);
        $(this).val(psale);
      }
      
    });   
  });

// $(document).ready(function() {
//   $('button').click(function(event) {
//    var selected = [];
//     $('#authitem-name option:selected').each(function(i, sel) {
//      $(sel).val().text().hide();
//      $('#authitem-name').append($(sel).val()).html();
//     });
//   });
// });

// gan quyen cho nguoi dung
$(document).ready(function() {
  $('.add-asign').click(function(event) {
    event.preventDefault();
    var postval = [];
    $('#member-permission option:selected').each(function(index, el) {
     postval.push($(this).val());
     $(this).hide();
   });
    var postdata = postval;
    console.log(postdata);
    var href = $('#w1').attr('action');
     // alert(href);
     $.ajax({
       url: href,
       type: 'POST',
       // dataType: 'html',
       data: {permission: postdata},
       success:function(res) {
         // console.log(res);         
         $('#member-permission_assined').load(location.href + ' #member-permission_assined>*', '');         

       }
     })       
   });
});

$(document).ready(function() {
  $('.remove-asign').click(function(event) {
    event.preventDefault();
    // alert('ok');
    var removeval = [];
    $('#member-permission_assined option:selected').each(function(index, el) {
     removeval.push($(this).val());
     // alert(removeval); 
   });
    var removedata = removeval;
    // console.log(removedata);
    var href = $('#w1').attr('action');
     // alert(href);
     $.ajax({
       url: href,
       type: 'POST',
       // dataType: 'html',
       data: { permission_assined: removedata},
       success:function(res) {
         console.log(res);         
         $('#member-permission_assined').load(location.href + ' #member-permission_assined>*', '');        
         $('#member-permission').load(location.href + ' #member-permission>*', '');        

       }
     })       
   });
});
// gan quyen cho nguoi dung
///==========gan quyen==========================
$(document).ready(function() {
  $('.add-permision').click(function(event) {
    event.preventDefault();
    // alert('ok');
    var addpermisstion = [];
    $('#authitem-permission option:selected').each(function(index, el) {
     addpermisstion.push($(this).val());
     // alert(removeval); 
   });
    var adddata = addpermisstion;
    // console.log(removedata);
    var href = $('#w1').attr('action');
     // alert(href);
     $.ajax({
       url: href,
       type: 'POST',
       // dataType: 'html',
       data: { permission: adddata},
       success:function(res) {
         console.log(res);         
         $('#authitem-permission').load(location.href + ' #authitem-permission>*', '');        
         $('#authitem-permission_assined').load(location.href + ' #authitem-permission_assined>*', '');        

       }
     })       
   });
});

$(document).ready(function() {
  $('.remove-permision').click(function(event) {
    event.preventDefault();
    // alert('ok');
    var removeper = [];
    $('#authitem-permission_assined option:selected').each(function(index, el) {
     removeper.push($(this).val());
     // alert(removeval); 
   });
    var removedata = removeper;
    // console.log(removedata);
    var href = $('#w1').attr('action');
     // alert(href);
     $.ajax({
       url: href,
       type: 'POST',
       // dataType: 'html',
       data: { permission_assined: removedata},
       success:function(res) {
         console.log(res);         
         $('#authitem-permission').load(location.href + ' #authitem-permission>*', '');        
         $('#authitem-permission_assined').load(location.href + ' #authitem-permission_assined>*', '');       

       }
     })       
   });
});
// =============gan quyen============================
///order tabs
$(document).on('click', '.order-tabs', function(event) {
  event.preventDefault();
  /* Act on the event */
  var href = $(this).attr('href');
  var url = $(this).data('url'); 
  // alert(href);
  $.ajax({
    url: url,
    type: 'POST',
    // dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
    data: { status: href },
    success:function(res) {
      console.log(res);
    }
  })
});

$('#w1-success-0').delay(3000).slideToggle(1000);