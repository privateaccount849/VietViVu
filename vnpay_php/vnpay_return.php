<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <title>VNPAY RESPONSE</title>
    <!-- Bootstrap core CSS -->
    <link href="/vnpay_php/assets/bootstrap.min.css" rel="stylesheet" />
    <!-- Custom styles for this template -->
    <link href="/vnpay_php/assets/jumbotron-narrow.css" rel="stylesheet">
    <script src="/vnpay_php/assets/jquery-1.11.3.min.js"></script>
</head>

<body>
    <?php
    require_once("./config.php");
    $vnp_SecureHash = $_GET['vnp_SecureHash'];
    $inputData = array();
    foreach ($_GET as $key => $value) {
        if (substr($key, 0, 4) == "vnp_") {
            $inputData[$key] = $value;
        }
    }

    unset($inputData['vnp_SecureHash']);
    ksort($inputData);
    $i = 0;
    $hashData = "";
    foreach ($inputData as $key => $value) {
        if ($i == 1) {
            $hashData = $hashData . '&' . urlencode($key) . "=" . urlencode($value);
        } else {
            $hashData = $hashData . urlencode($key) . "=" . urlencode($value);
            $i = 1;
        }
    }

    $secureHash = hash_hmac('sha512', $hashData, $vnp_HashSecret);
    ?>
    <!--Begin display -->
    <div class="container">
        <div class="header clearfix">
            <h3 class="text-muted">VNPAY RESPONSE</h3>
        </div>
        <div class="table-responsive">
            <div class="form-group">
                <label>Mã đơn hàng:</label>

                <label><?php echo $_GET['vnp_TxnRef'] ?></label>
            </div>
            <div class="form-group">

                <label>Số tiền:</label>
                <label><?php echo $_GET['vnp_Amount'] ?></label>
            </div>
            <div class="form-group">
                <label>Nội dung thanh toán:</label>
                <label><?php echo $_GET['vnp_OrderInfo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã phản hồi (vnp_ResponseCode):</label>
                <label><?php echo $_GET['vnp_ResponseCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã GD Tại VNPAY:</label>
                <label><?php echo $_GET['vnp_TransactionNo'] ?></label>
            </div>
            <div class="form-group">
                <label>Mã Ngân hàng:</label>
                <label><?php echo $_GET['vnp_BankCode'] ?></label>
            </div>
            <div class="form-group">
                <label>Thời gian thanh toán:</label>
                <label><?php echo date('Y-m-d H:i:s');  ?></label>
            </div>
            <div class="form-group">
                <label>Kết quả:</label>
                <label>
                    <?php
                    if ($secureHash == $vnp_SecureHash) {
                        if ($_GET['vnp_ResponseCode'] == '00') {
                            $sql = "SELECT * FROM `orders` WHERE Id = $_GET[vnp_TxnRef] limit 1";
                            $result=$con->query($sql);
                            while ($row = mysqli_fetch_array($result)) {
                                $email = $row['Email'];
                                $fullName = $row['FirstName'] . $row['LastName'];
                                $sent = $row['Sent'];

                            }
                            if($sent==0){
                                require "../PHPMailer/PHPMailer.php";
                                require "../PHPMailer/SMTP.php";
                                require '../PHPMailer/Exception.php';
                                $mail = new PHPMailer\PHPMailer\PHPMailer(true); //true:enables exceptions
                                try {
                                    $mail->SMTPDebug = 0; //0,1,2: chế độ debug. khi chạy ngon thì chỉnh lại 0 nhé
                                    $mail->isSMTP();
                                    $mail->CharSet  = "utf-8";
                                    $mail->Host = 'smtp.gmail.com';  //SMTP servers
                                    $mail->SMTPAuth = true; // Enable authentication
                                    $mail->Username = 'longntbhaf190233@fpt.edu.vn'; // SMTP username
                                    $mail->Password = 'Thanhlong12';   // SMTP password
                                    $mail->SMTPSecure = 'ssl';  // encryption TLS/SSL 
                                    $mail->Port = 465;  // port to connect to                
                                    $mail->setFrom('longntbhaf190233@fpt.edu.vn', 'Thanh Long');
                                    $mail->addAddress($email ,$fullName); //mail và tên người nhận  
                                    $mail->isHTML(true);  // Set email format to HTML
                                    $mail->Subject = 'VietViVu Payment successly';
                                    $noidungthu = '<h2>Thank you for use my Service</h2>';
                                    $mail->Body = $noidungthu;
                                    $mail->smtpConnect(array(
                                        "ssl" => array(
                                            "verify_peer" => false,
                                            "verify_peer_name" => false,
                                            "allow_self_signed" => true
                                        )
                                    ));
                                    $mail->send();
                                    echo 'Đã gửi mail xong';
                                } catch (Exception $e) {
                                    echo 'Mail không gửi được. Lỗi: ', $mail->ErrorInfo;
                                }
                                $sql = "UPDATE `orders` SET `Status`='1' WHERE Id = $_GET[vnp_TxnRef]";
                                $con->query($sql);
                                $sql2 = "UPDATE `orders` SET `Sent`='1' WHERE Id = $_GET[vnp_TxnRef]";
                                $con->query($sql2);
                                echo "<span style='color:blue'>GD Thanh cong</span>";
                            }
                        
                          
                        } else {
                            echo "<span style='color:red'>GD Khong thanh cong</span>";
                        }
                    } else {
                        echo "<span style='color:red'>Chu ky khong hop le</span>";
                    }
                    ?>

                </label>
            </div>
        </div>
        <p>
            &nbsp;
        </p>
        <footer class="footer">
            <p>&copy; VNPAY <?php echo date('Y') ?></p>
        </footer>
    </div>
</body>

</html>