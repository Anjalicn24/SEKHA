<?php   

    require_once('config/config.php');
    require_once(ABSPATH.'classes/exam.php');
    
    if(!isset($_SESSION['islogedin'])){
        header('location:login.php');
    }

    $obj_subject = new exam;
    
    if(isset($_POST['start_retest'])){
        $obj_subject->start_retest($_POST['resultid']);
    }

    if(isset($_GET['class_id']) && isset($_GET['user_id'])){

        $result = $obj_subject->get_this_result($_GET['class_id'],$_GET['user_id']);
    } 

  ?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Student</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">


    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <link rel="icon" href="images/mortarboard.png" type="image/gif" sizes="16x16">
    <style>
    input[type=button],[type=submit]{
  background-color: #4CAF50;
  border: none;
  color: white;
  padding: 5px 20px;
  text-decoration: none;
  margin: 4px 2px;
  cursor: pointer;
  
}</style>
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

        <form></form> <form></form>  <form>  </form>   <form></form> <form></form>  <form>  </form>   <form></form> <form></form>  <form>  </form>   <form></form> <form></form>  <form>  </form>   <form> </form> <form>  </form>
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
                        <a class="dropdown-item" href="login.php"><i class="fas fa-sign-out-alt"> </i>Logout</a>

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
    <div class="bgBack py-5">
        <div class="container">
            <div class="tab-content" id="nav-tabContent">
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row pt-5 mb-5">
                        <table border="1" class="table">

                            <tr>
                                <th>Class Name</th>
                                <th>Total Questions</th>
                                <th>Answered</th>
                                <th>Percentage</th>
                                <th>Status</th>
                            </tr>
                            <tr>
                                <td><?php echo $result['class_name']; ?></td>
                                <td><?php echo explode("/",$result['marks_obtained'])[1]; ?></td>
                                <td><?php echo explode("/",$result['marks_obtained'])[0]; ?></td>
                                <td><?php echo ((explode("/",$result['marks_obtained'])[0]/explode("/",$result['marks_obtained'])[1])*100)."%"; ?></td>
                                <td>
                                    <?php 
                                    if($result['exam_status']==0){ 
                                        echo "<span style='color:red'>Failed</span>"; 
                                    }
                                    else{ 
                                        echo "<span style='color:green'>Pass</span>"; 
                                    } ?>    
                                </td>
                            </tr>
                        </table>
        <form action="" method="post">
        <p align="right">
            <?php if($result['retest_request_status'] == 0){?>
                <input type="submit" name="start_retest" value="Request For Retest">
                <input type="hidden" name="resultid" value="<?php echo $result['id']?>">
            <?php }elseif($result['retest_request_status'] == 1){ ?> 
                <input type="button" name="start_retest" value="Retest Request Sent">
            <?php }elseif($result['retest_request_status'] == 2){ ?> 
                <a href="exam.php?class_id=<?php echo $result['class_id'] ?>&retest=<?php echo $result['id'] ?>"><input type="button" name="start_retest" value="Start Retest"></a>
            <?php } ?></p>
        </form>
     </div>
     </div>
     </div>
     </div>
     </div>

    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
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