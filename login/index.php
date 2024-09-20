<!-- this is include get crrent url for use  -->
<?php
    include '../php/geturl/index.php';
    session_start();
    if (isset($_SESSION['email']) && isset($_SESSION['password'])) {
        if ($_SESSION['role'] !== 1) {
            return header('location:'.getBaseUrl('admin/'));
        }
    } 
?>
<!-- ---------------------------------------------  -->
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VenSoeng - Login</title>
    <!-- this is favicon  -->
    <link rel="shortcut icon" href="../images/favicon.png?v=<?= time() ?>" type="image/x-icon">
    <!-- this is main css  -->
    <link rel="stylesheet" href="../css/main.css?v=<?= time() ?>">
    <link rel="stylesheet" href="../css/header.css?v=<?= time()?>">
    <link rel="stylesheet" href="../css/login.css?v=<?time()?>">
    <!-- this is for icon  -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.6.0/css/all.min.css" integrity="sha512-Kc323vGBEqzTmouAECnVceyQqyqdsSiqLQISBL29aUW4U/M7pSPA/gEUZQqv1cwx4OnYxTxve5UMg5GT6L4JJg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <!-- this is style of swiper  -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@11/swiper-bundle.min.css" />
</head>
<body class="scroll-y">
    <!-- this Is content of page  -->
    <main class="web-main over-h">
        <form action="<?= getBaseUrl('php/login/') ?>" method="POST" class="form-head form-head-active df-c">
            <div class="form-body db-c scroll-y">
                <div class="head">
                    <ul class="df-c">
                        <li>
                            <h2>Login</h2>
                        </li>
                    </ul>
                </div>
                <div class="form-con">
                    <ul>
                        <li>
                            <label for="#">Username</label>
                            <div class="txt-box df-l">
                                <div class="icon icon-sm">
                                    <i class="fa-regular fa-user"></i>
                                </div>
                                <div class="text-in">
                                    <input type="text" name="email" class="db-c" placeholder="Enter Email or Username">
                                </div>
                            </div>
                        </li>
                        <li>
                            <label for="#">Password</label>
                            <div class="txt-box df-l">
                                <div class="icon icon-sm">
                                    <i class="fa-solid fa-key"></i>
                                </div>
                                <div class="text-in">
                                    <input type="password" name="password" class="db-c" placeholder="Enter your password">
                                </div>
                            </div>
                        </li>
                        <li class="main-btn">
                            <button type="submit" class="iocn icon-sm btn">Submit</button>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="bg"></div>
        </form>
    </main>
</body>
</html>