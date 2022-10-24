<?php
  session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	<!-- Font Icon -->
    <link rel="stylesheet" href="fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <?php
        $connect = mysqli_connect('3.132.234.157','chuluong_user','123@123a','chuluong_db');
        if ($connect) 
        {
            echo " "; 
        }
        else
        {
            echo "kết nối thất bại";
        }
    ?>
	<div class="main">

        <section class="signup">
            <!-- <img src="images/signup-bg.jpg" alt=""> -->
            <div class="container">
                <div class="signup-content">
                    <form method="POST" id="signup-form" class="signup-form">
                        <h2 class="form-title">Login</h2>
                        <div class="form-group">
                            <input type="text" class="form-input" name="username" id="name" placeholder="Your Name"/>
                        </div>
                        <div class="form-group">
                            <input type="text" class="form-input" name="password" id="password" placeholder="Password"/>
                            <span toggle="#password" class="zmdi zmdi-eye field-icon toggle-password"></span>
                        </div>
                        <div class="form-group">
                            <input type="submit" name="login" id="submit" class="form-submit" value="login"/>
                        </div>
                    </form>
                </div>
            </div>
        </section>

    </div>
    <?php
        if(isset($_POST['login']) && isset($_POST['username']) && isset($_POST['password']))
        {

            $username = $_POST['username']; //abc
            $password =$_POST['password']; //123
            //Lựa từ bảng user cột username = username nhập từ form và cột password = giá trị password nhập từ form

            $sql = "SELECT * FROM user WHERE username = '$username' AND password = '$password'";

            // Thực thi truy vấn từ csdl dùng hàm mysqli_query

            $result = mysqli_query($connect,$sql);
            $num_rows = mysqli_num_rows($result);
            if($num_rows==0)
            {
                ?>
                    <script>
                        alert("Username or password is incorrect");
                    </script>
                <?php
            }
            else
            {
                $user = mysqli_fetch_array($result);
                $user_id = $user['user_id'];
                $_SESSION['username'] = $username;
                $_SESSION['user_id'] = $user_id;
                ?>
                    <script>
                        alert("Login success");
                        window.location.href = "../index.php";
                    </script>  
                <?php
            }
        }
    ?>
    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>