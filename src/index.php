<?php

require_once 'functions.php';

// Global variable usage (SonarQube issue)
global $dbConnection;

// Call the function from functions.php
$dbConnection = connectToDatabase();

// Using the connection without verifying if it's null (SonarQube issue)
if ($dbConnection) 
{
    $query = "SELECT * FROM users"; // Unsafe query (SonarQube issue: SQL Injection Risk)
    $result = $dbConnection->query($query);
    while ($row = $result->fetch_assoc()) {
        echo "User: " . $row['username']; // Direct echo statement (Code Smell)
    }
} else {
    echo "Database connection is not established.";
}
