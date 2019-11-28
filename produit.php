<?php
class Produit{
	private $referance;
	private $nom;
	private $prix;
	private $quantite;
	private $img;
	private $description;
	public function __construct($referance,$nom,$prix,$quantite,$img,$description)/*on peut avoir q'un sel constructeur*/ 
	{
		$this->referance=$referance;
        $this->nom=$nom;
	    $this->prix=$prix;
        $this->quantite=$quantite;
		$this->img=$img;
		$this->description=$description;
	}
	public function getRef(){return $this->referance ;}
	public function getNom(){return $this->nom ;}
	public function getPrix(){return $this->prix ;}
	public function getQuant(){return $this->quantite ;}
	public function getImg(){return $this->img ;}
	public function getDescription(){return $this->description ;}


	public function setRef($referance){$this->referance=$referance;}
	public function setNom($nom){$this->nom=$nom;}
	public function setPrix($prix){$this->prix=$prix;}
	public function setQuant($quantite){$this->quantite=$quantite;}
	public function setImg($img){$this->img=$img;}
	public function setDescription($description){$this->description=$description;}
	}
	?>