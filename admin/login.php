<?php include_once("header.php"); ?>
 <section class="breadcrumb_area">
            <div class="overlay bg-parallax" data-stellar-ratio="0.8" data-stellar-vertical-offset="0" data-background=""></div>
            <div class="container">
                <div class="page-cover text-center">
                    <h2 class="page-cover-tittle">Admin Login</h2>
                    <ol class="breadcrumb">
                        <li><a href="index.php">Home</a></li>
                        <li class="active">Admin Login</li>
                    </ol>
                </div>
            </div>
        </section>
        <br>
        <div class="contact">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
             <?php
             if(isset($_REQUEST["msg"])){
                echo " <div class='alert alert-info'>".$_REQUEST["msg"]."</div>";
                }
             ?>
            </div>
        </div> 
          <form class="row contact_form" id="contactForm" method="post">
                <div class="col-md-4 mx-auto">
                  <div class="form-group">
                      <input type="email" class="form-control"   name="email" placeholder="email">
                    </div>
                     <div class="form-group">
                      <input type="password" class="form-control"   name="password" placeholder="password">
                    </div>
                  </div>
                </div>
                <div class="col-md-12 text-center">
                    <button type="submit" value="submit" class="btn button_hover" name="submit">Login</button>
                </div>
             </form>
    </div>
</div>
<br>
<?php
if(isset($_REQUEST["submit"]))
{
    $email = $_REQUEST["email"];
     $p = $_REQUEST["password"];
   include("config.php");
    $q = "SELECT * FROM `admin_login` WHERE `email`='$email' and `password`='$p'";
    $result = mysqli_query($conn,$q);
    if($data = mysqli_fetch_array($result))
    {
        //create
        $_SESSION['email']=$email;
        $_SESSION['password']=$p;
        //url redirect
        echo "<script>window.location.assign('index.php')</script>";
    }
    else{
        // //url redirect
        // echo mysqli_error($conn);
        // die();
        echo "<script>window.location.assign('login.php?msg=Invalid email or password')</script>";
   }
}
?>
<?php require_once("footer.php"); ?>