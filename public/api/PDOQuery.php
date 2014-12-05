<?php

include_once './base/Query.php';

class PDOQuery extends Query {
	
	const F_ASSOC = 'assoc';
	const F_BOTH = 'both';
	const F_CLASS = 'class';
	const F_NUM = 'num';
	const F_OBJ = 'obj';
	
	private $type;
	
	public function __construct ( $type = 'mysql', $host = '', $dbname = '', $user = '', $passw = '', $port = -1 ) {
		parent::__construct ( $host, $port, $dbname, $user, $passw );
		$this -> setType( $type );
	}
	
	public function getType() {
		return $this->type;
	}
	
	public function setType( $type ) {
		$this->type = $type;
	}
	
	public function connectDB() {
		$str = $this->getConnectionString();
		try {
			$bdd = new PDO ( $str, $this->user, $this->passw );
			$bdd->exec ( 'SET CHARACTER SET utf8' );
			return $bdd;
		} catch ( Exception $e ) {
			die ( 'Error in ' . __FILE__ . '#' . __METHOD__ . ' :<br />' . $str . '<br />' . $e->getMessage () );
		}
	}
	
	public function prepare( $bdd, $sql ) {
		return $bdd->prepare( $sql );
	}
	
	public function execute( $request ) {
		try {
			$request->execute ();
		} catch ( Exception $e ) {
			die ( 'SQL error : ' . $e->getMessage () );
		}
	}
	
	public function fetchDatas( $request, $method = PDO::FETCH_ASSOC ) {
		$datas = array ();
		$all = $request->fetchAll( $method );
		foreach ( $all as $row ) {
			$datas [] = $row;
		}
		return $datas;
	}
	
	public function close( $request ) {
		$request->closeCursor ();
	}
	
	public function getConnectionString() {
		$str = '';
		switch( $this->type ) {
			case 'mysql' : //mysql <==> pgsql
			case 'pgsql' :
				$str = $this->type . ':host=' . $this->host . ( $this->port > -1 ? ';port=' . $this->port : '' ) . ';dbname=' . $this->dbname;
				break;
			case 'sqlsrv' :
				$str =  $this->type . ':Server=' . $this->host . ( $this->port > -1 ? ',' . $this->port : '' ) . ';Database=' . $this->dbname;
				break;
			default :
				$str = 'Undefined type of connection : ' . $this->type;
		}
		return $str;
	}	
}