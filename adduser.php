<?php
include_once 'dbConfig.php';
global $connection; ?>
<html>
    <head>
        <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
        <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
        <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
        <title>افزودن دانشجو جدید</title>
    </head>
<body>
<div class="container border p-4 mt-4">
    <?php
        try {
            if(isset($_POST['adduserbut'])){
                $phone = $_POST['adduser'];
                $checkQuery = $connection->prepare('SELECT * FROM certificate WHERE phone = :phone');
                $checkQuery->bindParam(':phone', $phone);
                $checkQuery->execute();
                $count = $checkQuery->rowCount();
                if ($count == 0) {
                    'CREATE TABLE certificate (
                        id INT AUTO_INCREMENT PRIMARY KEY,
                        phone VARCHAR(15) UNIQUE
                    ); ';
                } else {
                    // اطلاعات مورد نظر قبلاً وجود دارد، بنابراین عملیات اضافه کردن رکورد متوقف می‌شود
                }
                $already_exists = false;
                $insertData = $connection->prepare('INSERT INTO certificate (phone) values (:phone)');
                $insertData->bindParam(':phone' , $phone);
                if ($insertData->execute()) {
                    echo '<span class="alert alert-success" style="font-size: 14px;float: right;width: 100%;text-align: center;">شماره دانشجو با موفقیت اضافه شد</span>';
                }
                }
        } catch (PDOException $e) {
            if ($e->errorInfo[1] == 1062) {
                $already_exists = true;
                echo '<span class="alert alert-warning" style="font-size: 14px;float: right;width: 100%;text-align: center;">شماره وارد شده قبلا ثبت شده است!</span>';
            }else{
                echo '<span class="alert alert-danger" style="font-size: 14px;float: right;width: 100%;text-align: center;">مشکلی پیش اومده، دوباره تلاش کن!</span>';
            }
        }
    ?>
    <div class="adduser" style="direction: rtl;text-align: right;">
        <a href="" style="width: 100%;float: right;"><img src="" style="float:right; width: 30%;margin: 25px 35% 50px 35%;"></a><br>
        <h3 style="margin: 20px 0;">افزودن شماره تماس دانشجو به لیست دانشجویان واجد شرایط دریافت مدرک </h3>
        <form  action="http://localhost:8000/adduser.php" method="post" style="max-width:50%;text-align: right;" class="getgormhn">
            <div class="form-group">
                <label style="font-size: 14px;">شماره دانشجوی مورد نظر را وارد کنید</label>
                <input type="text" name="adduser" class="form-control" style="font-size: 14px;">
            </div>
        <button type="submit" name="adduserbut" class="btn btn-primary" style="font-size: 14px;">افزودن دانشجو</button>
        </form>
    </div>
</div>
</body>
    <script>
        function loadpage(){
            if(!localStorage["alertdisplayed"]) {
                alert("Your text")
                localStorage["alertdisplayed"] = true
            }
            var password = prompt("کلمه عبور!");

            if (password.valueOf() == "123456"){
                window,alert("! با موفقیت وارد شدی")
            }else {
                while(password.value !="123456") {
                    window,alert("خطا مجدد تلاش کنید")
                    var password = prompt("Please Inser the Password...");
                }
            }
        }
    </script>
</html>
