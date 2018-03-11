$('#w1-success-0').delay(1000).slideToggle(400);
$('#w0-success-0').delay(1000).slideToggle(400);

$(document).ready(function() {
	$('.btn-login').click(function(event) {
		event.preventDefault();
		$('#modal-login').modal('show');
	});

});

$(document).ready(function($) {
	$('.categories-filter ul li').click(function(e){
		$('a.status').text(this.innerHTML);
	});
});

$(document).on('click', '.btn-cart', function(event) {
	event.preventDefault();
	var href = $(this).attr('href');
	var	img = $(this).data('img'); 
	var	name = $(this).data('name'); 
	var	price = $(this).data("pirce");
	var	pricelist = $(this).data("pricelist");
	$.ajax({
		url: href,
		type: 'GET',
		data: {'qtt' : 1, 'price': price },

		success:function(res) {
			$('.img-product-preview').attr('src', img);
			$('.product-show-name').text(name);
			$('.product-show-price').text(price);
			$('.show-pricelist').text(pricelist);
			$('#modal-id-cart').modal('show');
		}
	})
	.fail(function() {
		console.log("error")
	});	
});


$(document).on('submit', '.form-update-cart', function(event) {
	event.preventDefault();
	var idcart = $(this).data('id');
	action = $(this).attr('action');
	data = $('#update-cart-'+idcart).serialize();
	// alert(data);
		$.ajax({
			url: action,
			type: 'POST',
			dataType: 'html',
			// data: {id: id, qtt: qtt},
			data: data,
			success:function(res){
				location.reload();
				// $('.cart-items').load(location.href + " .cart-items>*", "");
				// $('.top-cart-row').load(location.href + " .top-cart-row>*", "");
			}
		})	
	// return false;
});

$(document).ready(function() {
	$('.add-to-wishlist').click(function(event) {
		event.preventDefault();
		var count = $(this).data('count');
		if(count == '') {
			alert('bạn phải đăng nhập để thực hiện chức năng này...');
		} else {
			var html = '<p class="notice-check-off"><i class="fa fa-check fa-lg" aria-hidden="true"></i>&nbsp;<span>đã thích.</span></p>';
			$('.notice-check').text('');

			var id = $(this).data('id');
			var href = $(this).attr('href');
			var img = $(this).data('img');		
			var name = $(this).data('name');	

			$.ajax({
				url: href,
				type: 'GET',
				data: {},
				success:function(res) {
					$('.notice-check').append(html);
					$('.notice-check-off').delay(1000).slideToggle(500);
				}
			});	
		}
	});
});



$(document).on('click', '.del-wishlist', function(event) {
	event.preventDefault();
	/* Act on the event */

	url = $(this).attr('href');
	
	var html = '<p class="notice-check-off-1"><i class="fa fa-check fa-lg" aria-hidden="true"></i>&nbsp;<span>đã Xóa.</span></p>';
	$('.notice-check').text('');
	$.ajax({
		url: url,
		type: 'GET',
		success:function(res){
			$('.notice-check').append(html);
			$('.my-wishlist-page').load(location.href + " .my-wishlist-page>*", "");
			$('.notice-check-off-1').delay(1000).slideToggle(500);
		}
	})
});

$(document).on('click', '.delete-cart', function(event) {
	event.preventDefault();
	url = $(this).attr('href');
	$.ajax({
		url: url,
		type: 'GET',
		success:function(res){
			setInterval(function() {
				$('.cart-items').load(location.href + " .cart-items>*", "");
				$('.top-cart-row').load(location.href + " .top-cart-row>*", "");
				$('#modal-id-delcart').modal('hide');
			}, 1000);
			
		}
	})	
});

$(document).on('submit', '.comment-form', function(event) {
	event.preventDefault();
	var form = $(this);
	form.find('.contentFocus').focus();
	if(form.find('.has-error').length) {
		return false;
		form.find('.contentFocus').focus();
	}
	if(form.find('.userComment').val() == 0 ) {
		alert('Bạn phải đăng nhập');
		return false;
	} 
	$('.spin-load').show();
	var formData = form.serialize();
	$.ajax({
		url: form.attr("action"),
		type: form.attr("method"),
		data: formData,
		// dataType: 'html',
		success: function (data) {
			// console.log(data);
			$('.comment').load(location.href + " .comment>*", "");
			$('.content-comments').load(location.href + " .content-comments>*", "");
			// $('.button-comment').load(location.href + " .button-comment>*", "");
			$('.spin-load').hide();
		}
	});

});



$(document).on('click', '.reply', function(event) {
	event.preventDefault();
	$('.form-comment-child').addClass('hide');
	$(this).parents('.media-body').find('.form-comment-child').removeClass('hide');
	$(this).parents('.media-body').find('.form-comment-child').find('.contentFocus').focus();
});
$(document).ready(function() {
	$('.btn-destroy').click(function(event) {
		$('.form-comment-child').addClass('hide');
	});
});

// $(document).on('click', '.show-more-reply', function(event) {
// 	event.preventDefault();
// 	/* Act on the event */
// 	$('.spin-load').show();
// 	$(this).siblings('.media').removeClass('hide');
// 	$('.spin-load').delay(1000).hide();
// });

$(document).on('click', '.show-more-comment', function(event) {
	event.preventDefault();
	var count = $(this).data('count');
	// var page = parseInt($(this).data('page'));
	var page = parseInt($(".show-more-comment").attr('data-page'));
	// alert(page);
	var table = $(this).data('table');
	var slug = $(this).data('slug');
	var href = $(this).data('href');
	var cus = $(this).data('cus');
	

	$('.spin-load').show();
	$.ajax({
		url: href,
		type: 'GET',
		dataType: ' html',
		data: {'page':page, 'table':table, 'slug':slug, 'cus_id':cus },
		success:function(res) {
			$('.content-comments').append(res);
				//('.show-more-comment').data('page',(page + 3));
				$(".show-more-comment").attr('data-page', (page+1));
				$('.spin-load').hide();
			}
		})
});


$(document).on('click', '.delete-cart', function(event) {
	event.preventDefault();
	href = $(this).data('href');
	name = $(this).data('name');
	$('#modal-delete-cart').modal('show');
	$('.name-cart').text(name);
	$('.btn-del-cart').attr('href', href);
});

$(document).ready(function() {
	$('.btn-del-cart').click(function(event) {
		event.preventDefault();
		url = $(this).attr('href');
		$.ajax({
			url: url,
			type: 'GET',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			// data: {param1: 'value1'},
			success:function(res){
				// alert(location.href);
				$('.shopping-cart').load(location.href + " .shopping-cart>*", "");
				$('.top-cart-row').load(location.href + " .top-cart-row>*", "");
				$('#modal-delete-cart').modal('hide');
			}
		})	
	});
});


$(document).on('click', '#clearcart', function(event) {
	/* Act on the event */
	event.preventDefault();
	href = $(this).data('href');
	$('#modal-clearallcart').modal('show');
	$('.clearallcart').attr('href', href)
});

$(document).ready(function() {
	$('.clearallcart').click(function(event) {
		/* Act on the event */
		event.preventDefault();
		href = $(this).attr('href');
		$.ajax({
			url: href,
			type: 'GET',
			// dataType: 'html',
			// data: {param1: 'value1'},
			success:function(res) {
				$('.shopping-cart').load(location.href + " .shopping-cart>*", "");
				$('.top-cart-row').load(location.href + " .top-cart-row>*", "");
				$('#modal-clearallcart').modal('hide');
			}
		})		
		
	});
});

$(document).on('submit', '.addcart-form', function(event) {
	event.preventDefault();
	var url = $(this).attr('action');
	var qtt = parseInt($(this).find('.cart-quantity').find('input').val());
	if (qtt > 0) {
		var formdata = $(this).serialize();
		var html = '<p class="notice-add"><i class="fa fa-check fa-lg" aria-hidden="true"></i>&nbsp;<span>đã thêm vào giỏ hàng.</span></p>';
		$('.notice-check').text('');

		$.ajax({
			url: url,
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			data: formdata,
			success:function(res) {
				$('.notice-check').append(html);
			}
			
		}).fail(function() {
			console.log("error");
		});
		$('.notice-check').delay(1000).slideToggle(500);
	} else {
		alert('số lượng phải lớn hơn 0.')
		return false;
	}
	return false;
});


$(document).ready(function() {
	$('.btn-filter-price').click(function(event) {
		event.preventDefault();
		rang = $('.price-slider').val();
		res = rang.split(',');
		anum = parseInt(res[0])*1000;
		bnum = parseInt(res[1])*1000;
		url = $(this).attr('href');
		slug = $(this).data('geturl');
		// alert(bnum);
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'html',
			data: {slug : slug, par1: anum, par2 : bnum },
			success:function(res) {
				console.log(res);
				var result = $('<div/>').append(res).find('.load-div-pro').html();
				// alert(result);
				$('.load-div-pro').html(result);
			}
		})
	});
});

$(document).ready(function() {
	$("area[rel^='prettyPhoto']").prettyPhoto();
	$(".gallery:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:3000, autoplay_slideshow: false});
	$(".gallery:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});
});

$(document).ready(function() {
	$('.show-chat').on('click',function() {
		if($('.show-facebook').css('display') == 'none')
		{
			$('.show-facebook').slideDown(500);
			$('.bluezed-scroll-top-circle').css('display', 'none');
		} else {
			$('.show-facebook').slideUp(500);
			$('.bluezed-scroll-top-circle').css('display', 'block');
		}

	});
});