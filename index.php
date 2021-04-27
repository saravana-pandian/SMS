
<?php

?>

<?php
//include header part of html
 include('header.php')
  ?>

            <div class="container-fluid">
                <div class="row">
                    <div class="col-md-12 jumbotron">
                            <h2 style="text-align: center;">
                                Daycare Owner's Rule
                                <span style="float: right;"><a href="login.php" class="btn btn-info btn-lg">Owner Login</a></span>
                            </h2>
                    </div>
                </div>
            </div>

            <div class="student-info text-center">
                <div class="container-fluid">
                    <div class="row">
                        <div class="col-md-12 jumbotron">
                            <h2>Kid's information</h2>
                            <form action="index.php" method="post">
                <input type="text" name="roll" placeholder="Enter Appointment Number" style="width: 240px;height: 35px;"><span>OR/AND<span>
                 <select name="standard" class="btn btn-info" >
                                    <option>Choose Age</option>
                                    <option>1</option>
                                    <option>2</option>
                                    <option>3</option>
                                    <option>4</option>
                                    <option>5</option>
                                </select>
                  <input type="submit" name="show" value="SHOW INFO" class="btn btn-success text-center" style="margin-left: 30px;" >  
                            </form>
                        </div>
                    </div>
                </div>
            </div>

<table class="table table-striped table-bordered table-responsive text-center">







  
<?php 
    include('dbcon.php');
    if (isset($_POST['show'])) {
        ?>
               <tr >
        <th class="text-center">Appointment no.</th>
        <th class="text-center">Age</th>
        <th class="text-center">Name</th>
        <th class="text-center">City</th>
        <th class="text-center">parent phone No.</th>
        <th class="text-center">Profile Pic</th>
        <th class="text-center">Your Work</th>
    </tr>
    <?php
        $Standard = $_POST['standard'];
        $RollNo = $_POST['roll'];

        $sql = "SELECT * FROM `student` WHERE `standard` = '$Standard' OR `rollno`='$RollNo'";

        $result = mysqli_query($conn,$sql);
        if (mysqli_num_rows($result)>0) {
            while ($DataRows = mysqli_fetch_assoc($result)) {
                $Id = $DataRows['id'];
                $RollNo = $DataRows['rollno'];
                $Name = $DataRows['name'];
                $City = $DataRows['city'];
                $Pcontact = $DataRows['pcontact'];
                $Standard = $DataRows['standard'];
                $ProfilePic = $DataRows['image'];
                ?>

                <tr>
                    <td><?php echo $RollNo;?></td>
                    <td><?php echo $Standard;?></td>
                    <td><?php echo $Name; ?></td>
                    <td><?php echo $City; ?></td>
                    <td><?php echo $Pcontact; ?></td>
                    <td><img src="databaseimg/<?php echo $ProfilePic;?>" alt="img"></td>
                    <td>
                        <br>
                       <span style="float: center;"><a href="task/index.php?id=<?php echo $RollNo; ?>" class="btn btn-info btn-lg">Take Work</a></span>
                    </td>
                </tr>
                <?php
                
            }
            
        } else {
            echo "<tr><td colspan ='7' class='text-center'>No Record Found</td></tr>";
        }
    }

 ?>
    


<!--include header part of html-->
<?php include('footer.php') ?>

