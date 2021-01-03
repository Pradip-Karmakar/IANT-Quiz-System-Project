<?php

	require 'db.php';
	
	$sql = "select count(id) as tnum from round1q";
	$res = mysqli_query($con,$sql);
	$row = mysqli_fetch_array($res);
	
	
	echo "<h1> For Round 2 : ".$row['tnum']."</h1>";
	$sql2 = "select count(id) as tnum from round2q";
	$res2 = mysqli_query($con,$sql2);
	$row2 = mysqli_fetch_array($res2);
	
	
	echo "<h1> For Round 3 : ".$row2['tnum']."</h1>";

?>