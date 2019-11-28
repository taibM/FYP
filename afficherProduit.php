<!-- <?php ?> -->
  <div class="content-wrapper">
    <div class="container-fluid">
      <!-- Example DataTables Card-->
      <div class="card mb-3">
        <div class="card-header">
         
        <div class="card-body">
           
          <div class="table-responsive">

            <table class="table table-bordered" id="dataTable" name="dataTable" width="100%" cellspacing="0">
              <thead>
                <tr>
                  <th>referance</th>
                  <th>nom</th>
                  <th>prix</th>
				  <th>quantite</th>
          <th>image</th>
         <th> description </th>
				  <th>Modification</th>
                  <th>Suppression</th>
                   
					

                </tr>
              </thead>
              
              <tbody>
              <?php
             include "../entities/produit.php";
			 require '../core/produitC.php';




			$prod=new ProduitC();
			$liste1=$prod->afficherUnProduit();
              foreach ($liste1 as $emp) {

              ?>
              <tr>
      <td><?php echo $emp['referance']; ?></td>
      <td><?php echo $emp['nom']; ?></td>
      <td><?php echo $emp['prix']; ?></td>
    <td><?php echo $emp['quantite']; ?></td>
    <td><img src="<?php echo $emp['img']; ?>" width="20%" alt=""></td>
    <td><?php echo $emp['description']; ?></td>

	  <td><a href="modifierProduit.php?referance=<?PHP echo $emp['referance']; ?>">Modifier</a></td>
	  <td><a href="supprimerProduit.php?referance=<?PHP echo $emp['referance']; ?>">supprimer</a></td>

    </tr>
			 
                  <?php
              }
              ?>
              </tbody>

            </table>
          </div>
        </div>
            </div>
      </div>
      </div>
    </div>
	<?php?>
    