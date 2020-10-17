<?php require_once 'vendor/autoload.php';
session_start();
$fb = new \Facebook\Facebook([
    'app_id'      => '795480281239142',
    'app_secret'     => 'e0e4a86a02bba6a3c36d344e327dd9e1',
    'default_graph_version'  => 'v8.0'
]);

$helper = $fb->getRedirectLoginHelper();
try {
$accessToken = $helper->getAccessToken();
$response = $fb->get('/me?fields=id,name,email', $accessToken);
} catch(Facebook\Exceptions\FacebookResponseException $e) {
// When Graph returns an error
echo 'Graph returned an error: ' . $e->getMessage();
exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
// When validation fails or other local issues
echo 'Facebook SDK returned an error: ' . $e->getMessage();
exit;
}
if (! isset($accessToken)) {
if ($helper->getError()) {
header('HTTP/1.0 401 Unauthorized');
echo "Error: " . $helper->getError() . "\n";
echo "Error Code: " . $helper->getErrorCode() . "\n";
echo "Error Reason: " . $helper->getErrorReason() . "\n";
echo "Error Description: " . $helper->getErrorDescription() . "\n";
} else {
header('HTTP/1.0 400 Bad Request');
echo 'Bad request';
}
exit;
}
// Logged in
$me = $response->getGraphUser();
echo 'Logged in as: ' . $me->getName();
echo 'ID:' . $me->getId();
echo 'Email:' . $me->getEmail();
$_SESSION['fb_access_token'] = (string) $accessToken;
// Từ đây bạn xử lý kiểm tra thông tin user trong database sau đó xử lý.
?>

<a href="log_out.php">Log out</a>

