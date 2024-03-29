
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $target_dir = "uploads/";
    $target_file = $target_dir . basename($_FILES["fileToUpload"]["name"]);

    if (move_uploaded_file($_FILES["fileToUpload"]["tmp_name"], $target_file)) {
        echo "File đã được tải lên thành công.";
        searchImageWithGoogleLens($target_file);
    } else {
        echo "Xin lỗi, có lỗi khi tải file của bạn.";
    }
}

function searchImageWithGoogleLens($filepath) {
    $timeStamp = round(microtime(true) * 1000);
    $url = "https://lens.google.com/v3/upload?hl=en-VN&re=df&stcs=$timeStamp&ep=subb";

    $boundary = "----WebKitFormBoundary";
    $contentFile = file_get_contents($filepath);

    $postData = "--" . $boundary . "\r\n";
    $postData .= 'Content-Disposition: form-data; name="encoded_image"; filename="' . basename($filepath) . '"' . "\r\n";
    $postData .= 'Content-Type: image/jpeg' . "\r\n\r\n";
    $postData .= $contentFile . "\r\n";
    $postData .= "--" . $boundary . "--\r\n";

   
	//post lên lens url
	$curl = curl_init($url);
	curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
	curl_setopt($curl, CURLOPT_HTTPHEADER, [
		'Content-Type: multipart/form-data; boundary=' . $boundary,
		'Content-Length: ' . strlen($postData),
		'Referer: https://lens.google.com/',
		'User-Agent: Mozilla/5.0 (Windows NT 10.0; Win64; x64) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/120.0.0.0 Safari/537.36'
	]);
	curl_setopt($curl, CURLOPT_POST, true);
	curl_setopt($curl, CURLOPT_POSTFIELDS, $postData);

	$response = curl_exec($curl);
	curl_close($curl); // đóng curl

    // Xử lý phản hồi và hiển thị kết quả
    preg_match('#\"\,\[\[\[(.*?)\]\]\,\"#', $response, $all_text);
    $allText = [];
    if (isset($all_text[1])) $allText = json_decode('[' . $all_text[1] . ']', true);

    if (empty($allText)) {
        echo json_encode(['failed' => 'Không thể nhận dạng được văn bản']);
        exit;
    }

    $newText = implode(' ', $allText);
    echo json_encode(['result' => $newText]);
}

?>
