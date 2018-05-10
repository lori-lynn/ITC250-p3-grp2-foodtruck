<?php
/*
$myItem = new Item(1,'Coffee','Good Coffee.',3.00);
$myItem->addExtra('Cream', .25);
$myItem->addExtra('Sugar', .25);

$items[] = $myItem;

$myItem = new Item(2,'Burger','Good Burger.',6.99);
$myItem->addExtra('Cheese', .75);
$myItem->addExtra('Bacon', .75);
$myItem->addExtra('Fries', 2.00);

$items[] = $myItem;

$myItem = new Item(2,'Pie','Good Pie.',2.99);
$myItem->addExtra('Whipped Cream', .50);
$myItem->addExtra('Ice Cream', 1.00);

$items[] = $myItem;

$total = 0;
$toppings_total = 0;
foreach($items as $item){
    $total += $item->Price;
    foreach($item->Extras as $Extra){
            $extras_total += $Extra->$Extras_price;
    }
}

echo "The subtotal for your items is $total and the subtotal for your extras is $topping_total";
*/
class Item
{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Extras_price = 0;

    public function __construct($ID,$Name,$Description,$Price)
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;

    }#end Item constructor

    public function addExtra($Extra,$Extras_price)
    {
        $this->Extra = $Extra;
        $this->Price = $Extras_price;

    }#end addExtra()

}#end Item class

?>
