<?PHP

include "../entities/produit.php";
include "../core/produitC.php";

if ( isset($_POST['ajouter']))
{
if (isset($_POST['Referance']) and isset($_POST['Nom']) and isset($_POST['Prix']) and isset($_POST['Quantite']) and isset($_POST['description'])){

$upload_image=$_FILES["myimage"]["name"];
$folder="../images/";
$folder.=$upload_image;
$produit1=new produit($_POST['Referance'],$_POST['Nom'],$_POST['Prix'],$_POST['Quantite'],$_POST['description'],$folder);


move_uploaded_file($_FILES["myimage"]["tmp_name"], "$folder");
$produit1C=new ProduitC();
$produit1C->ajouterProd($produit1);
header('Location: afficherProduit.php');

	
}else{
	echo "vérifier les champs";
}

}
?>