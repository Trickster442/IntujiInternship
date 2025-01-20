<!--  Variable -->
<?php 
/**
 * To create a variable
 * '$' sign
 * Followed by the name of the variable
 * Use quotes for String
 */
$name = "Sandip";

echo "My name is $name";


#global scope
#variable declared outside function has global scope and can only be accessed from outside
$x = 5; // global scope
function myTest() {
  // using x inside this function will generate an error
  // you  can use global keyword to access global variable inside a function
  global $x;
  echo "<p>Variable x inside function is: $x</p>";
}
myTest();

function myTest2() {
    $y = 5; // local scope
    echo "<p>Variable y inside function is: $y</p>";
  }
  myTest2();
  
  // using x outside the function will generate an error
  echo "<p>Variable y outside function is: $y</p>";

  function myTest3() {
    static $z = 0;
    echo $z;
    $z++;
  }
  
  myTest3(); 
  myTest3();
  myTest3();
?>

<!-- Constants -->
<?php


?>