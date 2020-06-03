<?php
require_once('config/config.php');
  require_once(ABSPATH.'classes/subject.php');
  if(!isset($_SESSION['islogedin'])){
    header('location:login.php');
 }
  $obj_subject = new subject;
  $user_id = $_SESSION['userid'];
  $pay = $obj_subject->drop($user_id);
  $type= $obj_subject->type($user_id);

 if(isset($_GET['subject_id'])){
   $res =$_GET['subject_id'];
  
   
   $tut = $obj_subject->display($res);
 }



  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Course Page</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <link rel="icon" href="images/mortarboard.png" type="image/gif" sizes="16x16">

</head>

<body>
    <div class="loader-Wrapper">
        <div class="loader"></div>
    </div>

    <!-- Navigation -->
    <nav class="navbar navbar-expand-lg navbar-dark bg-dark fixed-top">

        <img src="images/logo.png" width="15%" height="50px" id="logoImg">
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
          <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarSupportedContent">

            <form class="form my-lg-0 mr-auto">
                <input class="searchNxt" type="search" placeholder="Search" aria-label="Search">
                <button class="searchNxt_btn" type="submit">Search</button>

            </form>
            <ul class="navbar-nav ">
            <li class="nav-item">
                    <a class="nav-link" href="student.php">Courses<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img src="images/user.png" width="35px" height="35px">

                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        
                        <a class="dropdown-item" href="dashboard-Student.php"><i class="fa fa-tachometer-alt"> </i>Dashboard</a>
                        <a class="dropdown-item" href="profile.php"><i class="fas fa-edit"> </i>Edit Profile</a>
                        <a class="dropdown-item" href="session.php"><i class="fas fa-sign-out-alt"> </i>Logout</a>

                    </div>

                </li>
                <li class="nav-item my-2 mr-2">
                    
               
                </li>
                <li class="nav-item my-2">
                    <div class="backGroundNxt">
                        <a href="#"><img src="images/cart.png" width="19px" height="19px" style="margin-left:1px"></a>
                    </div>
                </li>


            </ul>
        </div>

    </nav>

    <!-- Header -->





    <!-- Page Content -->
    <div class="bgBack pt-5 py-5">
        <div class="container">
            <div class="courseWrap ">
                <div class="row ">
                    <div class="col-md-12">

                        <h3><?php echo $tut['subject_name']; ?></h3>

                        <p>
                        <?php echo $tut['subject_description']; ?>
                        </p>



                        <h3>Objective</h3>

                        <p> <?php echo $tut['subject_objective']; ?>
                        </p>
                        <div class="row blue-div">
                            <div class="col-md-3">
                                <span><img src="images/class.png" height="20px" width="20px"></span> Duration: <span style="color:black"> <?php echo $tut['subject_duration']; ?></span>
                            </div>
                            <div class="col-md-3">
                                <span><img src="images/assessment1.png" height="20px" width="20px"></span> Assessments: <span style="color:black">Yes</span>
                            </div>
                            <div class="col-md-3">
                                <span><img src="images/diploma2.png" height="20px" width="20px"></span> Certification: <span style="color:black">Yes</span>
                            </div>
                            <div class="col-md-3">
                                <span><img src="images/tclass.png" height="20px" width="20px"></span> Total class : <span style="color:black"><?php echo $tut['max_cls']; ?></span>
                            </div>
                        </div>
                    </div>


                </div>
       
       <?php if($tut['subject_id']!=$type['item_id']){?>
                
           
                <div class="row d-flex justify-content-center my-4">
                    Amount :  <?php echo $tut['subject_amount']; ?>

                </div>
                <?php } ?>
                <div class="row my-5 d-flex justify-content-center">
                <?php if($tut['subject_id']!=$type['item_id']){?>
                <form action="https://www.sandbox.paypal.com/cgi-bin/webscr" method="post"  >
<input type="hidden" name="cmd" value="_cart">
<input type="hidden" name="upload" value="1">
<input type="hidden" name="business" value="B8PRAURREFWLQ">
 <input type="hidden" name="return" value="http://localhost/sekha/paymentsuccess.php?parse=<?php echo $user_id ?>_1_<?php echo $res ?>_<?php echo $tut['subject_amount']; ?>">
<input type="hidden" name="custom" class="paypal_custom_value" value="<?php echo $user_id ?>_1_<?php echo $res ?>_<?php echo $tut['subject_amount']; ?>">
<input type="hidden" name="item_name_1" value="Aggregated items">
<input type="hidden" name='currency_code' value='INR'>
<input type="hidden" name="amount_1" value="<?php echo $tut['subject_amount'];?>">
<input type="submit"class="search_btn" value="Apply">
</form>
<a href="#" class="search_btn ml-1">Add To Wishlist</a>          
               
                <?php } ?>
              
                    <a href="module.php?subject_id=<?php echo $tut['subject_id'];?>" class="search_btn ml-4">View Modules
                    </a>
                    </div>
                </div>

            </div>



            <!-- /.row -->


            <!-- /.row -->
            <!-- New row -->

        </div>
    </div>
    <!-- /.container -->

    <!-- Footer -->
    <footer class="py-3 mt-7 my-5 mb-5  bg-dark ">
        <div class="container ">
            <p class="m-0 t text-white ">Copyright &copy; Sekha 2020</p>
        </div>

    </footer>


    <!-- Bootstrap core JavaScript -->
    <script src='https://kit.fontawesome.com/a076d05399.js'></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " crossorigin="anonymous "></script>
    <script>
        $(window).on("load", function() {
            $(".loader-Wrapper").hide("slow");
        });
    </script>

</body>

</html>