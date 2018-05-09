<?php
class Item{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;

    public function __construct($ID,$Name,$Description,$Price){
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;

    }#end Item constructor
}#end Item class

class Extra{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;

    public function __construct($ID,$Name,$Description,$Price){
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;

    }#end Item constructor
}#end Item class

?>
