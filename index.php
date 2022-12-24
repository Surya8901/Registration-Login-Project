<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <style>
        *{
            padding: 0 20px;
        }
        table, th ,td{
            border:2px solid black;
            border-collapse: collapse;
            padding: 10px 25px;
            margin-left: auto;
            margin-right: auto;
        }
        thead{
            background-color:greenyellow;
            color:yellow;
        }
        body {
                background-image: url('https://thumbs.gfycat.com/BlackandwhiteTenderBuzzard-size_restricted.gif');
                background-attachment: fixed;
            }
        a{
            display: inline-block;
            margin-top:25px;
            padding:8px 20px;
            background-color:darkslateblue;
            color:white;
            font-weight:550;
            font-size:16px;
            border:2px solid black;
            border-radius:3px;
            text-decoration:none;
        }
    </style>
</head>
<body>
<h1 align="center">Registration Data</h1>
    <?php
    $con=mysqli_connect('localhost','root','','user_db');
    $query=mysqli_query($con,"SELECT * FROM `user_form` ");
    echo"
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
        echo"
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
    echo"
    </tbody>
    </table>
    ";
    ?>
   <a href="export.php" class="btn" style="background-color: orangered;">ExportData</a>
   <a href="login_form.php" class="btn" style="background-color: orangered;">Login</a>
   <a href="register_form.php" class="btn" style="background-color: orangered;">Register</a>
   <a href="user_page.php" class="btn" style="background-color: orangered;">Back To User</a>
   <a href="admin_page.php" class="btn" style="background-color: orangered;">Back To Admin</a>
    
</body>
</html>