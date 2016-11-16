<?php

	class DBHandler {
		
		var $config;
    	var $conn;

    	function __construct(){
    		$this->config = include('./inc/config.php');
    	}

    	// Need to define these functions above any other function that may use them
    	function openConnection(){
			$this->conn = new mysqli($this->config['addr'], $this->config['user'], $this->config['pass'], $this->config['db']);
		    if($this->conn->connect_errno){
		        echo "Error: Failed to make a MySQL connection, here is why: \n";
		        echo "Errno: " . $mysqli->connect_errno . "\n";
		        echo "Error: " . $mysqli->connect_error . "\n";
		        exit;
			}
		}

		function closeConnection(){
			$this->conn->close();
		}

    	// pass a string formatted as a query to this method
    	// This will return the result of the query
    	function runQuery($query){
			$this->openConnection();

			$result = $this->conn->query($query);
	        if(!$result) {
	            echo "Error: Our query failed to execute and here is why: <br>";
	            echo "Query: " . $query . "<br>";
	            echo "Errno: " . $this->conn->errno . "<br>";
	            echo "Error: " . $this->conn->error . "<br>";
	            $this->closeConnection();
	            exit;
	        }

	        $this->closeConnection();

	        return ($result);
		}
	}
?>