<?php
/*Project 3 Foodtruck for ITC250 SP18 by Veda Elon, Lori Mahieu, Scott Allen
*/

//--- INITIALIZE VARIABLES ---
$Total = 0;
$ItemSubtotal = 0;
$Extraquantity = 0;
$ExtraSubtotal = 0;
$TaxRate = .096;
$Tax = 0;
$itemsSubtotal = 0; 

// --- ADD ITEMS ---
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
$myItem->addExtra('Whip');
$myItem->addExtra('IceCream');
$items[] = $myItem;

// --- BEGIN ITEM CLASS ---
class Item 
{
    public $ID = 0;
    public $Name = '';
    public $Description = '';
    public $Price = 0;
    public $Quantity = 0;
    public $Extraname = array();
    public $Extraprice = array();
    public $Extraquantity = array();
    public function __construct($ID, $Name, $Description, $Price, $Quantity) 
    {
        $this->ID = $ID;
        $this->Name = $Name;
        $this->Description = $Description;
        $this->Price = $Price;
        $this->Quantity = $Quantity;
    } // --- END ITEM CONSTRUCTOR ---
    public function addExtra($Extraname)
    {
        $this->Extranames[] = $Extraname;   
    } // --- END ADDEXTRA FUNCTION ---
}// --- END ITEM CLASS ---
if(isset($_POST['submit'])) {   
    foreach($items as $item) {      
    $item->Quantity += (int)$_POST[$item->Name]; 
        foreach($item->Extranames as $Extraname) {
            $Extraquantity += (int)$_POST[$Extraname];            
        }
    }
    $ExtraSubtotal = $Extraquantity * 0.49;
    // --- CREATING A TABLE TO DISPLAY PURCHASED ITEMS ---
    echo " 
    <div>
        <h2>Here is your cart:</h2>
        <table class=\"order-detail\">
        <tr>
            <th>Item Ordered</th>
            <th class=\"number\">Qty</th>
            <th class=\"number\">Item Price</th>
            <th class=\"number\">Item Subtotal</th>    
        </tr>";
        foreach ($items as $item) { // --- CREATES A LOOP THAT DISPLAYS ITEMS ORDERED IN A TABLE ---
            if ($item->Quantity > 0) {
                $itemSubtotal = $item->Price * $item->Quantity;
                $itemsSubtotal += $itemSubtotal;
            echo "
                <tr>
                    <td>$item->Name</td>
                    <td class=\"number\">$item->Quantity</td>
                    <td class=\"number\">$item->Price</td>
                    <td class=\"number\">$$itemSubtotal</td>  
                </tr>
                ";   
            } else {
            echo ''; // --- DISPLAYS NOTHING IF AN ITEM IS NOT PURCHASED
            }   
        }
        echo "
        <tr>
                    <td>Extras</td>
                    <td class=\"number\">$Extraquantity</td>
                    <td class=\"number\">.49</td>
                    <td class=\"number\">$$ExtraSubtotal</td>
                </tr>
        </table>
        ";

    
    
    //---- CODE ABOVE IS BASED ON THIS CODE BELOW ----
    // foreach($items as $item) {
    //     if ($item->Quantity > 0) {
    //     echo "<p>You ordered $item->Quantity $item->Name(s) at a price of $$item->Price each.</p>";
    //     $ItemSubtotal += $item->Quantity * $item->Price;
    //     } else {
    //         echo '';
    //     }
    // }
    // echo "<p>You added $Extraquantity extras to your order at $0.49 each.</p>";
    $itemsSubtotal += $ExtraSubtotal;
    $Tax = $itemsSubtotal * $TaxRate;
    $Total = $itemsSubtotal + $Tax;
    $Tax = number_format($Tax, 2);
    $Total = number_format($Total, 2);
    echo "<table class=\"order-total\">
        <tr>
            <td>Subtotal</td>
            <td class=\"number\">$$itemsSubtotal</td>
        </tr>
        <tr>
            <td>Tax</td>
            <td class=\"number\">$$Tax</td>
        </tr>
        <tr>
            <td>Total</td>
            <td class=\"number\">$$Total</td>
        </tr>
        </table>
        </div>
    ";
    // ---- SOURCE CODE FOR ABOVE TABLE ---
    // echo '<table>';
    // echo "<p>The subtotal for your items is $";
    // echo number_format($itemsSubtotal, 2);
    // echo "</p>";
    // echo "<p>The subtotal for your extras is $";
    // echo number_format($ExtraSubtotal, 2);
    // echo "</p>";
    // echo "<p>The tax for your order is $";
    // echo number_format($Tax, 2);
    // echo "</p>";
    // echo "<p>The total for your order is $";
    // echo number_format($Total, 2);
    // echo "</p>"; 
    // echo '</table>';
} else {
    echo '
    <form action="" method="post">
    <div>
    ';
            /// ---- CREATED FIELDSETS AND LABEL FORS TO DISPLAY "ORDER PAGE" ----
        foreach($items as $item) {
            echo "
            <fieldset>
            <p> $item->Name is $$item->Price.</p>
            <p>Description: $item->Description</p>
            <p><label for=\"$item->Name\">Qty: </label>
            <input type=\"number\" name=\"$item->Name\"><p>
            ";
            echo " <p>Extras available for $ .49: </p>";
            foreach ($item->Extranames as $Extraname) {
                echo " 
                   <p><label for=\"$Extraname\">$Extraname </label>
                    <input type=\"number\" name=\"$Extraname\"></p>
                ";
            }
            echo "</fieldset>";
        }
        //---- CODE ABOVE BASED ON THE CODE BELOW ----
    //     foreach($items as $item) {
    //         echo "
    //     <p>$item->Name \"$item->Description\" each costs $$item->Price.  How many would you like? <input type=\"number\" name=\"$item->Name\"></p>
    //     ";
    //     foreach($item->Extranames as $Extraname) {
    //         echo "
    //         <p>$Extraname is available for an extra $0.49. How many would you like? <input type=\"number\" name=\"$Extraname\"></p>  
    //         ";
    //         }
    // }
    echo '
    <p>
    <input type="submit" name="submit" value="submit" id="submit"/>
    </p>
    </form>
    </div>
    ';
}
?>
