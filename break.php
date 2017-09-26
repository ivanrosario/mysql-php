<?php
try{
$db  = new PDO('mysql:dbname=iRosario_Challenges;host=localhost', 'r2hstudent','SbFaGzNgGIE8kfP' );
} catch(Exception $e){
  echo "unable to connect";
  exit;
}
//tells us what color the user wants 
$userColor = $_POST[colors];

try {
 $results = $db->query("SELECT * FROM Products  ");

} catch (Exception $e){
    echo "Bad query";
    exit;
}

 $Products = $results->fetchAll(PDO::FETCH_ASSOC);

//when submitted we want to see results 
 if(isset($_POST['submit'])  == 'Submit') {
   try{
    $filters =  $db->query("SELECT * FROM Products WHERE color = '{$userColor}' ");
     
   }catch(Exception $e){
    echo "Bad query";
    exit;
   }
    $filters->execute();
    $search = $filters->fetchAll(PDO::FETCH_ASSOC);
  
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

  <select id="colors" name="colors" value="" >
    <?php  
        foreach($Products as $Product){
           $colorName = $Product[color];
           echo "<option value='$colorName' ' >$colorName</option>";
          }
      ?>
   </select>
    <div>
   <input type="submit" value="Submit" name="submit" /> 
    </div>
  </form> 
  <div>
   <?php  
     if(isset($_POST['submit'])  == 'Submit') {
      foreach($search as $found){      
         echo "<li>$found[name] </li>";
       }
     }
   ?>
  </div>
</body>
</html>