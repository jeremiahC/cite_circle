$(document).ready(function(){
	$('.column').hide().transition({
			animation : 'drop',
			duration  : 300,
    		interval  : 200
		});
	$( "#sortable1, #sortable2" ).sortable({
              connectWith: ".connectedSortable"
            }).disableSelection();
});