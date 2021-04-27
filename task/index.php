
<?php

   
    session_start();
    if(!(isset($_SESSION['logged-in']))){
        header('Location: login.php');
        exit();
    }
    
    require_once "connect.php";

    $connection = new mysqli($host, $db_user, $db_password, $db_name);

    if($connection->connect_errno!=0){
        echo "Error: ".$connection->connect_errno . "<br>";
        echo "Description: " . $connection->connect_error;
        exit();
    }
?>

<?php include 'header.php';?>

<div class="container projectListContainer">
    <h1>Projects list</h1>
    <div class="lg-6 whoami">
        <?php echo 'Logged in as <strong>' . $_SESSION['user'] ; ?>
    </div>
    <div class="lg-6 createBoard">
        <a href="logout.php" class="btn">Log Out</a>
    </div>
    <div class="lg-12">
        <table class="project-list">
             <tr>
                    <th>Name</th>
                    <th>Minimum Time</th>
                    <th>Maximum Time</th>
                    <th>Action</th>
                </tr>

              
<?php 

    include('../dbcon.php');
    $sql = "select * from task";
    $result = mysqli_query($conn,$sql);
  if (mysqli_num_rows($result)>0) {
    while ($data_row = mysqli_fetch_assoc($result)) {
        $id = $data_row['id'];
        $name = $data_row['name']; 
        $mint = $data_row['mint'];
        $maxt = $data_row['maxt'];
    
 ?>
            <thead>
               
                 <tr>
                    
                    <th><?php echo "$name"; ?></th>
                    <th><?php echo "$mint"; ?></th>
                    <th><?php echo "" . date("h:i:sa");?></th>
                    <th><a href="../index.php" class="btn">Finish</a></th>
                </tr>


     
            </thead>
            <?php
        }
    }
?>            
          
        </table>
        <?php
            if(isset($_SESSION['newProjectSuccess'])){
                echo $_SESSION['newProjectSuccess'];
                unset($_SESSION['newProjectSuccess']);
            }
        ?>
    </div>
</div>

<?php $connection->close(); ?>
<?php include 'footer.php';

?>
