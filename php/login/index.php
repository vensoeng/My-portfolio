<?php
session_start();
include "../dbcon/index.php";
include '../geturl/index.php';
// ================this is funtion for testinput============== 
function testInput($data)
{
    $data = trim($data);
    $data = stripcslashes($data);
    $data = htmlspecialchars($data);
    return $data;
}
// ====================start check user for login================ 
if (isset($_POST['email'], $_POST['password'])) {

    $email = testInput($_POST['email']);
    $ps = testInput($_POST['password']);

    if (empty($email) || empty($ps)) {
        // header("location: ../");
        echo "emal or password is empty";
        exit;
    } else {
        $ps = md5($ps);

        $sql = "SELECT * FROM users WHERE email = '$email' AND password = '$ps'";

        $result = mysqli_query($conn, $sql);

        if (mysqli_num_rows($result) === 1) {

            $row = mysqli_fetch_assoc($result);

            if ($row['password'] === $ps) {
                if ($row['role'] === '1') {

                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['id'] = $row['id'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];

                    header("location: ".getBaseUrl('admin'));
                } else {
                    $_SESSION['first_name'] = $row['first_name'];
                    $_SESSION['last_name'] = $row['last_name'];
                    $_SESSION['id'] = $row['ID'];
                    $_SESSION['role'] = $row['role'];
                    $_SESSION['email'] = $row['email'];
                    $_SESSION['password'] = $row['password'];

                    header("location: ".getBaseUrl(''));
                }
            } else {
                // header("location: ../");
                echo "password incorrect";
            }

        } else {
            // header("location: ../");
            echo "Can't find user!";
        }
    }
} else {
    header("location: ".getBaseUrl(''));
}
?>