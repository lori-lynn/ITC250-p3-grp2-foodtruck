<?php
/*Project 3 Foodtruck for ITC250 SP18 by Veda Elon, Lori Mahieu, Scott Allen
TODO: 1) create a function that multiplies item->quantity by item->price to create $ItemSubtotal, multiplies Extraquantites by $PriceOfExtras to create $ExtraSubtotal, then adds ($ItemSubtotal + $ExtraSubtotal)*$Tax to get $Total
*/

//Initializing Variables
$PriceOfExtras=1;  //Global price for each extra
$Total=0;
$ItemSubtotal=0;
$ExtraSubtotal=0;
$Tax=.096;

$myItem = new Item(1,'Coffee','Good Coffee.',3.99);
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

class Item{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Quantity = 0;
    public $Extraname = array();
    public $Extraquantity = array();
    public function __construct($ID,$Name,$Description,$Price,$Quantity){
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        $this->Quantity = $Quantity;
    }#end Item constructor
    public function addExtra($Extraname, $Extraquantity){
        $this->Extranames[] = $Extraname;
        $this->Extraquantities[] = $Extraquantity;
    }#end addExtra()
}#end Item class

if(isset($_POST['total'])){
    echo "Here is where the item prices are tallied up";
    /*
    See TODO 1
    */
}
else{
    echo '
      <h1>Food Truck</h1>
        <form action="" method="post">
    ';
          foreach($items as $item){
              echo "
              <p>$item->Name $item->Description each costs $$item->Price.<br>  How many would you like? <input type=\"number\" name=\"quantity\"></p>
              ";
              foreach($item->Extranames as $Extraname){
                echo "
                <p>$Extraname add $0.99 <br>  How many would you like? <input type=\"number\" name=\"quantity\"></p>
                ";
              }
          }
          /*echo '<pre>';
          var_dump($items);
          echo '</pre>';*/
        echo '
        <p>
            <input type="submit" name="submit" value="submit" />
        </p>
    </form>
    ';
}
?>

