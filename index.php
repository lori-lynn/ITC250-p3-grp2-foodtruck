<?php
/*Project 3 Foodtruck for ITC250 SP18 by Veda Elon, Lori Mahieu, Scott Allen

*/

#include items.php;
/*$coffies = (int)$_POST['coffies'];
$burgers = (int)$_POST['burgers'];
$pies = (int)$_POST['pies'];
$cream = (int)$_POST['cream'];
$sugar = (int)$_POST['sugar'];
$cheese = (int)$_POST['cheese'];
$bacon = (int)$_POST['bacon'];
$fries = (int)$_POST['fries'];
$wcream = (int)$_POST['wcream'];
$icream = (int)$_POST['icream'];
*/
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

if(isset($_POST['total'])){
  $cream = (bool)$_POST['cream'];
  echo "string";


}elseif (isset($_POST['submit'])) {
    echo '
      <h1>Food Truck</h1>
      <form action="" method="post">
    ';
    for ($x = 1; $x <= $coffies; $x++) {
      echo "
        <p>Coffee $x add</p>
        ";
      echo '
        <input type="checkbox" name="cream" value="cream">Cream - $0.25<br>
        <input type="checkbox" name="sugar" value="sugar">Sugar - $0.25<br>
      ';
    }
    for ($x = 1; $x <= $burgers; $x++) {
      echo "
        <p>Burger $x add</p>
      ";
      echo '
        <input type="checkbox" name="cheese" value="cheese">Cheese - $0.75<br>
        <input type="checkbox" name="bacon" value="bacon">Bacon - $0.75<br>
        <input type="checkbox" name="fries" value="fries">Fries - $3.00<br>
      ';
    }
    for ($x = 1; $x <= $pies; $x++) {
      echo "
        <p>Pie $x add</p>
      ";
      echo '
        <input type="checkbox" name="wcream" value="wcream">Whipped Cream - $0.50<br>
        <input type="checkbox" name="icream" value="icream">Ice Cream - $1.00<br>
      ';
    }
      echo '
        <p>
            <input type="submit" name="total" value="total" />
        </p>
    </form>
    ';
}else{
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

