<?PHP

include "config.PHP";
include "image.PHP";

class imageC
{

    function view_image ()

    {
    $sql ='SELECT * FROM image';
    $db=config::getConnexion();
    try {
        
        $liste=$db->query ($sql);
        return $liste;

    }   catch (Exception $e) {
die ('Erreur' .$e->getMessage());
    }
    }


    function add_image($image)
    {
$sql=" insert into image (id_image,nom,size,width,height,type,lien,id_event) values(:id_image,:nom,:size,:width,:height,:type,:lien,:id_event)";
$db =config ::getConnexion();
try {
        $req =$db->prepare($sql);

        $id_image=$image->getid_image();
        $nom=$image->getnom();
        $size=$image->getsize();
        $width=$image->getwidth();
        $height=$image->getheight();
        $type=$image->gettype();
        $lien=$image->getlien();
        $id_event=$image->getid_event();


        $req->bindValue(':id_image',$id_image);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':size',$size);
        $req->bindValue(':width',$width);
        $req->bindValue(':height',$height);
        $req->bindValue(':type',$type);
        $req->bindValue(':lien',$lien);
        $req->bindValue(':id_event',$id_event);

        $req->execute();

}catch (Exception $e)
{
    echo "Erreur ".$e->getMessage();
}


    }
    function update_image($id_image,$nom,$size,$width,$height,$type,$lien,$id_event)
    {
$sql=" UPDATE image SET nom=:nom,size=:size,width=:width,height=:height,type=:type,lien=:lien,id_event=:id_event  WHERE id_image=:id_image ";
$db =config ::getConnexion();
try {   
       
        


        $req->bindValue(':id_image',$id_image);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':size',$size);
        $req->bindValue(':width',$width);
        $req->bindValue(':height',$height);
        $req->bindValue(':type',$type);
        $req->bindValue(':lien',$lien);
        $req->bindValue(':id_event',$id_event);
        $req->execute();
       

}catch (Exception $e)
{
    echo "Erreur ".$e->getMessage();
}


    }
   
    function delete_image($id_image)
    {
$sql="DELETE FROM image WHERE :id_image=id_image";
$db =config ::getConnexion();
try {   
       
        $req=$db->prepare($sql); 
        $req->bindValue(':id_image',$id_image);
        $req->execute();
       

}catch (Exception $e)
{
    echo "Erreur ".$e->getMessage();
}


    }


}






?>