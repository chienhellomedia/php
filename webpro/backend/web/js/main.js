$(document).ready(function() {
	$('a.add-img-banner').click(function(event) {
		/* Act on the event */
		event.preventDefault();
		$('#modal-banner').modal('show');
		$('#modal-banner').on('hide.bs.modal', function(e){
			var img = $('#banner-images').val();
			$('.show-banner').attr('src', img);
		});
	});
});

/*chon anh*/
$(document).ready(function() {
	$('.select-img-product').click(function(event) {
		/* Act on the event */
		event.preventDefault();
		$('.trigger-product').trigger('click');
	});
});

$(document).on('click', 'a.select-img', function(event) {
	var avartar = 'http://dev.com/backend/web/uploads/iconavatar.PNG';
	event.preventDefault();
	var n_row = $('#entry_img').find('div.r'); 
	var id= $(this).attr('id');
	var html; 
	// alert(n_row.length);
	var checkrow = parseInt(n_row.length - $(this).data('id'));
	$('#modal-id-product').modal('show');
	$('#modal-id-product').one('hide.bs.modal', function(e) {
		var imgUrl = $('input#images-detail').val();
		if(imgUrl !='') {
			$('input#'+id).val(imgUrl);
			$('img#show-'+id).attr('src',imgUrl);
		}

		if($('input#'+id).val() && checkrow == 1) {
			appendImages(n_row.length, avartar);
		}
	});
});

function appendImages(length, avartar) {
	var len = parseInt(length + 1);
	html = '<div class="r row-img-'+length+'">';
	html +='<input type="hidden" name="images_detail[]" id="img-'+length+'" class="form-control">';
	html += '<img src="'+avartar+'" alt="" id="show-img-'+length+'" class="img-responsive">';
	html +='<a href="#" id="img-'+length+'" data-id="'+length+'" title="Chọn hình ảnh" class="btn btn-sm select-img" data-id=""><i class="fa fa-picture-o"></i></a>';
	html +='<a href="#" id="img-'+length+'" data-id="'+length+'" title="Xóa hình ảnh" class="btn btn-sm remove-image"><i class="fa fa-trash-o "></i></a>';
	html+='</div>';
	$('#entry_img').append(html);
}

$(document).on('click', 'a.remove-image', function(event) {
	event.preventDefault();
	var n_row = $('#entry_img').find('div.r'); 
	var id = $(this).attr('id');
 	// alert(id);
 	$('input#'+id).val('');
 	$('img#show-'+id).attr('src','');
 	$('div.row-'+id).remove();

 });

$(document).ready(function() {
	$('#flip').click(function(event) {
		$('#entry_img').slideToggle("slow");
	});
});

/*chon anh*/



$(document).ready(function() {
	$('.select-certificate').click(function(event) {
		event.preventDefault();
		
		$('#modal-certificate').modal('show');
		$('#modal-certificate').one('hide.bs.modal', function(e) {
			var imgUrl = $('input#certificate-images').val();
			$('.select-certificate img').attr('src',imgUrl);
		});
	});
});


$(document).ready(function() {
	$('#product-pricesale').blur(function(event) {
		if ($('#product-saleoff').val()) {
			var psale = $('#product-price').val() * ($('#product-saleoff').val() / 100);
			$(this).val(psale);
		}
		
	});   
});


$(document).ready(function() {
	$('.select-story').click(function(event) {
		event.preventDefault();
		$('#modal-story').modal('show');
		$('#modal-story').on('hide.bs.modal', function(e){
			var story = $('#about-images').val();
			$('.select-story img').attr('src', story);
		});
	});
});


$(document).ready(function() {
	$(document).on('submit', '#form-search-order', function(event) {
		event.preventDefault();
		/* Act on the event */
		var form = $(this);
		var input = form.find('#input-order').val();
		$.ajax({
			type: "POST",
			// datatype: 'html',
			url: form.attr('action'),
			data:{'input': input},
			success: function(data){
				var result = $('<div/>').append(data).find('.load-order').html();
				$('.load-order').html(result);

			}
		});
	});
});
