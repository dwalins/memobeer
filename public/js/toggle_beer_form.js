$( document ).ready(function() {
    
	$(function(){

	var formtoshowid;

	$( ".btn-add-beer" ).click(function() {
		formtoshowid = '#input-'+this.id;
		// console.log(formtoshowid);
		$(formtoshowid).toggle();
	});

		
	});

});