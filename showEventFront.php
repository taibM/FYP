<?PHP



include 'imageC.PHP';

 


$imageC=new imageC();
$image_list =$imageC->view_image();
$id_event1=$_POST['id_event'];
$date_event=$_POST['date'];
?>
 
<table border="1">
<td>CIN</td>
<td>Nom</td>
<td>Prenom</td>
<td>Nb_Heures</td>
<td>Tarif_Horaire</td>
<td>Supprimer</td>
<td>Modifier</td>

<?php
    foreach ($image_list as $row){
        if($row['id_event']==$id_event1)
?>
<tr>
    <td> <?PHP     echo $row['id_image']  ;   ?></td>
    <td> <?PHP     echo $row['nom']  ;   ?></td>
    <td> <?PHP     echo $row['size']  ;   ?></td>
    <td> <?PHP     echo $row['width']  ;   ?></td>
    <td> <?PHP     echo $row['height']  ;   ?></td>
    <td> <?PHP     echo $row['lien']  ;   ?></td>
    <td> <?PHP     echo $id_event1  ;   ?></td>
    <td> <?PHP     echo $date_event ;   ?></td>
  
 

           
    

</tr>

<?PHP 
}
?>
</table>


