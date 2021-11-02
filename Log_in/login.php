<?php
require_once('../Mysql/database.php');
$thongbaodk=$thongbaodn="";
/* $tam=" ";
if($_SERVER['REQUEST_METHOD'] == "GET"){
     $tam=$_GET['q'];
} */
$username = $password = $repassword = $email =  "";
if ($_SERVER['REQUEST_METHOD'] == "POST") {
    if (isset($_POST['namedk']) && isset($_POST['passdk']) && isset($_POST['emaildk'])) {
        $username = $_POST['namedk'];
        $email = $_POST['emaildk'];
        $password = md5($_POST['passdk']);
        $repassword = md5($_POST['repassdk']);
        if ($password == $repassword) {
            $query = "INSERT INTO nguoidung (username,password,email) VALUES('" . $_POST['namedk'] . "','" . $password . "','" . $_POST['emaildk'] . "')";
            execute($query);
           /*  header("Location: login.php"); */
        }
        else{
            $thongbaodk="* xác nhận password không đúng! ";
        }
    }else if(isset($_POST['passdn']) && isset($_POST['emaildn'])){
        $email = $_POST['emaildn'];
        $password = md5($_POST['passdn']);
        $query = "SELECT * From nguoidung WHERE email='". $_POST['emaildn']."' AND password='". $password . "'";
        $list=[];
        $list= executeResult ($query);
        if(count($list)==1){
            header("Location: ../indexx.php"); 
        }else{
            $thongbaodn="* Password không đúng! ";
        }
      
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./login.css">
    <link href="https://fonts.googleapis.com/css?family=Paytone+One" rel="stylesheet">
    <title>Sign up</title>
</head>

<body>
    <div class="background_login">
        <div class="tiltle_background_1">
            <h2>Không có mảnh đất nào là xa lạ</h2>
        </div>
        <div class="tiltle_background_2">
            <h2>Chỉ có kẻ lữ hành là người lạ</h2>
        </div>
        <div class="content_background">
            <p>
                Xơi chiều món nhẹ chả giò cua
                Thưởng thức rau tươi hái tại nhà
                Vấp cá, rau thơm, sà lách trẻ
                Dưa leo, ngò rí, tía tô già
                Quây quần bạn cũ lai rai món
                Hội tụ người thân nhấm nháp bia
                Nóng hổi thơm giòn, thêm mắm ớt
                Vừa ăn, nói chuyện... cũng vui mà.
            </p>
        </div>
    </div>
    <div class="form-structor">
        <form class="signup" action="" method="POST">
            <h2 class="form-title" id="signup"><span>or</span>Sign up</h2>
            <p style="color: red;font-size:14px"><?=$thongbaodk?></p>
            <div class="form-holder">
                <input type="text" class="input" name="namedk" placeholder="Name" value="<?= $username?>" required required>
                <input type="email" class="input" name="emaildk" placeholder="Email" value="<?=  $email?>"  required>
                <input type="password" class="input" name="passdk" placeholder="Password" required>
                <input type="password" class="input" name="repassdk" placeholder="Reconfirm password" required>
            </div>
            <button type="submit" class="submit-btn">Sign up</button>
        </form>
        <form class="login slide-up" action="" method="POST">
            <div class="center">
                <h2 class="form-title" id="login"><span>or</span>Log in</h2>
                 <p style="color: red;font-size:14px"><?=$thongbaodn?></p>
                <div class="form-holder">
                    <input type="email" class="input" name="emaildn" placeholder="Email" required>
                    <input type="password" class="input" name="passdn" placeholder="Password" required>
                </div>
                <button type="submit" class="submit-btn">Log in</button>
            </div>
        </form>
    </div>
    <script>
        var tam=<?=$tam?>;
        console.log(tam)
        if(tam=="login"){
            loginBtn.click;
        }
    </script>
    <script src="./login.js"></script>
</body>

</html>




