<?php
   include 'db.php'

   $spl = "UPDATE INTO employees
      (name ,email,phone,department)VALUE(barath,barath@gmail.com,7845123659,physics)";

if(mysqli_query($conn, $sql)){
    echo"student data insert successfulyy
    }else{
        echo"error:" mysqli_error($conn);
}
        mysqli-close($conn);

?>
       
