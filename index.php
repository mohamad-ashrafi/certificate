<?php
    include_once 'dbConfig.php';
    global $conn;
    global $connection;

    $sql = "CREATE TABLE IF NOT EXISTS certificate (
            id INT AUTO_INCREMENT PRIMARY KEY,
            phone VARCHAR(255) NOT NULL,
            issued_date DATE NULL
        )";
    if ($conn->query($sql) === TRUE) {
        //echo "Table 'certificate' created successfully"; // Optional: Display a success message
    } else {
        echo "Error creating table: " . $conn->error; // Optional: Display an error message if applicable
    }
?>
<html>
<head>
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
    <script src="js/main.js"></script>
    <link  type="text/css" href="css/style.css">
    <title>دریافت گواهینامه پایان دوره</title>
</head>
<body>
<div class="container formbox" style="direction: rtl;text-align: right;margin-top: 30px;">
    <a href="https://khanesarmaye.com"><img src="https://khanesarmaye.com/wp-content/uploads/2021/01/Logo-RGB-B2600.png"></a><br>
    <span class="formdes">قابل توجه دانشجویان گرامی<br>
        مدرک اصلی دوره(مدرک تحلیلگری بازار بین المللی سازمان فنی حرفه ای)
        پس از شرکت در آزمون و قبولی قابل دریافت می باشد
        <br>
        (زمان شرکت در آزمون متعاقبا در کانال دوره اطلاع رسانی خواهد شد)</span>
    <form action="index.php" method="post" style="max-width:50%;text-align: right;" class="getgormhn">
        <div class="form-group">
            <label id="name">نام و نام خانوادگی</label>
            <input class="form-control" type="text" name="name"><br>
        </div>
        <div class="form-group">
            <label id="codemeli">کدملی</label>
            <input class="form-control" type="text" name="codemeli"><br>
        </div>
        <div class="form-group">
            <label id="phone">شماره تماسی که با آن در دوره شرکت کرده اید</label>
            <input class="form-control" type="text" name="phone"><br>
        </div>
        <button type="submit" class="btn btn-primary" name="submit">ثبت اطلاعات و مشاهده گواهینامه</button>
    </form>
</div>
<div class="container formbox">
    <button type="button" id="printbuttom" class="btn btn-success" onclick="printhn()">ذخیره/پرینت گواهینامه</button>
</div>
<div class="container" id="madrakbox" style="background-repeat: no-repeat;background-size: contain;">




    <?php if(isset($_POST['name']) && isset($_POST['codemeli']) && isset($_POST['phone'])){
        $userPhone = $_POST['phone'];
        $name = $_POST['name'];
        $codemeli = $_POST['codemeli'];
        $searchuser = "SELECT * FROM certificate WHERE phone = '". $userPhone ."'";
        $phonedn = $conn->query($searchuser);
        if ($phonedn->num_rows > 0){ ?>
            <div class="databox" style="float: right;width: 1000px;height: auto;text-align: right;direction: rtl;">
                <img src="img/2.jpg" style="background-repeat: no-repeat;background-size: contain;width: 1000px;">
                <span class="namehn" style="font-size: 21px;font-weight: 800;top: -461px !important;position: relative;right: 670px;"> <?php echo $name . '<br>'; ?></span>
                <span class="codemelihn" style="position: relative;font-size: 18px;font-weight: 800;right: 520px;top: -449px;"><?php echo $codemeli . '<br>'; ?></span>
            </div>
        <?php }else{
            echo "<div class='errorcertif'><span>شماره همراه وارد شده ثبت نشده است <br>درصورت اطمینان از صحیح بودن شماره با پشتیبانی سایت تماس حاصل فرمایید <br>درغیراین صورت مجددا تلاش کنید</span>
                    <br><a href='tel:02191007590'>تماس با پشتیبانی</a> </div>";
        }
//        $showSearchUser = $searchuser->fetchAll(PDO::FETCH_OBJ);
//        foreach ($showSearchUser as $user){
//            echo "<br>' . $user->username . '<br>';
//        }
        ?>

    <?php } ?>




</div>
<style>
    @font-face {
        font-family: "iransans";
        src: url("fonts/iransans/woff2/IRANSansWeb_Medium.woff2") format("woff2"),
        url("fonts/iransans/woff/IRANSansWeb_Medium.woff") format("woff"),
        url("fonts/iransans/eot/IRANSansWeb_Medium.eot") format("eot"),
        url("fonts/iransans/ttf/IRANSansWeb_Medium.ttf") format("ttf");
    }
    body{
        font-family:iransans !important;
    }button.btn.btn-primary {
         background-color: #1564b9;
     }.container.formbox {
          padding: 0 50px 0 50px;
      }
    button.btn.btn-primary {
        width: 100% !important;
        margin-top: -25px !important;
    }.container.formbox span {
         font-size: 15px;
         margin: 35px 5px;
         float: right;
         color: #4a4a4a;
         line-height: 32px;
     }
    .errorcertif a {
        float: left;
        padding: 10px 50px;
        background-color: #a92222;
        color: white;
        border-radius: 5px;
    }
    .errorcertif {
        float: right;
        background-color: #ff000059;
        text-align: right;
        width: 100%;
        padding: 20px;
        font-size: 16px;
        line-height: 32px;
        border-radius: 5px;
    }
    .container.formbox a img {
        width: 35%;
    }
    .container.formbox a {
        width: 100%;
        text-align: center;
        float: right;
    }@media (min-width: 768px){
        .container, .container-md, .container-sm {
            max-width: 1000px;
        }}
    button.btn.btn-success, button.btn.btn-primary {
        font-size: 18px;
        float: right;
        margin: 5px 0 5px 0;
        width: 50%;
        font-weight: 500;
        padding: 15px 0;
    }form.getgormhn input {
         font-size: 18px;
     }
    form.getgormhn div:nth-child(2) {
        margin-top: -20px !important;
    }
    form.getgormhn input, form.getgormhn label {
        font-weight: 500;
    }
    form.getgormhn {
        font-size: 17px;
    }
    @media print {
        #madrakbox {
            background: url('img/ney-openlayer.jpg') !important;
        }body,span{
             font-family:iransans !important;
         }
        @page {
            size: Landscape;
            margin: 0;
        }span{
             font-family:iransans !important;
         }
    }
</style>

<script>
    function printhn() {
        var divContents = document.getElementById("madrakbox").innerHTML;
        var a = window.open('', '', 'height=auto, width=100%');
        a.document.write('<html><body>');
        a.document.write(divContents);
        a.document.write('</body></html>');
        a.document.close();
        a.print();
    }
</script>



</body>
</html>
