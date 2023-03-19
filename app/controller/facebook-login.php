<?php

error_reporting(0);

$fb = new Facebook\Facebook([
  'app_id' => FACEBOOK_APP_ID,
  'app_secret' => FACEBOOK_APP_SECRET,
  'default_graph_version' => FACEBOOK_APP_GRAPH_VERSION,
]);

$helper = $fb->getRedirectLoginHelper();

try {
  $accessToken = $helper->getAccessToken();
} catch(Facebook\Exceptions\FacebookResponseException $e) {
  // When Graph returns an error
  echo 'Graph returned an error: ' . $e->getMessage();
  header("Location:" . site_url());
  exit;
} catch(Facebook\Exceptions\FacebookSDKException $e) {
  // When validation fails or other local issues
  echo 'Hata! ' . $e->getMessage();
  header("Location:" . site_url());
  exit;
}

if (! isset($accessToken)) {
  if ($helper->getError()) {
    header('HTTP/1.0 401 Unauthorized');
    echo "Error: " . $helper->getError() . "\n";
    echo "Error Code: " . $helper->getErrorCode() . "\n";
    echo "Error Reason: " . $helper->getErrorReason() . "\n";
    echo "Error Description: " . $helper->getErrorDescription() . "\n";
    header("Location:" . site_url());
    exit;
  } else {
    header('HTTP/1.0 400 Bad Request');
    echo 'Bad request';
    header("Location:" . site_url());
    exit;
  }
  exit;
}

// Logged in
// var_dump($accessToken->getValue());

// The OAuth 2.0 client handler helps us manage access tokens
$oAuth2Client = $fb->getOAuth2Client();

// Get the access token metadata from /debug_token
$tokenMetadata = $oAuth2Client->debugToken($accessToken);

// Validation (these will throw FacebookSDKException's when they fail)
$tokenMetadata->validateAppId(FACEBOOK_APP_ID); // Replace {app-id} with your app id
// If you know the user ID this access token belongs to, you can validate it here
//$tokenMetadata->validateUserId('123');
$tokenMetadata->validateExpiration();

if (! $accessToken->isLongLived()) {
  // Exchanges a short-lived access token for a long-lived one
  try {
    $accessToken = $oAuth2Client->getLongLivedAccessToken($accessToken);
  } catch (Facebook\Exceptions\FacebookSDKException $e) {
    echo "<p>Error getting long-lived access token: " . $helper->getMessage() . "</p>\n\n";
    exit;
  }

  // echo '<h3>Long-lived</h3>';
  // var_dump($accessToken->getValue());
}

$_SESSION['fb_access_token'] = (string) $accessToken;
$response = $fb->get('/me?fields=email,id,name,cover,first_name,last_name,picture', $accessToken);

$user = $response->getGraphUser();

$adsoyad = $user["name"];
$email = $user["email"];
$password = "facebook";

if( DB::getVar("SELECT COUNT(*) FROM uyeler WHERE email = '" . $user["email"] . "'") == 0 ){
  $insertUyelik = DB::insert("INSERT INTO uyeler(email,password,adsoyad,facebook_login_token)
                              VALUES(?,?,?,?)",array(
                                $email,
                                $password,
                                $adsoyad,
                                $accessToken
                              ));
}

$kayitliUye = DB::getRow("SELECT * FROM uyeler WHERE email = '$email'");

$siparis_code = md5(uniqid(true));
$create_siparis_code = DB::exec("UPDATE uyeler SET siparis_code = '$siparis_code' WHERE id = '" . $kayitliUye->id . "'");

# create api key
$new_api_key = md5(uniqid(mt_rand(), true));
$updateApiKey = DB::exec("UPDATE uyeler SET api_key = '$new_api_key', last_login_ip = '" . GetIP() . "' WHERE id = '" . $kayitliUye->id . "'");
#

$sessionArray = array(
  'login' => true,
  'api_key' => $new_api_key,
  'uye_id' => $kayitliUye->id,
  'email' => $kayitliUye->email,
  'adsoyad' => $kayitliUye->adsoyad
);

create_sessions($sessionArray);

hareketEkle($kayitliUye->id, "giris_facebook", json_encode([
  'giris_tarihi' => date("d.m.Y H:i")
]));

header('Location: ' . site_url());
