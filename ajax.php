<?php 

$tc=$_POST['tc'];

if(tckimlik($_POST['tc'])){ echo 'Tc Kimlik Numarası doğru!'; } else { echo 'Lütfen geçerli bir Tc Kimlik Numarası giriniz...'; } 

function tckimlik($tckimlik){ 
    $olmaz=array('11111111110','22222222220','33333333330','44444444440','55555555550','66666666660','7777777770','88888888880','99999999990'); 
    if($tckimlik[0]==0 or !ctype_digit($tckimlik) or strlen($tckimlik)!=11){ return false;  } 
    else{ 
        for($a=0;$a<9;$a=$a+2){ $ilkt=$ilkt+$tckimlik[$a]; } 
        for($a=1;$a<9;$a=$a+2){ $sont=$sont+$tckimlik[$a]; } 
        for($a=0;$a<10;$a=$a+1){ $tumt=$tumt+$tckimlik[$a]; } 
        if(($ilkt*7-$sont)%10!=$tckimlik[9] or $tumt%10!=$tckimlik[10]){ return false; } 
        else{  
            foreach($olmaz as $olurmu){ if($tckimlik==$olurmu){ return false; } } 
            return true; 
        } 
    } 
} 




?>