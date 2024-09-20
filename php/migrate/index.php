<?php
include 'php/dbcon/index.php';
function checkTable($tablename)
{
    global $conn;
    $sql = "SELECT TABLE_NAME FROM INFORMATION_SCHEMA.TABLES WHERE TABLE_NAME = '$tablename' AND TABLE_SCHEMA = DATABASE()";
    $result = mysqli_query($conn, $sql);
    if ($result === false) {
        die("Error executing query: " . mysqli_error($conn));
    }
    return mysqli_num_rows($result) > 0;
}


if (!checkTable('users')) {
    $createTableSql = "
    CREATE TABLE users (
        id INT PRIMARY KEY AUTO_INCREMENT,
        first_name VARCHAR(50) NOT NULL,
        last_name VARCHAR(50) NOT NULL,
        role TINYINT NOT NULL,
        profile VARCHAR(255) NULL,
        email VARCHAR(200) NOT NULL,
        password VARCHAR(250) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL ON UPDATE CURRENT_TIMESTAMP
    )";

    $createStmt = mysqli_query($conn, $createTableSql);
    if ($createStmt === false) {
        die("Create user table failed: " . mysqli_error($conn));
    } else {
        echo "Table 'users' created successfully.<br>";
    }
} else {
    echo "Table 'users' already exists.<br>";
}


if (checkTable('users')) {
    $first_name = 'My';
    $last_name = 'Research';
    $role = 1;
    $profile = 'favicon.png';
    $email = 'admin@gmail.com';
    $password = md5('@soeng#123$123#');

    $checkQuery = "SELECT 1 FROM users LIMIT 1";
    $checkStmt = mysqli_query($conn, $checkQuery);

    if ($checkStmt === false) {
        die("Error checking users table: " . mysqli_error($conn));
    }

    if (mysqli_num_rows($checkStmt) == 0) {
        $insertQuery = "
        INSERT INTO users (first_name, last_name, role, profile, email, password, created_at, updated_at)
        VALUES ('$first_name', '$last_name', '$role', '$profile', '$email', '$password', CURRENT_TIMESTAMP, CURRENT_TIMESTAMP)";

        $insertStmt = mysqli_query($conn, $insertQuery);
        if ($insertStmt === false) {
            die("Insert user failed error: " . mysqli_error($conn));
        }
    }
}

if (!checkTable('posts')) {
    $createTableSql = "
    CREATE TABLE posts (
        id INT PRIMARY KEY AUTO_INCREMENT,
        status tinyint NOT NULL DEFAULT '1',
        title VARCHAR(200) NOT NULL,
        main_title VARCHAR(100) NULL,
        hastag VARCHAR(200) NULL,
        img VARCHAR(255) NOT NULL,
        file VARCHAR(255) NOT NULL,
        created_at DATETIME DEFAULT CURRENT_TIMESTAMP,
        updated_at DATETIME NULL ON UPDATE CURRENT_TIMESTAMP
    )";

    $createStmt = mysqli_query($conn, $createTableSql);
    if ($createStmt === false) {
        die("Create posts table failed error: " . mysqli_error($conn));
    }
}
