<?php

function getEnvOrDefault($name, $default)
{
    $value = getenv($name);

    if ($value === false || $value === '') {
        return $default;
    }

    return $value;
}

function getDbConnection()
{
    $database = getEnvOrDefault('DB_NAME', 'a09_jenkins');
    $servername = getEnvOrDefault('DB_HOST', '127.0.0.1');
    $username = getEnvOrDefault('DB_USER', 'root');
    $password = getEnvOrDefault('DB_PASSWORD', '');
    $port = (int) getEnvOrDefault('DB_PORT', '3306');

    $connection = new mysqli($servername, $username, $password, $database, $port);

    if ($connection->connect_error) {
        die('Connection failed: ' . $connection->connect_error);
    }

    $connection->set_charset('utf8mb4');

    return $connection;
}
?>