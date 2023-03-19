<?php

function facebookLoginURL($url){
  $fb = new Facebook\Facebook([
    'app_id' => FACEBOOK_APP_ID, // Replace {app-id} with your app id
    'app_secret' => FACEBOOK_APP_SECRET,
    'default_graph_version' => FACEBOOK_APP_GRAPH_VERSION,
    ]);

  $helper = $fb->getRedirectLoginHelper();

  $permissions = ['email']; // Optional permissions
  $facebookloginUrl = $helper->getLoginUrl($url, $permissions);

  return $facebookloginUrl; // return url
}
