<?PHP
include "../entities/produit.php";
include "../core/produitC.php";

if (isset($_GET['referance'])){
	$produitC=new produitC();
  $result=$produitC->RecupererProduit($_GET['referance']);
	foreach($result as $row){
		$referance=$row['referance'];
		$nom=$row['nom'];
		$prix=$row['prix'];
    $quantite=$row['quantite'];
    $img=$row['img'];
    $description=$row['description'];
			}
}

 
?>
<div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ul class="breadcrumb">
        
        <li class="breadcrumb-item active">Modifier produit</li>
      </ul>
      <!-- Example DataTables Card-->
      <div class="card card-register mx-auto mt-5">
      <div class="card-header">Modifier produit</div>
      <div class="card-body">
        <form method="POST" >
          <div class="form-group">
            <div class="form-row">
              
                <label for="exampleInputName">Reference</label>
                <input class="form-control" name="referance" type="number" aria-describedby="nameHelp">
              
			  </div>
			  <div class="form-row">
              
                <label for="exampleInputLastName">Nom du produit</label>
                <input class="form-control" name="nom"  type="text" aria-describedby="nameHelp" >
              
            </div>
          </div>
          <div class="form-group">
		  
            <label for="exampleInputEmail1">Prix</label>
            <input class="form-control" name="prix" type="number" aria-describedby="emailHelp"  >
          </div>
          <div class="form-group">
			  <div class="form-row">
              
                <label for="exampleConfirmPassword">Quantite</label>
                <input class="form-control" name="quantite" type="number"  >
              </div>
              
              <div class="form-row">
              <p>
              <label for="description">Description</label><br />
              <textarea name="description" id="description"></textarea>
</p>
              </div>
              <div class="form-row">
              
                <label for="image">Photo</label>
                <input class="form-control" type="file" name="img" required>
              </div>
              </div>
          
         
              <input class="form-control" type="submit" name="modifier" value="modifier">
              <input type="hidden" name="referance_ini" value="<?PHP echo $_GET['referance'];?>"></td>
        </form>
       
      
    </div>
      
    </div>
    </div>

  <?php
  if (isset($_POST['modifier']))
  {
    
    $produit=new produit($_POST['referance'],$_POST['nom'],$_POST['prix'],$_POST['quantite'],$_POST['img'],$_POST['description']);
    $produitC->modifierProduit($produit,$_POST['referance_ini']);
 // header('Location: afficherproduit.php');
  }?>
  
    