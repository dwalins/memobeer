$( document ).ready(function() {
    
    $(function()
{
	 $( "#beer-name" ).autocomplete({
	  source: "search/autocomplete",
	  minLength: 3,
	  select: function(event, ui) {
	  	$('#beer-name').val(ui.item.value);
	  }
	}).data('autocomplete')._renderItem = function(ul, item) {
	        return $( "<li></li>" )
	        .data( "item.autocomplete", item )
	        .append( "<a style='font-size: 13px; height: 60px;'><img src='" + item.url + "' style='width: 48px; height: 48px; margin-top: 5px; border: 1px solid #CCCCCC; float: left;'/><div style='height: 60px; width: 150px; margin-left: 5px; float: left;'>" + item.url + "</div></a>" )
	        .appendTo( ul );
	    };
	
	});

});