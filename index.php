<?php
/*Project 3 Foodtruck for ITC250 SP18 by Veda Elon, Lori Mahieu, Scott Allen
*/

//Initializing Variables
$Total=0;
$ItemSubtotal=0;
$Extraquantity=0;
$ExtraSubtotal=0;
$TaxRate=.096;
$Tax=0;

$myItem = new Item(0,'Coffee','Served Hot and Fresh!',3.99,0);
$myItem->addExtra('Cream');
$myItem->addExtra('Sugar');

$items[] = $myItem;

$myItem = new Item(1,'Burger','Made from real cows!',6.99,0);
$myItem->addExtra('Cheese');
$myItem->addExtra('Bacon');
$myItem->addExtra('Fries');

$items[] = $myItem;

$myItem = new Item(2,'Pie','Damn fine cherry pie!',2.99,0);
$myItem->addExtra('Whipped Cream');
$myItem->addExtra('Ice Cream');

$items[] = $myItem;

class Item{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Quantity = 0;
    public $Extraname = array();
    public $Extraprice = array();
    public $Extraquantity = array();
    public function __construct($ID, $Name, $Description, $Price, $Quantity){
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        $this->Quantity = $Quantity;
    }#end Item constructor
    public function addExtra($Extraname, $Extraprice, $Extraquantity){
        $this->Extranames[] = $Extraname;
    }#end addExtra()
}#end Item class

if(isset($_POST['submit'])){
    foreach($items as $item){
    $item->Quantity = (int)$_POST[$item->Name];
        foreach($item->Extranames as $Extraname){
            $Extraquantity += (int)$_POST[$Extraname];            
        }
    }
    echo "Here is your cart:";
    foreach($items as $item){
        echo "<p>You ordered $item->Quantity $item->Name(s) at a price of $$item->Price each.</p>";
        $ItemSubtotal += $item->Quantity * $item->Price;
    }
    echo "<p>You added $Extraquantity extras to your order at $0.49 each.</p>";
    $ExtraSubtotal = $Extraquantity * 0.49;

    $Tax = ($ItemSubtotal + $ExtraSubtotal) * $TaxRate;
    $Total = $ItemSubtotal + $ExtraSubtotal + $Tax;
    echo "<p>The subtotal for your items is $";
    echo number_format($ItemSubtotal, 2);
    echo "</p>";
    echo "<p>The subtotal for your extras is $";
    echo number_format($ExtraSubtotal, 2);
    echo "</p>";
    echo "<p>The tax for your order is $";
    echo number_format($Tax, 2);
    echo "</p>";
    echo "<p>The total for your order is $";
    echo number_format($Total, 2);
    echo "</p>";    
}else{
    echo '
    <h1>Food Truck</h1>
    <form action="" method="post">
    ';
    foreach($items as $item){
        echo "
        <p>$item->Name \"$item->Description\" each costs $$item->Price.  How many would you like? <input type=\"number\" name=\"$item->Name\"></p>
        ";
        foreach($item->Extranames as $Extraname){
            echo "
            <p>$Extraname is available for an extra $0.49. How many would you like? <input type=\"number\" name=\"$Extraname\"></p>  
            ";
            }
    }
    echo '
    <p>
    <input type="submit" name="submit" value="submit" />
    </p>
    </form>
    ';
}
?>

