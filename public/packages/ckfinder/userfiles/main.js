// Add site functions here
jQuery(document).ready(function($){

	function generateSlug() {
		$("#title").slug({ 
			slug:'slug', 
			hide: false 
		});
		$('.overrideSlug').click(function() {
			$('.slug').removeAttr('readonly');
		});
	}

	function activateTabs() {
		$('.tab').click(function() {
			thisTab = $(this);
			$('.tab').removeClass('active');
			thisTab.addClass('active');
			if(thisTab.hasClass('modalInfo')) {

				return;
			}
			if(thisTab.hasClass('codeTab')) {
				$('.codeWindow').css({'display': 'block', 'z-index':'3'});
				$('.markdownWindow').css({'display': 'none', 'z-index':'1'});
				$('.previewWindow').css({'display': 'none', 'z-index':'2'});
			} else if(thisTab.hasClass('previewTab')) {
				$('.previewWindow').css({'display': 'block', 'z-index':'3'});
				$('.markdownWindow').css({'display': 'none', 'z-index':'2'});
				$('.codeWindow').css({'display': 'none', 'z-index':'1'});
			} else {
				$('.markdownWindow').css({'display': 'block', 'z-index':'3'});
				$('.previewWindow').css({'display': 'none', 'z-index':'1'});
				$('.codeWindow').css({'display': 'none', 'z-index':'2'});
			}
		});
	}

	function activateModalWindows() {
		$('.modalInfo').click(function(event) {
			var modalId = $(this).attr('id');
			var modalWindow = $('.modalWindow.'+modalId);
			if(modalWindow.is(':visible')) {
				modalWindow.parent().fadeOut('fast');
			} else {
				modalWindow.parent().fadeIn('fast');
			}
		});

		$('.modalClose').click(function() {
			if($('.modalOverlay').is(':visible')) {
				$('.modalOverlay').fadeOut('fast');
			}
		});
	}


	function activateHallo() {
		// Enable Hallo editor
	  $('.editable').hallo({
	    plugins: {
	      'halloformat': {},
	      'halloheadings': {},
	      'hallolists': {},
	      'halloreundo': {},
	      'halloimage': {},
	      'hallolink': {}
	    },
	    toolbar: 'halloToolbarFixed'
	  });

	  var markdownize = function(content) {
	  var html = content.split("\n").map($.trim).filter(function(line) { 
	      return line != "";
	    }).join("\n");
	    return toMarkdown(html);
	  };

	  var converter = new Showdown.converter();

	  var htmlize = function(content) {
	    return converter.makeHtml(content);
	  };

	  // Method that converts the HTML contents to Markdown
	  var showSource = function(content) {
	    var markdown = markdownize(content);
	    if(jQuery('#source').length > 0) {
		    if (jQuery('#source').get(0).value == markdown) {
		      return;
		    }
		    jQuery('#source').get(0).value = markdown;
	    }
	  };


	  var updateHtml = function(content) {
	    if (markdownize(jQuery('.editable').html()) == content) {
	      return;
	    }
	    if (markdownize(jQuery('.html').html()) == content) {
	      return;
	    }
	    var html = htmlize(content);
	    jQuery('.editable').html(html); 
	    jQuery('.html').html(html); 
	  };

	  jQuery('.editable').bind('hallomodified', function(event, data) {
	    showSource(data.content);
	    $('.html').html(data.content);
	  });

	  jQuery('.html').bind('keyup', function() {
	    showSource(this.value);
	    updateHtml(this.value);
	  });

	  jQuery('#source').bind('keyup', function() {
	    updateHtml(this.value);
	  });
	  
	  var serverHtml = $('.html').text();
	  showSource(serverHtml);
	  $('.editable').html(serverHtml);
	}


	function activateCKEditor() {
		if( $('textarea[name="description"]').length ) {
			CKEDITOR.replace( 'description' );
		}
	}

	function removeFeaturedImage() {
		$('.removeFeaturedImage').click(function() {
			var remove = confirm('Are you sure you want to remove the image?');
			if(remove == true) {
				$('.selectedFeaturedImage').fadeOut('fast', function() {
					$('.featuredImageContainer').html('<input required="required" name="featured_image" type="file" id="featured_image">');
				});
			}
		});
	}


	function closeAlert() {
		$('.alert').click(function(){
			$(this).fadeOut('fast');
		});
	}

	function addSortableToElements() {
		$( "#sortable" ).sortable({
			update: function() {
				var order = new Object;
				var token = $('input[name=_token]').val();
				var route = $('input[name=_route]').val();
				
				$('#sortable li').each(function( i ){
				    this.id = i+1;
				    var item = new Object;
				    item['type'] = $(this).text();
				    item['sort'] = i+1;

				    order[i+1] = item;
					});

				updateOrderViaAjax(route, order, token);
			}
		});
    $( "#sortable" ).disableSelection();
	}

	function updateOrderViaAjax(route, object, token) {
		console.log(object);
		$.ajax({
			url: "/cms/"+route+"/updateorder",
			type: "post",
			data: { '_sortList' : object, '_token' : token },
			error: function(data){
        alert("Something went wrong. Try again.");
      }
	  });
	}
		  

	//  Call functions to load on page load
	generateSlug();
	// activateHallo();
	// activateTabs();
	// activateModalWindows();
	activateCKEditor();
	closeAlert();
	removeFeaturedImage();
	addSortableToElements();

});