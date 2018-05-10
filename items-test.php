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
$extras_total = 0;

foreach($items as $item){
  $total += $item->Price;
  echo '<p>';
  echo "$item->Name $total ";
  echo '</p>';
    foreach($item->Extranames as $extraname){
      echo '<p>';
      echo "$extraname ";
      echo '</p>';
    }
    foreach($item->Extraprices as $extraprice){
      $extras_total += $extraprice;
      echo '<p>';
      echo "$extras_total ";
      echo '</p>';
    }
}

echo "The subtotal for your items is $total and the subtotal for your extras is $extras_total";

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


