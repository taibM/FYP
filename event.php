<?php

class event
{
    public $id_event;
    public $nom;
    public $code;
    public $date;
    public $lieu; 
    
    


    function __construct($îd_event,$nom,$code,$date,$lieu)
    {
        
        $this->id_event=$id_event;
        $this->nom=$nom;
        $this->code=$code;
        $this->date=$date;
        $this->lieu=$lieu;

    }

    function getid_event()
    {return $this->id_event;}
    function getnom()
    {return $this->nom;}
    function getcode()
    {return $this->code;}
    function getdate()
    {return $this->date;}
    function getlieu()
    {return $this->lieu;}
     

    function setnom($nom)
    { $this->nom=$nom;}
    function setcode($code)
    {$this->code=$code;}
    function setdate($date)
    {$this->date=$date;}
    function setlieu($lieu)
    { $this->lieu=$lieu;}
}








?>