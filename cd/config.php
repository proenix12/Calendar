<?php
	$servername = "localhost";
	$username = "root";
	$password = "486asd486";
	$database = "Calendar";
	
	$timeNow = date( 'h:i' );
	$colDate = date( 'd/M/Y' );
	$explodeCd = explode( '/', $colDate );
	$day = date( "j" );
	
	$month = date( 'm' );//strtotime('next month')
	$year = date( 'Y' );
	
	$date = date( "d, m, Y" );
	$explode = explode( ',', $date );
	$days = cal_days_in_month( CAL_GREGORIAN, $explode[ 1 ], $explode[ 2 ] );
	
	$firstDay = date( '1-m-Y' );
	
	try {
		$conn = new PDO( "mysql:host=$servername;dbname=$database", $username, $password );
		$conn->setAttribute( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		
	} catch ( PDOExtension $e ) {
		echo "Connection failed" . $e->getMessage();
	}
	
	function halfHourTimes()
	{
		
		$formatter = function ( $time ) {
			
			if ( $time % 1800 == 0 ) {
				return date( 'h:i', $time );
			}
		};
		$halfHourSteps = range( 0, 20 * 1800, 1800 );
		return array_map( $formatter, $halfHourSteps );
	}
	
	$hours = halfHourTimes();
	
	
	function halfHourTimes1()
	{
		$formatter = function ( $time ) {
			if ( $time % 3600 == 0 ) {
				return date( 'h:i', $time );
			} else {
				return date( 'h:i', $time );
			}
		};
		$halfHourSteps = range( 0, 20 * 1800, 1800 );
		return array_map( $formatter, $halfHourSteps );
	}
