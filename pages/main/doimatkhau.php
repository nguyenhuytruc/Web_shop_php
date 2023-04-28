<?php

if (isset($_POST['doimatkhau'])) {
    $email = $_POST['email'];
    $mk_cu = md5($_POST['password_cu']);
    $mk_moi = md5($_POST['password_moi']);
    $sql = "SELECT * FROM tbl_dangky WHERE email = '$email' AND matkhau = '$mk_cu' LIMIT 1";
    $query = mysqli_query($mysqli, $sql);
    $row = mysqli_num_rows($query);
    if ($row>0) {
        $sql_doimatkhau = mysqli_query($mysqli,"UPDATE tbl_dangky SET matkhau = '$mk_moi' WHERE email = '$email'");
        echo "<p style='color: green'>Đổi mật khẩu thành công!</p>";
    }else{
      echo "<p style='color: red'>Email hoặc mật khẩu cũ không hợp lệ!</p>";
    }
}
?>
<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="css/reset.css">
    <link rel="stylesheet" href="css/app.css">
    <link rel="stylesheet" href="https://pro.fontawesome.com/releases/v5.10.0/css/all.css">
    <style>
        body {
            background: url('../images/bg.jpeg');
            background-size: cover;
            background-position-y: -80px;
            font-size: 16px;
        }

        #wrapper {
            min-height: 50vh;
            display: flex;
            justify-content: center;
            align-items: center;
        }

        #form-login {
            max-width: 400px;
            background: rgba(0, 0, 0, 0.8);
            flex-grow: 1;
            padding: 30px 30px 40px;
            box-shadow: 0px 0px 17px 2px rgba(255, 255, 255, 0.8);
        }

        .form-heading {
            font-size: 25px;
            color: #f5f5f5;
            text-align: center;
            margin-bottom: 30px;
        }

        .form-group {
            border-bottom: 1px solid #fff;
            margin-top: 15px;
            margin-bottom: 20px;
            display: flex;
        }

        .form-group i {
            color: #fff;
            font-size: 14px;
            padding-top: 5px;
            padding-right: 10px;
        }

        .form-input {
            background: transparent;
            border: 0;
            outline: 0;
            color: #f5f5f5;
            flex-grow: 1;
        }

        .form-input::placeholder {
            color: #f5f5f5;
        }

        #eye i {
            padding-right: 0;
            cursor: pointer;
        }

        .form-submit {
            background: transparent;
            border: 1px solid #f5f5f5;
            color: #fff;
            width: 100%;
            text-transform: uppercase;
            padding: 6px 10px;
            transition: 0.25s ease-in-out;
            margin-top: 30px;
        }

        .form-submit:hover {
            border: 1px solid #54a0ff;
        }
    </style>
    <title>Đổi mât khẩu</title>
</head>

<body>
    <div id="wrapper">
        <form action="" id="form-login" method="POST">
            <h1 class="form-heading">Đổi mật khẩu</h1>
            <div class="form-group">
                <i class="far fa-user"></i>
                <input type="text" class="form-input" placeholder="Email" name="email">
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu cũ" name="password_cu">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <div class="form-group">
                <i class="fas fa-key"></i>
                <input type="password" class="form-input" placeholder="Mật khẩu mới" name="password_moi">
                <div id="eye">
                    <i class="far fa-eye"></i>
                </div>
            </div>
            <input type="submit" value="Đăng nhập" class="form-submit" name="doimatkhau">
        </form>
    </div>

</body>
<script src="https://code.jquery.com/jquery-3.6.0.js"></script>
<script src="js/app.js"></script>
<script>
    $(document).ready(function() {
        $('#eye').click(function() {
            $(this).toggleClass('open');
            $(this).children('i').toggleClass('fa-eye-slash fa-eye');
            if ($(this).hasClass('open')) {
                $(this).prev().attr('type', 'text');
            } else {
                $(this).prev().attr('type', 'password');
            }
        });
    });
</script>

</html>