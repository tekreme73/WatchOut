<?php

include_once './PDOQuery.php';

// LocalHost
if ( $_SERVER [ 'SERVER_NAME' ] == 'localhost' || $_SERVER [ 'REMOTE_ADDR' ] == '127.0.0.1' || $_SERVER [ 'REMOTE_ADDR' ] == '::1' ) {
	$config = include '../../app/config/localhost.php';
} else {
	$config = include '../../app/config/database.php';
}

$datas = array();

if( isset( $_GET[ 'request' ] ) ) {
	
	$sql = $_GET[ 'request' ];
	
	try {
	
		$query = new PDOQuery( $config['base'],  $config['host'],  $config['dbname'],  $config['user'],  $config['password'],  $config['port'] );
		
		$datas = $query->request( $sql );
	
	} catch( Exception $e ) {
		die ( 'Error in ' . __FILE__ . '#' . __METHOD__ . ' :<br />' . $e->getMessage () );
	}
}

echo json_encode( $datas );