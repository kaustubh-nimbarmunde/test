<?php 

require "dbcon.php";

function getCategories($get, $con){

	if (isset($get)){
		$res = mysqli_query($con, "select distinct(cat_name), cat_value from category");
		while($row=mysqli_fetch_assoc($res)){
			echo "<option value='".$row['cat_name']."'>".$row['cat_value']."</option>";
		}
	}
}

function subcategories($get, $con){

	if (isset($get)){
		$res = mysqli_query($con, "select sub_cat_name, sub_cat_value from category");
		while($row=mysqli_fetch_assoc($res)){
			echo "<option value='".$row['sub_cat_name']."'>".$row['sub_cat_value']."</option>";
		}
	}
}

function getSubcategories($get, $category, $con){

	if (isset($get)){
		$res = mysqli_query($con, "select sub_cat_name, sub_cat_value from category where cat_name='".$category."'");
		while($row=mysqli_fetch_assoc($res)){
			echo "<option value='".$row['sub_cat_name']."'>".$row['sub_cat_value']."</option>";
		}
	}
}

function submitForm($formdata, $con){

	if (isset($formdata)){
		$imagecount = count($_FILES['images']['name']);
		$uploaddir = "uploads/";
		$filearray = array();
		for($i=0;$i<$imagecount;$i++){
			$filename = $_FILES['images']['name'][$i];
			$path = $uploaddir.$filename;
			if(move_uploaded_file($_FILES['images']['tmp_name'][$i], $path)){
				array_push($filearray, $path);
			}
		}
		$name = $_POST['uname'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$category = $_POST['cat'];
		$sub_category = $_POST['subcat'];
		$qry = "insert into formdata(uname, quantity, price, category, sub_category) values('$name', $quantity, $price, '$category', '$sub_category')";
		$res = mysqli_query($con, $qry) or die(mysqli_error($con). " - Qry:".$qry);
		$last_id = mysqli_insert_id($con);
		if($res){
			foreach ($filearray as $key => $value) {
				$image_qry = "insert into images(d_id, path) values($last_id, '$value')";
				$image_res = mysqli_query($con, $image_qry) or die(mysqli_error($con). " - Qry:".$image_qry);
				if($image_res){
					echo $image_res;
				}
			}
		}
	}
}

function getList($get, $con){

	if (isset($get)){
		$res = mysqli_query($con, "select d_id, uname from formdata");
		while($row=mysqli_fetch_assoc($res)){
			echo "<tr id='".$row['d_id']."'>
			<td><b><a href='showlist.php?id=".$row['d_id']."'>".$row['uname']."</a></b></td>
			<td><button class='remove' onclick='dlt(this)'>Delete</button></td>
			<td><b><a href='update.php?id=".$row['d_id']."'>Update</a></b></td>
			</tr>";
		}
	}
}

function showData($get, $id, $con){

	if (isset($get)){
		$res = mysqli_query($con, "select * from formdata where d_id=".$id);
		while($row=mysqli_fetch_assoc($res)){
			echo "<tr><td></td><td>".$row['uname']."</td><td>".$row['quantity'].
			"</td><td>".$row['price']."</td><td>".$row['category']."</td><td>".$row['sub_category']."</td><tr>";
		}
	}
}

function getData($get, $id, $con){

	if (isset($get)){
		$res = mysqli_query($con, "select * from formdata where d_id=".$id);
		$dt = array();
		while($row=mysqli_fetch_assoc($res)){
			$dt[] = $row;
		}
		print_r(json_encode($dt));
	}
}
function showImages($get, $id, $con){

	if (isset($get)){
		$res = mysqli_query($con, "select * from images where d_id=".$id);
		$img = array();
		while($row=mysqli_fetch_assoc($res)){
			$img[$row['image_id']] = $row['path'];
		}
		print_r(json_encode($img));
	}
}

function dltData($get, $id, $con){

	if (isset($get)){
		$res = mysqli_query($con, "delete from formdata where d_id=".$id);
		if($res){
			$image_qry = "delete from images where d_id=".$id;
			$image_res = mysqli_query($con, $image_qry) or die(mysqli_error($con). " - Qry:".$image_qry);
			if($image_res){
				echo $image_res;
			}
		}
	}
}

function updateData($get, $id, $con){

	if (isset($get)){
		// print_r($_POST);
		$name = $_POST['uname'];
		$quantity = $_POST['quantity'];
		$price = $_POST['price'];
		$category = $_POST['cat'];
		$sub_category = $_POST['subcat'];
		$qry = "update formdata set uname='$name', quantity=$quantity, price=$price, category='$category', sub_category='$sub_category' where d_id=".$id;
		$res = mysqli_query($con, $qry) or die(mysqli_error($con). " - Qry:".$qry);
		if($res){
			echo $res;
		}
	}
}


?>