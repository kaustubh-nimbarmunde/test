function getCat(){
	$.ajax({
        url: 'call.php',
        type: 'post',
        data: {"getcat": 1},
        success: function(response) { 
        	// console.log(response); 
        	$("#cat").html("<option>Select Category</option>");
        	$("#cat").append(response);
        }
    });
}

function getSubcat(cat){
	$.ajax({
        url: 'call.php',
        type: 'post',
        data: {"getsubcat": 1, "cat":cat},
        success: function(response) { 
        	// console.log(response); 
        	$("#subcat").html("<option>Select Sub Category</option>");
        	$("#subcat").append(response);
        }
    });
}

function subcategories(){
    $.ajax({
        url: 'call.php',
        type: 'post',
        data: {"subcategories": 1},
        success: function(response) { 
            // console.log(response); 
            $("#subcat").html("<option>Select Sub Category</option>");
            $("#subcat").append(response);
        }
    });
}

function submitForm(formdata){
	$.ajax({
        url: 'call.php',
        type: 'post',
        data: formdata,
        processData: false,
    	contentType: false,
        success: function(response) { 
        	alert("Form submitted!");
        $("form input[type='text'], select").val("")
        }
    });
}

function updateForm(formdata){
    $.ajax({
        url: 'call.php',
        type: 'post',
        data: formdata,
        processData: false,
        contentType: false,
        success: function(response) { 
            alert("Form submitted!");
        $("form input[type='text'], select").val("");
        window.location = "./list.php"
        // console.log(response);
        }
    });
}

function validation(){
    if($("input[type='text'], input[type='file']").val()==""){
        alert("No field should be empty. Please fill required data");
        // e.preventDefasult();
    }
}

$(window).on('load', function(){
	getCat();
});