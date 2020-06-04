<?php   

    require_once('config/config.php');
    require_once(ABSPATH.'classes/exam.php');
    
    if(!isset($_SESSION['islogedin'])){
        header('location:login.php');
    }

    $obj_subject = new exam;

    $user_id  = $_SESSION['userid'];
    $class_id = $_GET['class_id'];
    $result   = $obj_subject->validate_exam_attended($class_id,$user_id);
    if($result == true && !isset($_GET['retest'])){
        header('location:examresult.php?class_id='.$class_id."&user_id=".$user_id);
    }

    if(isset($_GET['class_id']) && !isset($_POST['finish_exam'])){
        $res = $_GET['class_id'];
        $question = $obj_subject->get_all_questions($res);
    } 

    if(isset($_POST['finish_exam'])){
        $user_id  = $_SESSION['userid'];
        $class_id = $_GET['class_id'];
        if(isset($_GET['retest'])){
            $result_id = $_GET['retest'];
            $result = $obj_subject->validate_exam_retest($_POST,$user_id,$class_id,$result_id);
        }
        else{
            $result = $obj_subject->validate_exam($_POST,$user_id,$class_id);    
        }
        header('location:examresult.php?class_id='.$class_id."&user_id=".$user_id);
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
    <div class="bgBack pt-5 py-5">
        <div class="container">
            <div class="courseWrap ">
                <div class="row ">
                    <div class="col-md-12">
                    
                <div class="tab-pane fade show active" id="nav-home" role="tabpanel" aria-labelledby="nav-home-tab">
                    <div class="row pt-0 mb-5">   
<form action="" method="post">

    <?php $i=0;
     foreach ($question as $key => $value) { ?> 
    <?php if($key == 0){?>
    <table id="q<?php echo $key ?>">
    <?php }else{ ?>   
    <table id="q<?php echo $key ?>" style="display: none;">
    <?php } ?>
        <tr>
            <td>
                <h3><br><?php echo ++$i;?>)<?php echo $value['question'];?></h3>
                <input type="hidden" name="questionid<?php echo $key ?>" value="<?php echo $value['question_id'];?>">
            </td></div>
        </tr> 
        <div class="row pt-0 mb-0">
        <tr>
        
            <td>
            
                <input required type="radio" name="userans<?php echo $key ?>" value="<?php echo $value['option_one'];?>">&nbsp;<?php echo $value['option_one']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <input required type="radio" name="userans<?php echo $key ?>" value="<?php echo $value['option_two'];?>">&nbsp;<?php echo $value['option_two'];?>
            </td>
        </tr>
        <tr>
            <td>
                <input required type="radio" name="userans<?php echo $key ?>" value="<?php echo $value['option_three'];?>">&nbsp;<?php echo $value['option_three']; ?>
            </td>
        </tr>
        <tr>
            <td>
                <input required type="radio" name="userans<?php echo $key ?>" value="<?php echo $value['option_four'];?>">&nbsp;<?php echo $value['option_four']; ?>
            </td>
        </tr> 
        <tr>
            <td><p align="right">
                <?php if($key != 0){?>
                <input type="button" name="prev<?php echo $key ?>" id="prev<?php echo $key ?>" value="Previous" onclick="previous(<?php echo $key; ?>)">
                <?php } ?>
                <?php if(count($question)-1 != $key){?>
                <input type="button" name="next<?php echo $key ?>" id="next<?php echo $key ?>" value="Next" onclick="next(<?php echo $key; ?>)">
                <?php }else{ ?>
                <input type="submit" name="finish_exam" id="finish_exam" value="Completed">
                <input type="hidden" name="count" id="count" value="<?php echo $key ?>">
                <?php } ?></p>
            </td>
        </tr>
    </table>
<?php } ?>

</form>
     </div>
     </div>
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
    <script>
        function next($this_key){
            $("#q"+$this_key).hide();
            $next_id = parseInt($this_key)+parseInt(1);
            $("#q"+$next_id).css("display","block");
        }

        function previous($this_key){
            $("#q"+$this_key).hide();
             $prev_id = parseInt($this_key)-parseInt(1);
            $("#q"+$prev_id).css("display","block");
        }
    </script>
    
</body>
</html>