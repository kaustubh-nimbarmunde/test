<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table id="list">
	
</table>
<div id="images">
	
</div>
</body>
</html>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript">
	$(window).on('load', function(){
	$.urlParam = function(name){
		var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
		return results[1] || 0;
	}
	var id = $.urlParam('id');
	// console.log(id);
		$.ajax({
	        url: 'call.php',
	        type: 'post',
	        data: {"showdata": 1, "id":id},
	        success: function(response) { 
	        	console.log(response);
	        	$("#list").append(response);
	        }
	    });
	    $.ajax({
	        url: 'call.php',
	        type: 'post',
	        data: {"showimage": 1, "id":id},
	        success: function(response) { 
	        	console.log(response);
	        	$.each(JSON.parse(response), function(key, value){
	        		$("#images").append("<img src='"+value+"' height=200 width=300>&nbsp;&nbsp;&nbsp;");
	        	});
	        }
	    });
	})
</script>