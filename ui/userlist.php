<?Php 

session_start();

//get user id from session
$userID = $_SESSION['user_ID'];

?>

<!DOCTYPE html>
<html>
    <head>
        <title>User Login</title>

        <style>
            table, th, td {
            border: 1px solid black;
            }
        </style>

    </head>


    <body>
        
        <h1>User List</h1>

       <table style="border:1px solid black;">
        <tr>
            <th>User ID</th>
            <th>Name</th>
            <th>Username</th>
            <th>Email</th>
        </tr>
        
        <tr>
        
        <?php

            include_once '../bizlogic/config.php';

            
            $sql = "Select * from user where id = '$userID' ";

            //get user details
            $result = mysqli_query($connection, $sql);

            if(mysqli_num_rows($result) > 0){

                while($row = mysqli_fetch_assoc($result)){

                    echo "<td>".$row['id']."</td>";
                    echo "<td>".$row['name']."</td>";
                    echo "<td>".$row['username']."</td>";
                    echo "<td>".$row['email']."</td>";

                    echo"</tr>";
                }

            }

        ?>

       
       </table>

    </body>

</html>


