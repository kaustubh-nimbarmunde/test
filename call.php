<?php

require "functions.php";

if(isset($_POST['getcat'])){
	$getcat = $_POST['getcat'];
	getCategories($getcat, $con);
}

if(isset($_POST['getsubcat'])){
	$getsubcat = $_POST['getsubcat'];
	$category = $_POST['cat'];
	getSubcategories($getsubcat, $category, $con);
}

if(isset($_POST['subcategories'])){
	$subcategories = $_POST['subcategories'];
	subcategories($subcategories, $con);
}

if(isset($_POST['ins'])){
	$formdata = $_POST;
	submitForm($formdata, $con);
}

if(isset($_POST['getlist'])){
	$getlist = $_POST['getlist'];
	getList($getlist, $con);
}

if(isset($_POST['showdata'])){
	$id = $_POST['id'];
	$showdata = $_POST['showdata'];
	showData($showdata, $id, $con);
}

if(isset($_POST['showimage'])){
	$id = $_POST['id'];
	$showdata = $_POST['showimage'];
	showImages($showdata, $id, $con);
}

if(isset($_POST['dlt'])){
	$id = $_POST['id'];
	$dltdata = $_POST['dlt'];
	dltData($dltdata, $id, $con);
}

if(isset($_POST['upd'])){
	$id = $_POST['id'];
	$upddata = $_POST;
	updateData($upddata, $id, $con);
}

if(isset($_POST['getdata'])){
	$id = $_POST['id'];
	$upddata = $_POST['getdata'];
	getdata($upddata, $id, $con);
}

?>