<?php
/*Project 3 Foodtruck for ITC250 SP18 by Veda Elon, Lori Mahieu, Scott Allen
TODO: 1) create a function that multiplies item->quantity by item->price to create $ItemSubtotal, multiplies Extraquantites by $PriceOfExtras to create $ExtraSubtotal, then adds ($ItemSubtotal + $ExtraSubtotal)*$Tax to get $Total
2)Change the name of the input boxes so that the value is saved
*/

//Initializing Variables
$PriceOfExtras=1.00;  //Global price for each extra
$Total=0;
$ItemSubtotal=0;
$ExtraSubtotal=0;
$TaxRate=.096;
$Tax=0;

$myItem = new Item(0,'Coffee','Served Hot and Fresh!',3.99,0);
$myItem->addExtra('Cream', 0);
$myItem->addExtra('Sugar', 0);

$items[] = $myItem;

$myItem = new Item(1,'Burger','Made from real cows!',6.99,0);
$myItem->addExtra('Cheese', 0);
$myItem->addExtra('Bacon', 0);
$myItem->addExtra('Fries', 0);

$items[] = $myItem;

$myItem = new Item(2,'Pie','Damn fine cherry pie!',2.99,0);
$myItem->addExtra('Whipped Cream', 0);
$myItem->addExtra('Ice Cream', 0);

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

if(isset($_POST['submit'])){
    //Needs to be fixed, currently item->Quantity is not showing up
    echo "Here is your cart:";
    foreach($items as $item){
        echo "<p>You ordered $item->Quantity $item->Name(s) at a price of $item->Price each.<br>";
        echo "<p>You also ordered $Extraquantity extras for your $item->Name at a price of $$PriceOfExtras each<br>";
        $ItemSubtotal += $ItemSubtotal->Price;
        $ExtraSubtotal += $Extraquantity;
    }
    $Tax=[$ItemSubtotal + $ExtraSubtotal]*$TaxRate;
    $Total=$ItemSubtotal + $ExtraSubtotal + $Tax;
    echo "<p>The subtotal for your items is $ItemSubtotal<br>";
    echo "The subtotal for your extras is $ExtraSubtotal<br>";
    echo "Tax for your order is $Tax<br>";
    echo "The total for your order is $Total</p>";
     
}else{
    echo '
      <h1>Food Truck</h1>
        <form action="" method="post">
    ';
          foreach($items as $item){  //I think the name in the input box needs to be changed to something like $item->Quantity
              echo "
              <p>$item->Name \"$item->Description\" each costs $$item->Price.  How many would you like? <input type=\"number\" name=\"quantity\">";
              foreach($item->Extranames as $Extraname){ //I think the name in the input box needs to be changed to something like $Extraquantity
                echo "
                <br>$Extraname is available for an extra $$PriceOfExtras.  How many would you like? <input type=\"number\" name=\"quantity\">  
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

