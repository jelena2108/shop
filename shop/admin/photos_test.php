<?php include "class_photo.php"; ?>
<?php 
// $photos=new Photo(); VEĆ JE INSTANCIRANA KLASA,tj.KREIRAN OBJKAT $photos U FAJLU class_photo.php,PA NAD TIM OBJEKTOM POZIVAMO METOD getAll() 
$result=$photos->getAll();
foreach($result as $photo){
    echo $photo->title;
}




?>