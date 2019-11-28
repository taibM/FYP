<?php
require_once "../config.php";
class ProduitC
{
	function ajouterprod($produit){
        $db = config::getConnexion();
        $sql = "INSERT INTO produit VALUES (:referance,:nom,:prix,:quantite,:img,:description)";
        $req = $db->prepare($sql);
        $req->bindValue(':referance',$produit->getRef());
        $req->bindValue(':nom',$produit->getNom());
        $req->bindValue(':prix',$produit->getPrix());
        $req->bindValue(':quantite',$produit->getQuant());
        $req->bindValue(':img',$produit->getImg());
        $req->bindValue(':description',$produit->getDescription());
        $req->execute();
    }
    
    /*public function ajouterProduit($e)
    {
    	$referance=$e->getRef();
    	$nom=$e->getNom();
    	$prix=$e->getPrix();
    	$quantite=$e->getQuant();
        $img=$e->getImg();
        $description=$e->getDescription();
        

    	$sql = "INSERT INTO produit (referance,nom,prix,quantite,img,description)
VALUES ('$referance','$nom',$prix,$quantite,'$img','$description')";

$c=config::getConnexion();
$c->exec($sql);

    }*/
    public function afficherProduit()
    {
    	$c=config::getConnexion();
    	$sql = "SELECT * FROM produit";

 return $result = $c->query($sql);

}
public function afficherUnProduit()
    {
        
        $sql = "SELECT * FROM produit ";
        $c=config::getConnexion();
       $result = $c->query($sql);
       

 return $result ;

 
   
    
       
}
public function RecupererProduit($referance){
		$sql="SELECT * from Produit where (referance=$referance)";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
function getre()
{
    $c=config::getConnexion();
        $sql = "SELECT * FROM produit";

 return $result = $c->query($sql);
}
 public function supprimerProduit($referance)	
 {
 	$c=config::getConnexion();
 	$sql = "DELETE  FROM `produit` WHERE `referance`=:referance";
 	$req= $c->prepare($sql);
 	$req->bindValue(':referance',$referance);
$req->execute();

 }
 function modifierProduit($e,$referance){
        $sql="UPDATE produit SET referance=:referance, nom=:nom,prix=:prix,quantite=:quantite,img=:img,description=:description WHERE referance=:referance";
        
        $db = config::getConnexion();
        
try{        
        $req=$db->prepare($sql);
     $referance=$e->getRef();
        $nom=$e->getNom();
        $prix=$e->getPrix();
        $quantite=$e->getQuant();
        $img=$e->getImg();
        $description=$e->getDescription();

        $datas = array(':referance'=>$referance, ':referance'=>$referance, ':nom'=>$nom,':prix'=>$prix,':quantite'=>$quantite,':img'=>$img,':description'=>$description);
        $req->bindValue(':referance',$referance);
        $req->bindValue(':referance',$referance);
        $req->bindValue(':nom',$nom);
        $req->bindValue(':prix',$prix);
        $req->bindValue(':quantite',$quantite);
        $req->bindValue(':img',$img);
        $req->bindValue(':description',$description);
        
            $s=$req->execute();
            
           
        }
        catch (Exception $z){
            echo " Erreur ! ".$z->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
        
    }
}

?>
