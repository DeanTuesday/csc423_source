<?php

	class DBHandler {
		
		$config = include('./inc/config.php');
    	$conn;
    	$result;

    	// pass a string formatted as a query to this method
    	// This will return the result of the query
    	function runQuery($query){
			openConnection();

			$result = $conn->query($query);
	        if(!$result) {
	            echo "Error: Our query failed to execute and here is why: \n";
	            echo "Query: " . $query . "\n";
	            echo "Errno: " . $mysqli->errno . "\n";
	            echo "Error: " . $mysqli->error . "\n";
	            closeConnection();
	            exit;
	        }

	        closeConnection();

	        return ($result);
		}

		function openConnection(){
			$conn = new mysqli($config['addr'], $config['user'], $config['pass'], $config['db']);
		    if($conn->connect_errno){
		        echo "Error: Failed to make a MySQL connection, here is why: \n";
		        echo "Errno: " . $mysqli->connect_errno . "\n";
		        echo "Error: " . $mysqli->connect_error . "\n";
		        exit;
			}
		}

		function closeConnection(){
			$conn->close();
		}
	}
?>