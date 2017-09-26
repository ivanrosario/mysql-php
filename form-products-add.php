<?php 

try{
$db  = new PDO("mysql:dbname=iRosario_Challenges;host=localhost", 'r2hstudent','SbFaGzNgGIE8kfP' );
 echo "connected to database";
} catch(Exception $e){
  echo "unable to connect";
  exit;
}

 

if(isset($_POST['submit'])  == 'Submit') {
        try {
      $query = "INSERT INTO `Products` ( name, description, price, color, bootID) ";
      $query .= "VALUES( :name, :description, :price, :color,  NULL)";
      $stmt = $db->prepare($query);
      $stmt->execute(array(
                ':name'=>$_POST['name'],
                ':description'=>$_POST['description'],
                ':price'=>$_POST['price'],
                ':color'=>$_POST['color'],
      ));
        } catch (Exception $e) {
      echo $e->getMessage();
        }
}

?>


<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Form Processing</title>
</head>
<body>
  <h1>Products</h1>
  <form action="#" method="POST"> 
    <div>
      <label for="Product">Product: <input type="text" value="" id="Product" name="name" /></label>
    </div>
    <div>
      <label for="Product">Description: <input type="text" value="" id="description" name="description" /></label>
    </div>
    <div>
      <label for="Product">Price: <input type="text" value="" id="Price" name="price" /></label>
    </div>
    <div>
      <label for="Product">Color: <input type="text" value="" id="Color" name="color" /></label>
    </div>
    <div>
   <input type="submit" value="Submit" name="submit" /> 
    </div>
  </form> 
</body>
</html>