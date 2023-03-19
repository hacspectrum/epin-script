<?php

if($urun_id = get("urun_id")){

    $urun = DB::getRow("SELECT * FROM chip_urunler WHERE id = '$urun_id'");
    if(!isset($urun->id)){
        header("Location: " . $_SERVER["HTTP_REFERER"]);
        exit;
    }

    if(post("kod_ekle")){

        $count = 0;
        $successCount = 0;
        $failedCount = 0;

        $kodlar = post("kodlar",true);
        foreach(explode("\n", trim($kodlar)) as $kod):
            $insertCode = DB::insert("INSERT INTO codes(code,product_id,status) VALUES(?,?,?)",[
                trim($kod),
                $urun_id,
                0
            ]);
            if($insertCode){
                $successCount++;
            }else{
                $failedCodes .= " - " . $kod;
                $failedCount++;
            }
            $count++;
        endforeach;

        $response = array(
            "class" => "success",
            "message" => "İşlem tamamlandı. <br> <strong>" . $successCount . "/" . $count . "</strong> başarılı oldu." . ( $failedCount > 0 ? "<br> Eklenemeyen kodlar (" . $failedCodes . " Adet); <br> " . $failedCodes : null)
        );

    }

}else{
    header("Location: " . $_SERVER["HTTP_REFERER"]);
    exit;
}

require view("admin/kod-ekle");