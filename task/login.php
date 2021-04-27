<?php
    session_start();
    if(isset($_SESSION['logged-in'])){
        $id= $_GET['id'];
        header('Location: index.php');
        exit();
    }
?>

<?php include 'header.php';?>


<div class="container loginContainer">
    <div class="login-box">
        <h1>Verify Its You</h1>
        <form method="post" action="loginValidation.php">
            <div class="input-box">
                <label for="login">Type kid:</label>
                <input type="text" name="login">
            </div>
            <div class="input-box">
                <label for="password">Type Kid:</label>
                <input type="password" name="password">
            </div>
            <button type="submit">Done</button>
        </form>
        <?php
            if(isset($_SESSION['loginError'])){
                echo $_SESSION['loginError'];
            }
        ?>
    </div>
</div>

<?php include 'footer.php';?>