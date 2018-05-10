<?php

class Item{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extraname = array();
    public $Extraprice = array();
    public function __construct($ID,$Name,$Description,$Price){
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
    }#end Item constructor
    public function addExtra($Extraname, $Extraprice){
        $this->Extranames[] = $Extraname;
        $this->Extraprices[] = $Extraprice;
    }#end addExtra()
}#end Item class

?>
