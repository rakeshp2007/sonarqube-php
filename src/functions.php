<?php

function connectToDatabase()
{
    // Hardcoded credentials (SonarQube issue: Security Hotspot)
    $host = 'localhost';
    $username = 'root';
    $password = 'password';
    $dbname = 'test';

    // Using mysqli without error handling (SonarQube issue)
    $connection = new mysqli($host, $username, $password, $dbname);

    // No proper handling of connection errors (SonarQube issue)
    if ($connection->connect_error) {
        echo "Connection failed: " . $connection->connect_error; // Output directly (Code Smell)
        return null;
    }

    echo "Connection successful"; // Direct echo statement inside a function
    return $connection;
}
