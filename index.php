<?php
if(isset($_POST['total'])){
  echo "string";
}elseif (isset($_POST['submit'])) {
    $coffies = (int)$_POST['coffies'];
    $burgers = (int)$_POST['burgers'];
    $pies = (int)$_POST['pies'];
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
    $coffies = (int)$_POST['coffies'];
    $burgers = (int)$_POST['burgers'];
    $pies = (int)$_POST['pies'];
    echo '
      <h1>Food Truck</h1>
        <form action="" method="post">
          <p>Beverage</p>
          <p>
            Coffee - Medium Roast Organic - $3.00
            <select name="coffies">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </p>
          <br>
          <p>Food</p>
          <p>
            Burger - Non-GMO Beef & Organic Wholewheat Buns. - $5.00
            <select name="burgers">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </p>
          <br>
          <p>Desert</p>
          <p>
            Pie - All Organic Apple - $4.00
            <select name="pies">
              <option value="0">0</option>
              <option value="1">1</option>
              <option value="2">2</option>
              <option value="3">3</option>
              <option value="4">4</option>
            </select>
          </p>
          <br>
      ';
        echo '
        <p>
            <input type="submit" name="submit" value="submit" />
        </p>
    </form>
    ';
}
?>
