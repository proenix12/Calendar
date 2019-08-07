<?php
	include 'config.php';
	
	echo $_POST[ 'getHour' ];
	echo $_POST[ 'getDate' ];
	
	$exDate = explode( '-', $_POST[ 'getDate' ] );
	
	//need to create new table for every mount
	$query = "INSERT INTO `aug2018` (day,time, dayNumber, Event) VALUES (:getDate, :getHour, :dayNumber, :Event)";
	$stmt = $conn->prepare( $query );
	$stmt->bindValue( ':getDate', $_POST[ 'getDate' ] );
	$stmt->bindValue( ':getHour', $_POST[ 'getHour' ] );
	$stmt->bindValue( ':dayNumber', $exDate[ 0 ] );
	$stmt->bindValue( ':Event', $_POST[ 'getTitle' ] );
	$stmt->execute();
	
	
	die();