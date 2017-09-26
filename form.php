<?php 
//links me to my database
//db stands for database name 
try{
$db  = new PDO('mysql:dbname=iRosario_Challenges;host=localhost', 'r2hstudent','SbFaGzNgGIE8kfP' );
 echo "connected to database";
} catch(Exception $e){
  echo "unable to connect";
  exit;
}

try {
 $results = $db->query("SELECT * FROM States" );

} catch (Exception $e){
    echo "Bad query";
    exit;
}

 $myStates = $results->fetchAll(PDO::FETCH_ASSOC);

?>
<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<meta name="viewport" content="width=device-width">
<title>Form Processing</title>


</head>
<body>
  <h1>States</h1>
  <form action="#" method="post"> 
   <input type="hidden" name="hiddenValue" value="its a secret" />
   <select>
    <?php  foreach($myStates as $state ){
             $stateName = $state[State];
             echo "<option value=$stateName>$stateName</option>";
          }
    ?>
   </select>
    <div>
     <input type="submit" value="Submit" name="submit" /> 
    </div>
  </form> 
</body>
</html>
