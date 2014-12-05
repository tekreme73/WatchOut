<?php

abstract class Query {
	
	protected $host;
	protected $port;
	protected $dbname;
	
	protected $user;
	protected $passw;
	
	public function __construct ( $host, $port, $dbname, $user, $passw ) {
		$this -> host = $host;
		$this -> port = $port;
		$this -> dbname = $dbname;
		$this -> user = $user;
		$this -> passw = $passw;
	}
	
	public abstract function connectDB();
	
	public abstract function prepare( $bdd, $sql );
	
	public abstract function execute( $request );
	
	public abstract function fetchDatas( $request );
	
	public abstract function close( $request );
	
	public function request ( $sql ) {
		$bdd = $this->connectDB ();
		$request = $this->prepare( $bdd, $sql );
		$this->execute( $request );
		$datas = $this->fetchDatas( $request );
		$this->close( $request );
		return $datas;
	}	
}