jQuery(document).ready(function($){
	var source = new EventSource(__xchat.rest_uri);
	source.onmessage = function(event) {
		console.log(event);
	    console.log(JSON.parse( event.data) );
	};
});