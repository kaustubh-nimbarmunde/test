<!DOCTYPE html>
<html>
<head>
	<title></title>
</head>
<body>
<form enctype="multipart/form-data" id="testform">
	Name <input type="text" name="uname"><br><br>
	Quantity <input type="text" name="quantity"><br><br>
	Price <input type="text" name="price"><br><br>
	Category <select id="cat" name="cat">
		<option>Select Category</option>
	</select><br><br>
	Sub Category <select id="subcat" name="subcat">
		<option>Select Sub-Category</option>
	</select><br><br>
	Images <input type="file" name="images[]" id="images" multiple><br><br>
	<input type="submit" name="submit" value="submit">
</form>
<br><br>
<b><a href="list.php">LIST</a></b>

<div class="g-signin2" data-onsuccess="onSignIn"></div>
</body>
<script src="https://apis.google.com/js/platform.js" async defer></script>
<script type="text/javascript" src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
<script src="imp.js"></script>
<script type="text/javascript">
	$("#cat").change(function(){
		var category = $(this).val();
		getSubcat(category);
	})
	$("#testform").submit(function(e){
		e.preventDefault();
		var formdata = new FormData(this);
		formdata.append("uname", $("input[name='uname']").val());
		formdata.append("quantity", $("input[name='quantity']").val());
		formdata.append("price", $("input[name='price']").val());
		formdata.append("cat", $("select[name='cat']").val());
		formdata.append("subcat", $("select[name='subcat']").val());


		var totalfiles = document.getElementById('images').files.length;
		for(var index = 0; index<totalfiles; index++){
			console.log($('#images')[0]);
			formdata.append("images[]", index);
		}
		submitForm(formdata);
	})
</script>

</html>