<?php

$myItem = new Item(1,'Taco','Our Tacos Are Awesome!',3.99);
$myItem->addExtra('Sour Cream');
$myItem->addExtra('Salsa');
$myItem->addExtra('Guacamole');
$myItem->addExtra('Cheese');
$myItem->addExtra('Hot Sauce');

$items[] = $myItem;

$myItem = new Item(2,'Salad','Our Salads Are Awesome!',6.99);
$myItem->addExtra('Avacado');
$myItem->addExtra('Black Beans');
$myItem->addExtra('Cheese');
$myItem->addExtra('Ranch');
$myItem->addExtra('Vinagrette');

$items[] = $myItem;

$myItem = new Item(2,'Sunday','Our Sundays Are Awesome!',2.99);
$myItem->addExtra('Hot Fudge');
$myItem->addExtra('Nuts');
$myItem->addExtra('Whipped Cream');
$myItem->addExtra('Cherries');
$myItem->addExtra('Caramel');

$items[] = $myItem;

$total = 0;
$toppings_total = 0;
foreach($items as $item){
    $total += $item->Price;
    foreach($item->Extras as $extra){
            $topping_total += .25;        
    }
}

echo "The subtotal for your items is $total and the subtotal for your extras is $topping_total";

/*
echo '<pre>';
var_dump($items);
echo '/pre';
*/

class Item
{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extras = array();
    
    public function __construct($ID,$Name,$Description,$Price)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        
    }#end Item constructor
    
    public function addExtra($extra)
    {
        $this->Extras[] = $extra;
        
    }#end addExtra()

}#end Item class

?>
