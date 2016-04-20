$( document ).ready(function() {
    
$(function()
{
	var $project = $( "#beer-name" );
	var idbeer = '';


	 $project.autocomplete({
	  source: "search/autocomplete",
	  minLength: 3,
	  select: function(event, ui) {
	  	$('#beer-name').val(ui.item.value);
	  	idbeer = ui.item.id;
	  }
	});

	$project.data( "ui-autocomplete" )._renderItem = function( ul, item ) {
    
	    var $li = $('<li>'),
	        $img = $('<img>');


	    if(item.url == ''){
		    $img.attr({
		    	src: 'http://www.brewerydb.com/img/beer.png',
		    });
	    }else{
	    	$img.attr({
	      		src: item.url,
	    	});

	    }
	    // console.log(item);
	    $img.attr('width', '20');
	    $img.attr('height', '20')

	    $li.attr('data-value', item.label);
	    $li.append('<a href="#">');
	    if(item.abv == 0){
	    	$li.find('a').append($img).append('<span style="color:#334D5C">' +item.brewery.substr(0, 30)+'</span>&nbsp;&nbsp;'+item.label.substr(0, 40));
		}
		else{
			$li.find('a').append($img).append('<span style="color:#334D5C">' +item.brewery.substr(0, 30)+'</span>&nbsp;&nbsp;'+item.label.substr(0, 40)+'<span style="color:#d9534f;float:right;">'+item.abv+'°</span>');
		}
	    return $li.appendTo(ul);
  	};

  	$('form').submit(function() {
    	$('#beerid').val(idbeer);
	});
	
	});

});