jQuery(document).ready(function($){
	var source = new EventSource(__xchat.rest_uri);
	source.onmessage = function(event) {
		var messages = JSON.parse( event.data);
		console.log(messages);
		$.each(messages, function( index, message ){
			console.log(message);
		});
	};
});