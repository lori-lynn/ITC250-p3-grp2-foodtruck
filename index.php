<?php
if(isset($_POST['submit'])){
  //variables
  $fromScale = $_POST['fromScale'];
  $preTemp = (float)$_POST['preTemp'];
  $toScale = $_POST['toScale'];
  $postTemp = $preTemp;
  //Conversions
  if($fromScale == 'F' && $toScale == 'C'){
    $postTemp = 5 / 9 * ($preTemp - 32);
  }elseif($fromScale == 'F' && $toScale == 'K'){
    $postTemp = 5 / 9 * ($preTemp - 32) + 273;
  }elseif($fromScale == 'C' && $toScale == 'F'){
    $postTemp = 9 / 5 * ($preTemp) + 32;
  }elseif($fromScale == 'C' && $toScale == 'K'){
    $postTemp = $preTemp + 273;
  }elseif($fromScale == 'K' && $toScale == 'F'){
    $postTemp = 9 / 5 * ($preTemp - 273) + 32;
  }elseif($fromScale == 'K' && $toScale == 'C'){
    $postTemp = $preTemp - 273;
  }else{
    $postTemp = $preTemp;
  }
    //page
    echo '
    <h1>Temperature Converter</h1>
    <form action="" method="post">
        <p>Select scale to convert from:</p>
        <label>
            <select name="fromScale">
                <option value="">Please select a scale</option>
                <option value="K">Kelvin</option>
                <option value="C">Celsius</option>
                <option value="F">Fahrenheit</option>
            </select>
        </label>
    </p>
    <p>
        <p>Enter value to convert:</p>
        <label>
        <input type="number" name="preTemp" min="−459.67" max="10000" />
        </label>
    </p>
    </p>
    <p>Select scale to convert to:</p>
        <label>
            <select name="toScale">
                <option value="">Please select a scale</option>
                <option value="K">Kelvin</option>
                <option value="C">Celsius</option>
                <option value="F">Fahrenheit</option>
            </select>
        </label>
    </p>
    <p>
        <input type="submit" name="submit" value="submit" />
    </p>
    </form>
    ';
    //output overly complecated
    if(($fromScale == 'F' && $preTemp < -459.67) || ($fromScale == 'C' && $preTemp < -273.15) || ($fromScale == 'K' && $preTemp < 0)){
      echo '<h2>';
      echo round($preTemp, 2);
      echo '&deg';
      echo $fromScale;
      echo ' is below absolute zero.';
      echo '</h2>';
    }else {
      echo '<h2>';
      echo round($preTemp, 2);
      echo '&deg';
      echo $fromScale;
      echo ' = ';
      echo round($postTemp, 2);
      echo '&deg';
      echo $toScale;
      echo '</h2>';
    }
}else{
    echo '
    <h1>Temperature Converter</h1>
    <form action="" method="post">
        <p>Select scale to convert from:</p>
        <label>
            <select name="fromScale">
                <option value="">Please select a scale</option>
                <option value="K">Kelvin</option>
                <option value="C">Celsius</option>
                <option value="F">Fahrenheit</option>
            </select>
        </label>
    </p>
    <p>
        <p>Enter value to convert:</p>
        <label>
        <input type="number" name="preTemp" min="−459.67" max="10000" />
        </label>
    </p>
    </p>
    <p>Select scale to convert to:</p>
        <label>
            <select name="toScale">
                <option value="">Please select a scale</option>
                <option value="K">Kelvin</option>
                <option value="C">Celsius</option>
                <option value="F">Fahrenheit</option>
            </select>
        </label>
    </p>
    <p>
        <input type="submit" name="submit" value="submit" />
    </p>
    </form>
    ';
}
?>
