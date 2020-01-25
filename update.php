<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form enctype="multipart/form-data" id="updform">
	Name <input type="text" name="uname" id="uname" required="required"><br><br>
	Quantity <input type="text" name="quantity" id="quantity" required="required"><br><br>
	Price <input type="text" name="price" id="price" required="required"><br><br>
	Category <select id="cat" name="cat" required="required">
		<option value="">Select Category</option>
	</select><br><br>
	Sub Category <select id="subcat" name="subcat" required="required">
		<option value="">Select Sub-Category</option>
	</select><br><br>
	<!-- Images <input type="file" name="images[]" id="images" multiple><br><br> -->
	<input type="submit" name="update" value="update">
</form>
<br><br>
<a href="list.php">BACK</a>
</body>

<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script src="imp.js"></script>
<script type="text/javascript">
	$(window).on('load', function(){
		subcategories();
		$.urlParam = function(name){
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var id = $.urlParam('id');
	// console.log(id);
		$.ajax({
	        url: 'call.php',
	        type: 'post',
	        data: {"getdata": 1, "id":id},
	        success: function(response) { 
	        	console.log(response);
	        	var data = JSON.parse(response);
	        	$("#uname").val(data[0].uname);
	        	$("#price").val(data[0].price);
	        	$("#quantity").val(data[0].quantity);
	        	$("#cat").val(data[0].category).prop("selected", true);
	        	
	        	$("#subcat").val(data[0].sub_category).prop("selected", true);
		        var category = $("#cat").val();
		    	
	        }
	    });
	})
</script>
<script type="text/javascript">
	$.urlParam = function(name){
			var results = new RegExp('[\?&]' + name + '=([^&#]*)').exec(window.location.href);
			return results[1] || 0;
		}
		var id = $.urlParam('id');
	$("#cat").change(function(){
		var category = $(this).val();
		getSubcat(category);
	})
	$("#updform").submit(function(e){
		e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("uname", $("input[name='uname']").val());
		formdata.append("quantity", $("input[name='quantity']").val());
		formdata.append("price", $("input[name='price']").val());
		formdata.append("cat", $("select[name='cat']").val());
		formdata.append("subcat", $("select[name='subcat']").val());
		formdata.append("id", id);
		formdata.append("upd", 1);

		// var totalfiles = document.getElementById('images').files.length;
		// for(var index = 0; index<totalfiles; index++){
		// 	console.log($('#images')[0]);
		// 	formdata.append("images[]", index);
		// }
		updateForm(formdata);
	})
</script>

</html>