<?php
try{
    $pdo = new pdo('mysql:host=localhost;dbname=repair_web','root','');

// echo "guul";

}catch(PDOException $f){
    echo $f->getmessage();
}

?>