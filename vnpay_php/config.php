<?php
date_default_timezone_set('Asia/Ho_Chi_Minh');
/*
 * To change this license header, choose License Headers in Project Properties.
 * To change this template file, choose Tools | Templates
 * and open the template in the editor.
 */
  
$vnp_TmnCode = "FBBTG7HI"; //Website ID in VNPAY System
$vnp_HashSecret = "APUPHHUVHZIUJXCYDPKWMGDKSHIJKVXW"; //Secret key
$vnp_Url = "https://sandbox.vnpayment.vn/paymentv2/vpcpay.html";
$vnp_Returnurl = "http://localhost/vnpay_php/";
$vnp_apiUrl = "http://sandbox.vnpayment.vn/merchant_webapi/merchant.html";
//Config input format
//Expire
$startTime = date("YmdHis");
$expire = date('YmdHis',strtotime('+15 minutes',strtotime($startTime)));


//http://localhost/vnpay_php/?vnp_Amount=1000000&vnp_BankCode=NCB&vnp_BankTranNo=VNP13729917&vnp_CardType=ATM&vnp_OrderInfo=Noi+dung+thanh+toan&vnp_PayDate=20220421003725&vnp_ResponseCode=00&vnp_TmnCode=FBBTG7HI&vnp_TransactionNo=13729917&vnp_TransactionStatus=00&vnp_TxnRef=20220421003513&vnp_SecureHash=dd2a87afd9541e8a615328c44de3f5c8f68311c1193655c6ca313a884cea6afbcc2e741ed3fcf8c2f8e5d744eec67404d7cee50e5072bdbae7209b9815a09da0