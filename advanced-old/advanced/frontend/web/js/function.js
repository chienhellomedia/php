$(document).ready(function() {
	$('.add-to-wishlist').click(function(event) {
		event.preventDefault();
		id = $(this).data('id');
		href = $(this).attr('href');
		img = $(this).data('img');		
		name = $(this).data('name');	
		// alert(img);
		$.ajax({
			url: href,
			type: 'GET',
			dataType: 'html',
			data: {},
			success:function(res) {
				$('#name-wishlist').text(name);
				$('#img-show-wishlist').attr('src', img);
				$('#modal-id-wishlist').modal('show');
			}
		});	
		
	});
});

$(document).on('click', '.del-wishlist', function(event) {
	event.preventDefault();
	/* Act on the event */
	
	url = $(this).attr('href');
	$('#modal-id-delwishlist').modal('show');
	$('a#del-wl-value').attr('href', url);
		// $.ajax({
		// 	url: url,
		// 	type: 'GET',
		// 	// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		// 	// data: {param1: 'value1'},
		// 	success:function(res){
		// 		$('#modal-id-delwishlist').modal('show');
		// 		urldel = $('a#del-wl-value').attr('href', url);
		// 	}
		// })	
		
	});

$('a#del-wl-value').click(function(event) {
	event.preventDefault();
	urld = $(this).attr('href');
		// alert(urld);
		$.ajax({
			url: url,
			type: 'GET',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			// data: {param1: 'value1'},
			success:function(res){
				$('.my-wishlist-page').load(location.href + " .my-wishlist-page>*", "");
				$('#modal-id-delwishlist').modal('hide');
			}
		})	
	});




$(document).ready(function() {
	$('.btn-filter-price').click(function(event) {
		event.preventDefault();
		rang = $('.price-slider').val();
		res = rang.split(',');
		anum = parseInt(res[0]);
		bnum = parseInt(res[1]);
		url = $(this).attr('href');
		slug = $(this).data('geturl');
		// alert(slug);
		$.ajax({
			url: url,
			type: 'GET',
			dataType: 'html',
			data: {slug : slug, par1: anum, par2 : bnum },
			success:function(res) {
				// alert(res);
				var result = $('<div/>').append(res).find('.load-div-pro').html();
				// alert(result);
				$('.load-div-pro').html(result);
			}
		})
	});
});

$(document).change('.changefilter', function(event) {
	event.preventDefault();
	var value = "";
	$('select option[name = select]:selected').each(function() {
		value = $(this).val();
		href = $(this).data('href');
		slug = $('input[name="slughidden"]').val();
			// alert(slug);
			$.ajax({
				url: href,
				type: 'GET',
				dataType: 'html',
				data: { filter: value, slug : slug },
				success:function(res) {
					var result = $('<div/>').append(res).find('.load-div-pro').html();
					// alert(result);
					$('.load-div-pro').html(result);
				}
			})			
		});
});


$(document).ready(function() {

	$('.changefilter').change(function() {
		
	});
});
/*add to cart*/
$(document).ready(function() {
	$('.btn-cart').click(function(event) {
		// alert('chien');
		event.preventDefault();
		var href = $(this).attr('href');
		var	img = $(this).data('img'); 
		var	name = $(this).data('name'); 
		var	price = $(this).data("price");
		// alert(price);
		$.ajax({
			url: href,
			type: 'GET',
		 		// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
		 		data: {'qtt' : 1},

		 		success:function(res) {
		 			$('.img-product-preview').attr('src', img);
		 			$('.product-show-name').text(name);
		 			$('.product-show-price').text(price);
		 			$('#modal-id-cart').modal('show');
		 			$('.top-cart-row').load(location.href + " .top-cart-row>*", "");
		 		}
		 	})

		.fail(function() {
			console.log("error")
		});	
	});
});

$(document).ready(function() {
	$('.add-cart-from').click(function(event) {
		/* Act on the event */
		event.preventDefault();
		var id = $(this).data('id');
		var qtt = $('.addcartfrom input[name="qtt"]').val();
		var action = $('form.addcartfrom').attr('action');

		var	img = $(this).data('img'); 
		var	name = $(this).data('name'); 
		var	price = $(this).data("price");

		$.ajax({
			url: action+'?id='+id+'&qtt='+qtt,
			type: 'POST',
			// dataType: 'default: Intelligent Guess (Other values: xml, json, script, or html)',
			// data: {id: id, qtt : qtt},
			success:function(res) {
				console.log(res);
				$('.img-product-preview').attr('src', img);
				$('.product-show-name').text(name);
				$('.product-show-price').text(price);
				$('#modal-id-cart').modal('show');
				$('.top-cart-row').load(location.href + " .top-cart-row>*", "");

			}
		})		
		.fail(function() {
			console.log("error");
		})
		;
		
	});
});


$(document).on('click', '.delete-cart', function(event) {
	event.preventDefault();
	href = $(this).attr('href');
	name = $(this).data('name');
	$('#modal-id-delcart').modal('show');
	$('.delname').text(name);
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
				$('.cart-items').load(location.href + " .cart-items>*", "");
				$('.top-cart-row').load(location.href + " .top-cart-row>*", "");
				$('#modal-id-delcart').modal('hide');
			}
		})	
	});
});

$(document).on('click', '.update-cart', function(event) {
	event.preventDefault();
	/* Act on the event */

	action = $('.form-update-cart').attr('action');
	id = $(this).data('id');
		// data = $('#form-cart-'+id).serialize();
		qtt = $('div#qtt-'+id+' input[name="qtt"]').val();
		// alert(qtt);		
		$.ajax({
			url: action,
			type: 'POST',
			dataType: 'html',
			data: {id: id, qtt: qtt},
			success:function(res){
				// alert(res);
				$('.cart-items').load(location.href + " .cart-items>*", "");
				$('.top-cart-row').load(location.href + " .top-cart-row>*", "");
			}
		})	
		
	});

//clear all cart
$(document).on('click', '#clearcart', function(event) {
		/* Act on the event */
		event.preventDefault();
		href = $(this).attr('href');
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
				$('.cart-items').load(location.href + " .cart-items>*", "");
				$('.top-cart-row').load(location.href + " .top-cart-row>*", "");
				$('#modal-clearallcart').modal('hide');
			}
		})		
		
	});
});

$(document).ready(function() {
	$('.checkout-btn').click(function(event) {
		total = $(this).data('total');
		$.ajax({
			url: $(this).attr('href'),
			type: 'POST',
			data: {total: total},			
		})
	});
});

$(document).ready(function() {
	var heightimg = 0;
	$('.blog-post-image .image img').each(function(index, el) {
		var current = $(this).height();
		if (parseInt(heightimg) < parseInt(current)) {
			heightimg = parseInt(current);
		}
	});
	$('.blog-post-image .image img').css('height', heightimg+'px');
});

$(document).on('click', '.add-compare', function(event) {
	event.preventDefault();
	href = $(this).attr('href');
	name = $(this).data('name');
	$.ajax({
		url: href,
		type: 'GET',
		dataType: 'html',
		// data: {param1: 'value1'},
		success:function(res) {
			$('.name-compare').text(name);
			$('#modal-id-compare').modal('show');
		}
	})
	
});

$(document).ready(function() {
	$('.remove-compare').click(function(event) {
		event.preventDefault();
		href = $(this).attr('href');
		// alert(href);
		$.ajax({
			url: href,
			type: 'GET',
		// dataType: 'html',
		// data: {param1: 'value1'},
		success:function(res) {
			$(".product-comparison").load(location.href + " .product-comparison", "");
		}
	})
	});
});

// $(document).ready(function() {
// 	var proimgheight = 0;
// 	$('.imgheight').each(function() {
// 		var heightpro = $(this).height();
// 		if (parseInt(proimgheight) < parseInt(heightpro)) {
// 			proimgheight = parseInt(heightpro);
// 		}
// 	});
// 	$('.imgheight').css('height', proimgheight+'px');
// });
// 
// 
// $(document).ready(function() {
// 	$('.search-main').click(function(event) {
// 		event.preventDefault();
// 		var href = $('form#form-main-search').attr('action');
// 		var content = $('input[type="search"]').val();

// 		var select = '';		
// 		$('select option[name="select-option"]:selected').each(function() {
// 			select = $(this).val();			
// 		});
// 		var param = select;
// 		$.ajax({
// 			url: href,
// 			type: 'GET',
// 			dataType: 'html',
// 			data: { 'param': param, 'content': content },
// 			success:function(res) {
// 				console.log(res);
// 				var result = $('<div/>').append(res).find('.load-div-pro').html();
// 				// alert(result);
// 				$('.load-div-pro').html(result);
// 			}
// 		})

// 	});
// });
