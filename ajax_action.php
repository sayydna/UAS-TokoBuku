<?php 
	include "config.php";
	$uid=$_POST["uid"];
	$judul=mysqli_real_escape_string($con,$_POST["judul"]);
	$penerbit=mysqli_real_escape_string($con,$_POST["penerbit"]);
	$penulis=mysqli_real_escape_string($con,$_POST["penulis"]);
	$harga=mysqli_real_escape_string($con,$_POST["harga"]);
	if($uid=="0"){
		$sql="insert into user (judul,penerbit,penulis,harga) values ('{$judul}','{$penerbit}','{$penulis}','{$harga}')";
		if($con->query($sql)){
			$uid=$con->insert_id;
			echo"<tr class='{$uid}'>
				<td>{$judul}</td>
				<td>{$penerbit}</td>
				<td>{$penulis}</td>
				<td>{$harga}</td>
				<td><a href='#' class='btn btn-primary edit' uid='{$uid}'>Edit</a></td>
				<td><a href='#' class='btn btn-danger del' uid='{$uid}'>Delete</a></td>					
			</tr>";
			
		}
	}else{
		$sql="update user set judul='{$judul}',penerbit='{$penerbit}',penulis='{$penulis}' ,harga='{$harga}' where UID='{$uid}'";
		if($con->query($sql)){
			echo"
				<td>{$judul}</td>
				<td>{$penerbit}</td>
				<td>{$penulis}</td>
				<td>{$harga}</td>
				<td><a href='#' class='btn btn-primary edit' uid='{$uid}'>Edit</a></td>
				<td><a href='#' class='btn btn-danger del' uid='{$uid}'>Delete</a></td>					
			";
		}
	}
?>