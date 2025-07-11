<?php
try{
    $pdo = new pdo('mysql:host=localhost;dbname=xaliye_student','root','');

// echo "guul";

}catch(PDOException $f){
    echo $f->getmessage();
}

?>