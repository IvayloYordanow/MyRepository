<?PHP
$pagetitle='Expenses Table';
include 'header.php';
require 'Array.php';

    
?>
<form method="POST">
        
           <div>
           <select name="groups">
               <?php
               
               if(isset ($_POST["groups"])){
                   $groups=$_POST["groups"];
                   
               }
               
               else {
                   
                  $groups=''; 
                   
               }
               
               foreach ($Type as $key=> $value)
                   {
                   if($key ==$groups ){
                       $selected='selected';
                   }
                   else {
                       $selected='';
                   }
                   
                   
                   
                  echo '<option '. $selected. ' value= "'.$key.'">'.$value.'</option>';
               }
               
               ?> 
           </select>
               <input type="submit" value="Filter"/>
            
          </div>
    </form>
    <br>
   

        <a href="form.php">Expenses</a>

        <table border="1">
            <tr>
                <td>Date</td>
                <td>Name</td>
                <td>Expenses</td>
                <td>Group</td> 
            </tr>
            
            
            <?php
            $sum=0;
            if(file_exists('data.txt')){
                
                $result=  file('data.txt');
             
                foreach ($result as $value) {
                                 $columns=  explode('!', $value);
                
                 
                                 if (isset($_POST['groups'])) {
                                             $group = $_POST['groups'];
                                             
                                 }
                                   else {
                                       $group=-1;
                                   }
                                   
                                  if ($group ==-1||$group==trim($columns[3]) ){
                                               echo '<tr>
                                                <td>'.$columns[0].'</td>
                                                 <td>'.$columns[1].'</td>
                                                 <td>'.$columns[2].'</td>
                                                 <td>'.$Type[trim($columns[3])].'</td>    
                                                 </tr>';
      $sum+= (float)$columns[2];
                                     }   
                                     
               }
          }
  
  

?>
                    
         	<tr>
<td>  </td>
<td>  </td>
<td><?php echo $sum ?></td>
<td>  </td>
</tr>         
            
            
        </table>
    <?PHP
include 'footer.php';
?>
