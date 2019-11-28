<?PHP

include "config.PHP";
include "event.PHP";

class eventC
{

    function view_event ()

    {
    $sql ='SELECT * FROM event';
    $db=config::getConnexion();
    try {
        
        $liste=$db->query ($sql);
        return $liste;

    }   catch (Exception $e) {
die ('Erreur' .$e->getMessage());
    }
    }


    function add_event($event)
    {
$sql=" insert into event (id_event,nom,code,date,lieu) values(:id_event,:nom,:code,:date,:lieu)";
$db =config ::getConnexion();
try {
        $req =$db->prepare($sql);

        $id_event=$event->getid_event();
        $nom=$event->getnom();
        $code=$event->getcode();
        $date=$event->getdate();
        $lieu=$event->getlieu();


        $req->bindValue(':id_event',$id_event);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':code',$code);
        $req->bindValue(':date',$date);
        $req->bindValue(':lieu',$lieu);

        $req->execute();

}catch (Exception $e)
{
    echo "Erreur ".$e->getMessage();
}


    }
    function update_event($id_event,$nom,$code,$date,$lieu)
    {
$sql=" UPDATE event SET nom=:nom,code=:code,date=:date,lieu=:lieu  WHERE id_event=:id_event ";
$db =config ::getConnexion();
try {   
       
        $req=$db->prepare($sql); 
        


        $req->bindValue(':id_event',$id_event);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':code',$code);
        $req->bindValue(':date',$date);
        $req->bindValue(':lieu',$lieu);
        $req->execute();
       

}catch (Exception $e)
{
    echo "Erreur ".$e->getMessage();
}


    }
   
    function delete_event($id_event)
    {
$sql="DELETE FROM event WHERE :id_event=id_event";
$db =config ::getConnexion();
try {   
       
        $req=$db->prepare($sql); 
        $req->bindValue(':id_event',$id_event);
        $req->execute();
       

}catch (Exception $e)
{
    echo "Erreur ".$e->getMessage();
}


    }


}






?>