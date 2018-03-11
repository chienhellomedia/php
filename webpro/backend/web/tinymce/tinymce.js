$(document).ready(function() {
	

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
		external_filemanager_path: homeUrl()+"/filemanager/",
		external_plugins: { "filemanager" : homeUrl()+"/filemanager/plugin.min.js"},
		filemanager_access_key:'z32jjvAjeuheGGIUe7gWO_Fh9PEko',
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
		image_advtab: true,
		image_advtab: true,
		menubar: false,
		toolbar_items_size: 'small',
		relative_urls: false, 
		remove_script_host : false,
		filemanager_title:"Media Manager",	
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
		external_filemanager_path: homeUrl()+"/filemanager/",
		external_plugins: { "filemanager" : homeUrl()+"/filemanager/plugin.min.js"},
		filemanager_access_key:'z32jjvAjeuheGGIUe7gWO_Fh9PEko',
	});



});