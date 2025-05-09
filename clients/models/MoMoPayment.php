<?php
class MoMoPayment
{
    private static function execPostRequest($url, $data)
    {
        $ch = curl_init($url);
        curl_setopt($ch, CURLOPT_CUSTOMREQUEST, "POST");
        curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
        curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($ch, CURLOPT_HTTPHEADER, [
            'Content-Type: application/json',
            'Content-Length: ' . strlen($data)
        ]);
        curl_setopt($ch, CURLOPT_TIMEOUT, 5);
        curl_setopt($ch, CURLOPT_CONNECTTIMEOUT, 5);

        $result = curl_exec($ch);
        curl_close($ch);

        return $result;
    }

    public static function createPayment($orderId, $amount, $orderInfo, $redirectUrl, $ipnUrl)
    {
        $endpoint = "https://test-payment.momo.vn/v2/gateway/api/create";

        $partnerCode = 'MOMOBKUN20180529'; // Thay bằng mã đối tác của bạn
        $accessKey = 'klm05TvNBzhg7h7j';  // Thay bằng AccessKey của bạn
        $secretKey = 'at67qH6mk8w5Y1nAyMoYKMWACiEi2bsa'; // Thay bằng SecretKey của bạn
        $requestId = time() . "";
        $requestType = "payWithATM";
        $extraData = "";

        // Tạo chữ ký (signature)
        $rawHash = "accessKey=$accessKey&amount=$amount&extraData=$extraData&ipnUrl=$ipnUrl&orderId=$orderId&orderInfo=$orderInfo&partnerCode=$partnerCode&redirectUrl=$redirectUrl&requestId=$requestId&requestType=$requestType";
        $signature = hash_hmac("sha256", $rawHash, $secretKey);

        // Dữ liệu gửi đến MoMo
        $data = [
            'partnerCode' => $partnerCode,
            'partnerName' => "MoMo Payment",
            'storeId' => "MoMoTestStore",
            'requestId' => $requestId,
            'amount' => $amount,
            'orderId' => $orderId,
            'orderInfo' => $orderInfo,
            'redirectUrl' => $redirectUrl,
            'ipnUrl' => $ipnUrl,
            'lang' => 'vi',
            'extraData' => $extraData,
            'requestType' => $requestType,
            'signature' => $signature
        ];

        $response = self::execPostRequest($endpoint, json_encode($data));
        $jsonResult = json_decode($response, true);

        return $jsonResult['payUrl'] ?? false;
    }
}
?>
