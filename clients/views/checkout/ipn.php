<?php
$rawData = file_get_contents("php://input");
$data = json_decode($rawData, true);

if ($data && isset($data['signature'])) {
    $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa';
    $rawHash = "accessKey=klm05TvNBzhg7h7j&amount={$data['amount']}&extraData={$data['extraData']}&ipnUrl=http://localhost/DuAn1/clients/views/checkout/ipn.php&orderId={$data['orderId']}&orderInfo={$data['orderInfo']}&partnerCode={$data['partnerCode']}&redirectUrl=http://localhost/DuAn1/clients/views/checkout/order-success.php&requestId={$data['requestId']}&requestType=payWithATM";
    $mySignature = hash_hmac("sha256", $rawHash, $secretKey);

    if ($data['signature'] === $mySignature) {
        if ($data['resultCode'] == 0) {
            // Thanh toán thành công
            echo json_encode(['message' => 'Confirm Success']);
        } else {
            // Thanh toán thất bại
            echo json_encode(['message' => 'Confirm Fail']);
        }
    } else {
        echo json_encode(['message' => 'Invalid Signature']);
    }
} else {
    echo json_encode(['message' => 'No Data Received']);
}
?>
