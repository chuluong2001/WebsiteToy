<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
	 <!-- Font Icon -->
    <link rel="stylesheet" href="colorlib-regform-8/fonts/material-icon/css/material-design-iconic-font.min.css">

    <!-- Main css -->
    <link rel="stylesheet" href="colorlib-regform-8/css/style.css">
</head>
<body>
    <form method="POST" enctype="multipart/form-data" >
    	<div class="main">

            <section class="signup">
                <!-- <img src="images/signup-bg.jpg" alt=""> -->
                <div class="container">
                    <div class="signup-content">
                        <form method="POST" id="signup-form" class="signup-form">
                            <h2 class="form-title">Add Song</h2>
                            <div class="form-group">
                                <input type="text" class="form-input" name="song_id" id="name" placeholder="Id"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="song_name" id="name" placeholder="Name"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="song_Describe" id="Describe" placeholder="Describe"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="song_price" id="name" placeholder="Price"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="singer_name" id="name" placeholder="Singer Name"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="genre_name" id="name" placeholder="Genre Name"/>
                            </div>
                            <div class="form-group">
                                <input type="text" class="form-input" name="song_lyric" id="name" placeholder="lyric"/>
                            </div>
                            <div class="">
    					      <input type="file" name="song_image" required="" style="color: black;">
    					      <label style="color: black;">Image</label>
    		    			</div>
    		    			<br>
    					    <div class="">
    					      <input type="file" name="song_audio" required="" style="color: black;">
    					      <label style="color: black;"> Audio </label>
    					    </div>
    					    <br>
                            <div class="form-group">
                                <input type="submit" name="add_product" id="submit" class="form-submit" value="Add"/>
                            </div>
                        </form>
                    </div>
                </div>
            </section>

        </div>
    </form>
    <?php
            $connect = mysqli_connect('3.132.234.157','chuluong_user','123@123a','chuluong_db');
            if (isset($_POST['add_product'])) {
            $song_id =$_POST['song_id'];
            $song_name =$_POST['song_name'];
            $song_Describe =$_POST['song_Describe'];
            $song_price =$_POST['song_price'];
            $singer_name =$_POST['singer_name'];
            $genre_name =$_POST['genre_name'];
            $song_lyric =$_POST['song_lyric'];
            //l???y ???nh t??? th?? m???c b???t k??? c???a m??y t??nh
            $song_image =$_FILES['song_image']['name'];
            //di chuy???n ???nh t??? th?? m???c b???t k??? sang th?? m???c tmp_name c???a htdocs
            $song_image_tmp =$_FILES['song_image']['tmp_name'];
            //????a ???nh t??? th?? m???c tmp sang th?? m???c c???n l??u
            move_uploaded_file($song_image_tmp, "image/$song_image");
            //l???y audio t??? th?? m???c b???t k??? c???a m??y t??nh
            $song_audio =$_FILES['song_audio']['name'];
            //di chuy???n audio t??? th?? m???c b???t k??? sang th?? m???c tmp_name c???a htdocs
            $song_audio_tmp =$_FILES['song_audio']['tmp_name'];
            //????a audio t??? th?? m???c tmp sang th?? m???c c???n l??u
            move_uploaded_file($song_audio_tmp, "audio/$song_audio");
            //th??m s???n ph???m v??o c?? s??? d??? li???u
            $sql = "INSERT INTO song VALUES('$song_id','$song_name','$song_Describe','$song_price','$singer_name','$genre_name','$song_lyric','$song_image','$song_audio')";
            $result = mysqli_query($connect, $sql);
            if($result){
                echo "<script>alert('Th??m b??i h??t th??nh c??ng') </script>";
                echo "<script> window.location.href = 'index.php' </script>";
                }
            else{
                echo "<script>alert('Add new error') </script";
            }

            }
        ?>  

    <!-- JS -->
    <script src="vendor/jquery/jquery.min.js"></script>
    <script src="js/main.js"></script>
</body>
</html>