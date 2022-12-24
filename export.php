<?php 
    $conn=mysqli_connect('localhost','root','','user_db');

 $query=mysqli_query($conn,"SELECT * FROM `user_form` ");
 $data ="
 <table>
 <thead>
 <tr>
 <th>first_name</th>
 <th>last_name</th>
 <th>email</th>
 <th>password</th>
 <th>address</th>
 <th>gender</th>
 <th>user_type</th>
 </tr>
 </thead>
 <tbody>
 ";
 while($row=mysqli_fetch_assoc($query))
 {
     $data.="
     <tr>
 <th>$row[first_name]</th>
 <th>$row[last_name]</th>
 <th>$row[email]</th>
 <th>$row[password]</th>
 <th>$row[address]</th>
 <th>$row[gender]</th>
 <th>$row[user_type]</th>
 </tr>
";
 }
 $data.="
 </tbody>
 </table>
 ";
 $filename = "Export_excel.xls";
 header("Content-Type: application/vnd.ms-excel");
 header("Content-Disposition: attachment; filename=\"$filename\"");
 echo $data;
?>