<?php
// credits to Jarren Long for this class http://long-technical.com
class Database {
	private $db = null;
	private $isOpen = false;
	private $db_host = '';
	private $db_user = '';
	private $db_pass = '';
	private $db_name = '';


	// Grab the connection data on creation
	public function __construct( $host, $user, $pass, $db ) {
		$this->db_host = $host;
		$this->db_user = $user;
		$this->db_pass = $pass;
		$this->db_name = $db;
	}

	//Return connection handle
	public function getHandle() {
		return $this->db;
	}

	public function lastError() {
		return mysqli_error($this->db);
	}
	
	//Open a connection to the specified database
	public function Open() {	
		$this->db = mysqli_connect( $this->db_host, $this->db_user,
		$this->db_pass, $this->db_name );
		
		if ( !$this->db ) {
			die( 'Connect Error (' . mysqli_connect_errno() . ') ' .
			mysqli_connect_error() );
		} else {
			//Explicitly select which DB we're using
			$this->isOpen = mysqli_select_db( $this->db, $this->db_name );
		}
		
		return $this->isOpen;
	}

	//Is the database open?
	public function IsOpen() {
		return $this->isOpen;
	}

	//Close currently open connection
	public function Close() {
		if( $this->isOpen ) {
			mysqli_close( $this->db );
			$this->isOpen = false;
		}
	}


	//Query the opened database, return the results (DANGER WILL ROBINSON!)
	// Using Query to load data into webApp contacts table.
	public function Query( $query ) {
		$result = null;
		
		if( $this->isOpen ) {
			$result = mysqli_query( $this->db, $query );
		} else {
			echo "DB Closed";
		}

		return $result;
	}

	public function getLastIdentity() {
		$result = -1;
		
		if( $this->isOpen ) {
			$result = mysqli_insert_id($this->db);
		}

		return $result;
	}

	public function Escape($data) {
		if( $this->isOpen ) {
			return mysqli_real_escape_string( $this->db, $data );
		}
		return "";
	}
	
	//Safe(r) insert into table
	public function Insert( $table, $cols, $data ) {
		$result = null;
		
		if( $this->isOpen ) {
			//Build the insert statement to specify the table/columns to use
			$str = 'INSERT INTO ' . mysqli_real_escape_string( $this->db, $table );
			if( is_array( $cols ) ) {
				$str .= ' (';
				
				foreach( $cols as $field ) {
					if( isset( $field ) ) {
						$str .= mysqli_real_escape_string( $this->db, $field ) . ', ';
					}
				}
				//Trim off the last ', 0' & close up the statement
				$str = substr( $str, 0, $str.length - 2 );
				$str .= ')';
			}
			
			//Build the values to insert
			if( is_array( $data ) ) {
				$str .= ' VALUES (';
				
				$len = $data.length;
				foreach( $data as $field ) {
					if( isset( $field ) ) {
						$str .= '\'' . mysqli_real_escape_string( $this->db, $field ) . '\', ';
					}
				}
				//Trim off the last ', 0' & close up the statement
				$str = substr( $str, 0, $str.length - 2 );
				$str = $str . ');';
			}
			
			//Debug code, print the SQL statement out
			echo "<h2>" . $str . "</h2>";
			
			if( !mysqli_query( $this->db, $str ) ) {
				echo 'Error Inserting Item: ' . mysqli_error( $this->db );
				return false;
			}
		}
		
		return true;
	}


	//Update an existing entry in a table by id, takes an array of parameters (for now)
	public function Update( $table, $id, $params ) {
		$result = null;
		
		if( $this->isOpen ) {
			//Build the insert statement to specify the table/columns to use
			$str = 'UPDATE ' .
			mysqli_real_escape_string( $this->db, $table ) . ' SET ' .
			$params . ' WHERE id=\'' .
			mysqli_real_escape_string( $this->db, $id ) . '\'';
			
			//Debug code, print the SQL statement out
			//echo "<h2>" . $str . "</h2>";
			
			if( !mysqli_query( $this->db, $str ) ) {
				echo 'Error updating item: ' . mysqli_error( $this->db );
				return false;
			}
		}
		
		return true;
	}


	//Safe(r) delete from table
	public function Delete( $table, $where = '' ) {
		$result = null;
		
		if( $this->isOpen ) {
			$str = 'DELETE FROM ' . mysqli_real_escape_string( $this->db, $table );
			if( $where != '' ) {
				$str = $str . ' WHERE ' . $where;
			}
			
			//Debug code, print the SQL statement out
			echo "<h2>" . $str . "</h2>";
			
			return mysqli_query( $this->db, $str );
		}
		
		return false;
	}

};


?>
