<?php
	require('Database.class.php');

	define( "DB_HOST", "localhost" );
	define( "DB_NAME", "devfoudo_webapp" );
	define( "DB_USER", "devfoudo_jaime" );
	define( "DB_PASS", "" );

class Management {
	public $id; // = '';
	public $name; // = '';
	public $email; // = '';
	public $gender; // = '';
	public $position; // = '';
	public $notes; // = '';
	public $mDb; // Database object
	public $title;
	public $year;
	public $studio;
	public $price;

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

	public function addMovie( $title, $year, $studio, $price) {
		// Set created_at/updated_at to right now
		$date = (string)date('Y-m-d h:i:s', time());

		return $this->mDb->Insert( "movies",
			array('title', 'year', 'studio', 'price', 'created_at', 'updated_at'),
			array($title, $year, $studio, $price, $date, $date) );
	}

	public function editMovie( $id, $title, $year, $studio, $price) {
		// Set created_at/updated_at to right now
		$date = (string)date('Y-m-d h:i:s', time());

		return $this->mDb->Query(
			"UPDATE " . DB_NAME . ".movies" . 
			" SET " . " id='" . $id . 
			 "', " . "	title='" . $title . 
			 "', " . " year='" . $year . 
			 "', " . " studio ='". $studio . 
			 "', " . " price='" . $price .
			 "', " . " created_at='" . $date .
			 "', " . " updated_at='" . $date .
			"' WHERE " . " id ='". $id . "'"
		);
	}
	public function deleteMovie($id) {
		return $this->mDb->Delete("movies", "id=" . $id);
	}
	public function showMovie( $title, $year, $studio, $price) {
		// Set created_at/updated_at to right now
		$date = (string)date('Y-m-d h:i:s', time());

		return $this->mDb->Query(
			"INSERT INTO " . DB_NAME . " . movies ( title, year, studio, price, created_at, updated_at) " . 
			"VALUES ('" .$title . "', '" .$year . "', '" .$studio . "', '" .$price . "', '" .
			$date . "', '" .
			$date . "');"
		);
	}
}
$management = new Management();	
