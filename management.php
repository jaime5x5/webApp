<?php
	define( "DB_HOST", "localhost" );
	define( "DB_NAME", "devfoudo_webapp" );
	define( "DB_USER", "devfoudo_jaime" );
	define( "DB_PASS", "" );

	require('Database.class.php');

class Management {
	public $id;
	public $name; // = '';
	public $email; // = '';
	public $gender; // = '';
	public $position; // = '';
	public $notes; // = '';
	public $mDb; // Database object

	public function __construct() {
		session_start();
		$this->mDb = new Database(DB_HOST, DB_USER, DB_PASS, DB_NAME);
		$this->mDb->Open();
	}

	public function SaveNewContact( $name, $email, $gender, $position, $notes) {
		// Set created_at/updated_at to right now
		$date = (string)date('Y-m-d h:i:s', time());

		return $this->mDb->Query(
			"INSERT INTO " . DB_NAME . " . contacts ( name, email, gender, position, notes, created_at, updated_at) " . 
			"VALUES ('" .$name . "', '" .$email . "', '" .$gender . "', '" .$position . "', '" .$notes . "', '" .
			$date . "', '" .
			$date . "');"
		);
	}


}
$management = new Management();	