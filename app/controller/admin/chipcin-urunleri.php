<?php

switch( get("step") ){
  // kategori
  default:
  case "kategori":

    $obj = json_decode(chipcin_api_request([
      "action" => "categories"
    ]));
  
    require view("admin/chipcin-urunleri");

  break;
  // ürün
  case "urun":
  
    $obj = json_decode(chipcin_api_request([
      "action" => "products",
      "category_id" => get("cat_id"),
      "page" => 1
    ]));

    require view("admin/chipcin-cat");

  break;
}
