<?php

$myItem = new Item(1,'Taco','Our Tacos Are Awesome!', 3.99);
$myItem->addExtra('Sour Cream', .49);
$myItem->addExtra('Salsa', .49);
$myItem->addExtra('Guacamole', .99);
$myItem->addExtra('Cheese', .99);

$items[] = $myItem;

$myItem = new Item(2,'Salad','Our Salads Are Awesome!', 6.99);
$myItem->addExtra('Avacado', 1.99);
$myItem->addExtra('Black Beans', .99);
$myItem->addExtra('Cheese', .99);

$items[] = $myItem;

$myItem = new Item(2,'Sunday','Our Sundays Are Awesome!', 2.99);
$myItem->addExtra('Hot Fudge', .19);
$myItem->addExtra('Nuts', .49);
$myItem->addExtra('Whipped Cream', .19);
$myItem->addExtra('Cherries', .49);

$items[] = $myItem;

$total = 0;
$toppings_total = 0;
foreach($items as $item){
    $total += $item->Price;
    foreach($item->Extras as $extra){
            $topping_total += $extra->$Extraprice;
    }
}

echo "The subtotal for your items is $total and the subtotal for your extras is $topping_total";

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

    public function addExtra($Extra, $Extraprice)
    {
        $this->Extras[] = $Extra;
        $this->Extrasprice[] = $Extraprice;
    }#end addExtra()
}#end Item class

?>
