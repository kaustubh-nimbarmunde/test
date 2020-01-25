<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<table id="list">
	
</table>
</body>
</html>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script type="text/javascript">
	function dlt(e){
			var id = $(e).closest("tr").attr("id");
			console.log(id);
			var r = confirm("Press a button!");
			if(r == true){
				$.ajax({
				    url: 'call.php',
				    type: 'post',
				    data: {"dlt": 1, "id":id},
				    success: function(response) { 
				       	 $("#"+id).remove();
				    }
				});
			}
		}
	$(document).ready(function(){
		$.ajax({
	        url: 'call.php',
	        type: 'post',
	        data: {"getlist": 1},
	        success: function(response) { 
	        	$("#list").append(response);
	        }
	    });
	})
</script>