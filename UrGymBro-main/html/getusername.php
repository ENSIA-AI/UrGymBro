<?php 
session_start();
if(!isset($_SESSION['user']))
{
  header( "refresh:1;url=/UrGymBro-main/html/homepage_s.php" ); //redirect the user to a certain page after 1 second
  exit();
}
                    @$my_connection=new mysqli('localhost','root','','urgymbro');
                    if (mysqli_connect_errno()) 
                    {
                        $mydisplay= 'Error: Could not connect to database. Please try again later.';
                        
                    }
            $query="SELECT User_id  FROM `users` WHERE `token`=?";
$verif=$my_connection->prepare($query);
$verif->bind_param('s',$_SESSION["user"]);
$verif->execute();
        $verif->store_result();
        if($verif->num_rows==0)
        {
          header( "refresh:1;url=/UrGymBro-main/html/homepage_s.php" );
        }
        else if($verif->num_rows==1){
            $verif->bind_result($username);
             ($verif->fetch());}
           echo '<li class="nav-item"><a id="login" href="../html/Profile_s.php">'.$username."</a></li>";
        ?>