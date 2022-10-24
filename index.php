<?php
    session_start();
?>
<!DOCTYPE html>
<html>
<head>
	<title></title>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<link rel="stylesheet" type="text/css" href="style.css">
	<link rel="stylesheet" type="text/css" href="bootstrap/css/bootstrap.min.css">

</head>
<body>
  <?php 
    $connect = mysqli_connect('3.132.234.157','chuluong_user','123@123a','chuluong_db');
    if(!$connect)
    {
      echo "Kết nối thất bại";
    }
    $sql="SELECT * FROM song";
    $result = mysqli_query($connect,$sql);  
    //Tìm và trả về kết quả dưới dạng 1 mảng và lấy từng dòng dữ liệu
  ?>
<!-- menu -->
<nav class="navbar navbar-expand-lg" style="background-color: #D8BFD8;">
  <div class="container">
	  <a class="navbar-brand" href="#">Chu Luong</a>
	  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
	    <span class="navbar-toggler-icon"></span>
	  </button>

      <div class="collapse navbar-collapse" id="navbarSupportedContent">
          <ul class="navbar-nav mr-auto">
              <li class="nav-item active">
                  <a class="nav-link" href="managersong.php"> Manager Song <span class="glyphicon glyphicon-home sr-only">(current)</span></a>
              </li>
              <li class="nav-item">
                  <a class="nav-link" href="add_product.php"> <span class="glyphicon glyphicon-user"></span>Add Song</a>
              </li>
              <li class="nav-item dropdown">
                  <a class="nav-link" href="#" id="navbarDropdown">
                      Dropdown
                  </a>
                  <div class="dropdown-content">
                      <a class="dropdown-item" href="#">Action</a>
                      <a class="dropdown-item" href="#">Another action</a>
                      <div class="dropdown-divider"></div>
                      <a class="dropdown-item" href="#">Something else here</a>
                  </div>
              </li>
          </ul>
          
          <form class="form-inline my-2 my-lg-0" action="search.php" method="GET">            
                <input class="form-control mr-sm-2" type="search" placeholder="Search for song" aria-label="Search" name="Search">
                <button class="btn btn-outline-success my-2 my-sm-0" type="submit" >Search</button>
          </form>
          <div class="login_and_register" style="padding-left: 100px;">
            <?php
          if (!isset($_SESSION['username'])) {
            echo "<div><a href='colorlib-regform-8/login.php' class='btn btn-primary'>Đăng Nhập</a>
                <a href='colorlib-regform-8/register.php' class='btn btn-primary' style='padding-left: 15px'>Đăng Kí</a></div>";
          } else {
            $username = $_SESSION['username'];
            $result = mysqli_fetch_array(mysqli_query($connect, $sql));
            echo "<div class='dropdown show'>
            <a class='btn btn-outline-dark dropdown-toggle' href='#' role='button' id='dropdownMenuLink' data-toggle='dropdown' aria-haspopup='true' aria-expanded='false'>
              <span class=user-name>" . $_SESSION['username'] . "</span>
            </a>

            <div class='dropdown-menu' aria-labelledby='dropdownMenuLink'>
              <a class='dropdown-item' href='user.php'>Account</a>
              <a class='dropdown-item' href='cart.php'>Cart</a>";
            // how do I make this more secure??? it is pretty shit I rely entirely on session for the authentication
            echo "<div class='dropdown-divider'></div>
              <a class='dropdown-item' href='colorlib-regform-8/logout.php'>Logout</a>
            </div>
          </div>";
          }
          ?>
          </div>	
      </div>
  </div>
</nav>
<!-- end menu -->
<!-- slide -->
<div id="carouselExampleIndicators" class="carousel slide mt-1" data-ride="carousel">
  <ol class="carousel-indicators">
    <li data-target="#carouselExampleIndicators" data-slide-to="0" class="active"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="1"></li>
    <li data-target="#carouselExampleIndicators" data-slide-to="2"></li>
  </ol>
  <div class="carousel-inner">
    <div class="carousel-item active">
      <img class="d-block w-100" src="https://i.ytimg.com/vi/SlOuyaSyi7Q/maxresdefault.jpg" alt="First slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.ytimg.com/vi/PwpUc7sefik/maxresdefault.jpg" alt="Second slide">
    </div>
    <div class="carousel-item">
      <img class="d-block w-100" src="https://i.ytimg.com/vi/McEOFs5imps/maxresdefault.jpg" alt="Third slide">
    </div>
  </div>
  <a class="carousel-control-prev" href="#carouselExampleIndicators" role="button" data-slide="prev">
    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
    <span class="sr-only">Previous</span>
  </a>
  <a class="carousel-control-next" href="#carouselExampleIndicators" role="button" data-slide="next">
    <span class="carousel-control-next-icon" aria-hidden="true"></span>
    <span class="sr-only">Next</span>
  </a>
</div>
<!-- end slide -->
<!-- list product -->
<div class="container">
	<div class="row mt-5">
		<h2 class="list-product-title">New product</h2>
		<div class="list-product-subtitle">
			<p>List product description</p>
		</div>
		<div class="product-group">
			<div class="row">
         <?php
            $sql = "SELECT * FROM song";            
            $result = mysqli_query($connect, $sql);
            // Trả về kết quả dạng 1 mảng
            while ($row_song = mysqli_fetch_array($result)){
                $song_id = $row_song['song_id'];
                $song_name = $row_song['song_name'];
                $song_Describe = $row_song['song_Describe'];
                $song_price = $row_song['song_price'];
                $song_audio = $row_song['song_audio'];
                $song_image = $row_song['song_image'];
                ?>
                  <div class="col-md-3 col-sm-6 col-12">
                      <div class="card card-product mb-3">
                        <img class="card-img-top" src="image/<?php echo"$song_image"?>">
                        <div class="card-body">
                          <h5 class="card-title"><?php echo"$song_name"?></h5>
                           <h8 class="card-title"><?php echo"$song_Describe"?></h8> <br>
                           <h8 class="card-title"><?php echo"$song_price"?></h8> <br>
                         <audio controls controlsList="nodownload" ontimeupdate="myAudio(this)" style="width: 220px;">
                             <source src="audio/<?php echo $song_audio?>" type="audio/mpeg">
                         </audio>
                         <script type="text/javascript">
                             function myAudio(event){
                                 if(event.currentTime>10){
                                     event.currentTime=0;
                                     event.pause();
                                     alert("Bạn phải trả phí để nghe cả bài")
                                 }
                             }
                         </script>
                         <?php
                           echo" <a href='detail.php?id=$song_id' class='btn btn-primary' >Details</a> "
                          ?>
                        </div>
                      </div>
                  </div>
                <?php
            }
          ?>      
      </div>
		</div>
	</div>
</div>
<!-- end list product -->

<!-- Load jquery trước khi load bootstrap js -->
<script src="jquery-3.3.1.min.js"></script>
<script src="bootstrap/js/bootstrap.min.js"></script>
</body>

</html>