<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login</title>
    <link rel="stylesheet" href=".\web\css\CSSlogin.css">

</head>
<?php
session_start();
$_SESSION['logged'] = false;
$_SESSION['check'] = 0;
$erlog="";
$erpas="";
include "connect.php";
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    if ($_POST['login_id'] == null) {
        $erlog = "Hãy nhập login id";
    } else {
        if (strlen($_POST['login_id']) < 4 ) {
            $erlog = "Hãy nhập login id tối thiểu 4 kí tự";
        }else {
            $login_id =  str_replace(' ', '',$_POST['login_id']);
            $_SESSION['login_id'] = $login_id;
        }
    }
    if ($_POST['password'] == null) {
        $erpas = "Hãy nhập password";
    } else {
        if (strlen($_POST['password']) < 6 ) {
            $erpas = "Hãy nhập password tối thiểu 6 kí tự";
        } else {
            $password = $_POST['password'];
            $_SESSION['password'] = $password;
        }
    }
    if ($erlog == "" && $erpas ==  "") {
        $query = "SELECT * FROM admins WHERE login_id = :login_id AND password = :password";
        $statement = $conn->prepare($query);
        $statement->execute(
            array(
                'login_id'     =>     $login_id,
                'password'     =>     $password
            )
        );
        $count = $statement->rowCount();
        if ($count > 0) {
            $_SESSION['logged'] = true;
            date_default_timezone_set("Asia/Ho_Chi_Minh");
            $_SESSION['time'] = date("Y-m-d H:i");
            header("Location: home.php");
            exit();
        } else {
            $erlog = 'login_id và password không đúng';
        }
    }
}
?>

<body>
    <div class="content">
        <div class="form">
            <form action="" method="POST">
                <table>
                    <?php
                            echo '<th class="Validate">' . $erlog . '</th>';
                    ?>
                    <tr>
                        <td class="label"><?php echo "Người dùng"; ?></td>
                        <td><input class="input" type="textbox" name="login_id" value="<?php if (isset($login_id)) echo $login_id; ?>" size="30"></td>
                    </tr>
                    <?php
                            echo '<th class="Validate">' . $erpas . '</th>';
 
                    ?>
                    <tr>
                        <td class="label"><?php echo "Password"; ?></td>
                        <td><input class="input" type="password" name="password" value="<?php if (isset($password)) echo $password; ?>"></td>
                    </tr>
                </table>
                <a class="a" href="resetPassword.php" >Quên password<a>
                <div colspan="2" align="center"> <input class="button" type="submit" name="btn_submit" value="Đăng nhập"></div>
            </form>

        </div>
    </div>
</body>


</html>