
tinymce.init({
	selector: 'textarea#product-content',
	height: 250,
	width:"",
	plugins: [
	"codemirror advlist autolink lists link image charmap print preview hr anchor pagebreak",
	"searchreplace wordcount visualblocks visualchars fullscreen",
	"insertdatetime media nonbreaking save table contextmenu directionality",
	"emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
	],
	toolbar1: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | styleselect formatselect fontselect fontsizeselect ",
	toolbar2: "table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code ",
	image_advtab: true,
	image_advtab: true,
	menubar: false,
	toolbar_items_size: 'small',
	relative_urls: false, 
	remove_script_host : false,
	filemanager_title:"Media Manager",	
	external_filemanager_path: homeUrl()+"/file/",
	external_plugins: { "filemanager" : homeUrl()+"/file/plugin.min.js"},
	filemanager_access_key:'MUFRYlNHa2xEcxQlHBAcH0YwDhcfM101eHglMmcuJj9Wd2gFCxMYLw',
});
tinymce.init({
	selector: 'textarea#product-desc',
	height: 150,
	width:"",
	plugins: [
	"codemirror advlist autolink lists link image charmap print preview hr anchor pagebreak",
	"searchreplace wordcount visualblocks visualchars fullscreen",
	"insertdatetime media nonbreaking save table contextmenu directionality",
	"emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
	],
	toolbar1: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | styleselect formatselect fontselect fontsizeselect ",
	toolbar2: "table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code ",
	image_advtab: true,
	image_advtab: true,
	menubar: false,
	toolbar_items_size: 'small',
	relative_urls: false, 
	remove_script_host : false,
	filemanager_title:"Media Manager",	
	external_filemanager_path: homeUrl()+"/file/",
	external_plugins: { "filemanager" : homeUrl()+"/file/plugin.min.js"},
	filemanager_access_key:'MUFRYlNHa2xEcxQlHBAcH0YwDhcfM101eHglMmcuJj9Wd2gFCxMYLw',
});

tinymce.init({
	selector: 'textarea#blog-content',
	height: 250,
	width:"",
	plugins: [
	"codemirror advlist autolink lists link image charmap print preview hr anchor pagebreak",
	"searchreplace wordcount visualblocks visualchars fullscreen",
	"insertdatetime media nonbreaking save table contextmenu directionality",
	"emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
	],
	toolbar1: "undo redo bold italic underline strikethrough cut copy paste| alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote searchreplace | styleselect formatselect fontselect fontsizeselect ",
	toolbar2: "table | hr removeformat | subscript superscript | charmap emoticons ltr rtl | spellchecker | visualchars visualblocks nonbreaking template pagebreak restoredraft | link unlink anchor image media | insertdatetime preview | forecolor backcolor print fullscreen code ",
	image_advtab: true,
	image_advtab: true,
	menubar: false,
	toolbar_items_size: 'small',
	relative_urls: false, 
	remove_script_host : false,
	filemanager_title:"Media Manager",	
	external_filemanager_path: homeUrl()+"/file/",
	external_plugins: { "filemanager" : homeUrl()+"/file/plugin.min.js"},
	filemanager_access_key:'MUFRYlNHa2xEcxQlHBAcH0YwDhcfM101eHglMmcuJj9Wd2gFCxMYLw',
});

tinymce.init({
	selector: 'textarea#blog-shorttitle',
	toolbar_items_size: 'small',
	height: 150,
	width:"",
	menubar: false,
	plugins: [
	"advlist autolink lists link image charmap print preview hr anchor pagebreak",
	"searchreplace wordcount visualblocks visualchars fullscreen",
	"insertdatetime media nonbreaking save table contextmenu directionality",
	"emoticons template paste textcolor colorpicker textpattern imagetools code fullscreen"
	],
	toolbar1: "undo redo bold italic underline | alignleft aligncenter alignright alignjustify bullist numlist outdent indent blockquote link unlink anchor image media | preview | forecolor backcolor fullscreen code | styleselect formatselect fontselect fontsizeselect ",

	image_advtab: true,
	menubar: false,
	toolbar_items_size: 'small',
	relative_urls: false,
	remove_script_host : false,
	filemanager_title:"Media Manager",	
	external_filemanager_path: homeUrl()+"/file/",
	external_plugins: { "filemanager" : homeUrl()+"/file/plugin.min.js"},
	filemanager_access_key:'MUFRYlNHa2xEcxQlHBAcH0YwDhcfM101eHglMmcuJj9Wd2gFCxMYLw',

});	

$('a#select-img').click(function(event){

	event.preventDefault();

	$('#modal-media-img').modal('show');

	$('#modal-media-img').on('hide.bs.modal', function(e){
		var imgUrl = $('input#image').val();
		$('img#show-img').attr('src', imgUrl);

	});
});

$('a#remove-img').click(function(event){

	event.preventDefault();

	$('input#image').val('');
	$('img#show-img').attr('src', '');

});

$('a#select-img-pro').click(function(event){

	event.preventDefault();

	$('#modal-media-img-pro').modal('show');

	$('#modal-media-img-pro').on('hide.bs.modal', function(e){
		var imgUrl = $('input#image-pro').val();
		$('img#show-img-pro').attr('src', imgUrl);

	});
});

$('a#remove-img-pro').click(function(event){

	event.preventDefault();

	$('input#image-pro').val('');
	$('img#show-img-pro').attr('src', '');

});