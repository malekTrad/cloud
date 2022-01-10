<?php 

include "dbconnect.php";
$op= $_POST['op'];
if($op=="add_comment"){
  
 $name= mysqli_real_escape_string($connect,trim($_POST['name']));
 $message= mysqli_real_escape_string($connect,trim($_POST['message']));
 $s = "insert INTO `sec`.`comments`(`Name`,`message`)VALUES ('$name','$message')";
 $r = mysqli_query($connect, $s);
 if ($r) { ?>
     <script type="text/javascript">
         //alert("yes ");
     </script>
     <?php
 } else {
     ?>
     <script type="text/javascript">
         //alert("non ");
     </script>
     <?php
 }
}
  if ($op=="refresh_table"){ 
    $s = "select * from comments";
    $r = mysqli_query($connect, $s);
   while( $fetsh=mysqli_fetch_array($r)){
     ?>
    <tr>
    
    <td><?=htmlspecialchars(trim($fetsh['Name']));?></td>
    <td><?=htmlspecialchars(trim($fetsh['message']));?></td>

<?php
 }}
 /*
 on peut utiliser d'autre méthodes 
 
    <td><?=stripslashes($fetsh['Name']);?></td>
    <td><?=stripslashes($fetsh['message']);?></td>
    
    ou

    <td><?=mysqli_real_escape_string($connect,trim($fetsh['Name']));?></td>
    <td><?=mysqli_real_escape_string($connect,trim($fetsh['message']));?></td>

    </tr>*/

?>