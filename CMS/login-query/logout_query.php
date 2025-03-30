<?php 
	session_start();
	$_SESSION['status']='invalid';
	echo "<script>window.location.href='../index';</script>";
?>