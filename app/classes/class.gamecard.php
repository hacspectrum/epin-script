<?php

/**
 * game card api class
 */
class GameCard
{

  public $key = '';

  public function setKey($new_key)
  {

    $this->key = $new_key;

  }

  public function getCode($url, $amount)
  {

    $postArray = array(
      'm' => 'GameCard',
      'q' => 'Create',
      'accessToken' => $this->key,
      'amount' => $amount,
    );

    return $this->CreateRequest($url, $postArray);

  }

  private function CreateRequest($API_URL, $postArray)
  {

    $headers = array(
      'Cache-Control: no-cache',
    );

    $ch = curl_init($API_URL);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($ch, CURLOPT_POSTFIELDS, $postArray);
    curl_setopt($ch, CURLOPT_HTTPHEADER, $headers);
    $response = curl_exec($ch);
    curl_close($ch);

    return json_decode($response);

  }

}
