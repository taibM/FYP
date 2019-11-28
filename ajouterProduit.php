

 <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Breadcrumbs-->
      <ul class="breadcrumb">
        
        <li class="breadcrumb-item active">Ajouter Produit</li>
      </ul>
      <!-- Example DataTables Card-->
	  <div class="card card-register mx-auto mt-5">
      
      <div class="card-body">
        <form method="POST" action="ajouterProduit1.php" enctype="multipart/form-data">
          <div class="form-group">
            <div class="form-row">
              
                <label for="exampleInputName">Referance</label>
                <input class="form-control" name="Referance" type="text" aria-describedby="nameHelp">
              
			  </div>
			  <div class="form-row">
              
                <label for="exampleInputLastName">Nom du Produit</label>
                <input class="form-control" name="Nom"  type="text" aria-describedby="nameHelp">
              
            </div>
          </div>
          <div class="form-group">
		  
            <label for="exampleInputEmail1">Prix</label>
            <input class="form-control" name="Prix" type="number" aria-describedby="emailHelp" >
          </div>
          
			  <div class="form-row">
              
                <label for="exampleConfirmPassword">Quantite</label>
                <input class="form-control" name="Quantite" type="number" >
              </div>
			  <div class="form-row">
              
                <label for="exampleConfirmPassword">Photo</label>
                <input class="form-control" type="file" name="myimage" required>
              </div>
              </div>
              <div class="form-row">
              <p>
              <label for="description">Description</label><br />
              <textarea name="description" id="description"></textarea>
</p>
              </div>
            
         
          <input class="form-control" type="submit" name="ajouter" value="ajouter">
        </form>
       
      
    </div>
      
    </div>
	