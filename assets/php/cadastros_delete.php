<?php
session_start();

include("../../connection.php");
error_reporting(0);

if (isset($_GET['id'])) {
    $id = $_GET['id'];

	$sql = "DELETE FROM cadastrar WHERE id='$id'";
	$result = mysqli_query($conn, $sql);

	if(!$result){
        die("Query Failed: " . mysqli_error($conn));
    }else{
	    header("Location: cadastros.php?error=Você excluiu o registro.");
	    exit();
    }
}
?>