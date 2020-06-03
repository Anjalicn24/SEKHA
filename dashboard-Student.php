<?php
  require_once('config/config.php');
  require_once('classes/dashboard.php');
  if(!isset($_SESSION['islogedin'])){
   header('location:login.php');
}
  $obj_dash= new dashboard();
  $user_id  = $_SESSION['userid'];
 

  $res = $obj_dash->drop($user_id);
  $type= $obj_dash->type($user_id);
  if($type['item_type']==1){
      $sub = $type['item_id'];
  }
  elseif($type['item_type']==2){
    $mod = $type['item_id'];
  }
else{
    $cls = $type['item_id'];
  }
 
$subject=$obj_dash->subject($sub);
$module=$obj_dash->module($mod);
$class=$obj_dash->class($cls)
  ?>


<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Dashboard</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
   
    <!-- Custom styles for this template -->
    <link href="css/styles.css" rel="stylesheet">
    <link href="css/tabbar.css" rel="stylesheet">
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

    <div class="bgBack  ">
        <button class="navbar-toggler " type="button" id="sideToggler">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="sideWrapper d-flex align-items-stretch">
            <nav id="sidebar" class="d-none d-lg-block ">
                <div class="img bg-wrap text-center py-4" style="background-image: url(images/bg_1.jpg);">
                    <div class="user-logo">
                        <div class="preview ">
                            <img src="images/student.png"width="100%">
                        </div>
                       
                    </div>
                </div>
                <ul class="list-unstyled components" id="sideList">
                    <li>
                        <a class="links text-center"> Quick Links</a>
                    </li>
                    <li>
                        <a href="#"><span class="fa fa-home mr-3"></span> Dashboard</a>
                    </li>
                    <li>
                        <a href="student.php"><span class="fa fa-home mr-3"></span>Continue Learning</a>
                    </li>
                    <li>
                        <a href="session.php"><span class="fa fa-sign-out-alt mr-3"></span> Sign Out</a>
                    </li>
                </ul>
            </nav>
            <!-- Page Content  -->
              
            <div id="content" class="p-9 p-md-2.5 py-4 pt-9">
          <div class="w3-bar w3-grey">  
              <div class="tab">
              
              <button class="tablinks active" onclick="openCity(event, 'London')">Subject</button>
  <button class="tablinks" onclick="openCity(event, 'Paris')">Module</button>
  <button class="tablinks" onclick="openCity(event, 'Tokyo')">Classes</button>

            </div>
                    <div class="row ">
                       
                    <div class="col-md-12 py-7">


                        <img src="images/check.png" width="20px" height="20px">
                        <span>Courses Subscribed</span>
                        <p style="color:#10a650;margin-left:24px">Total Completed Subscribed = <?php echo $res['payment_id']?></p>
                           
                           
                            <div class="completeWrap ">
                            <div class="row headerVast">
                                <div class="col-md-4">
                                    
                            <div id="London" class="tabcontent" style="display:block">
<div class="nav-item nav-link active "> 

                            <span onclick="this.parentElement.style.display='none'"
  class="w3-button w3-large w3-display-topright">&times;</span>
  <div class="tab-content" id="nav-tabContent">
              
                            
                        <?php                         
                foreach($subject as $key => $value) {?>
              
                            <div class="col-md-10 ">
                            <div class="subCardNxt text-center ">
                                <div class=" text-center ">
                                <div class="top-banner ">
                                        <img src="images/course.jpeg " width="100% " height="100% " alt=" ">
                                    </div>
                                    <div class="captionText"><span><?php echo $value['subject_name']; ?></span></div> 
                                    <div class="barKey " >
                                     <a href="course.php?subject_id=<?php echo $value['subject_id'];?>" class="search_btn">Join</a> 
                                    </div>
                                    <div class="midText ">
                                        <p class="middle "><?php echo $value['subject_objective']; ?> </p>
                
                            <?php } ?>
                            <div>
                </div>
                </div>
                </div>
                </div>
                </div>
                </div>
                            </div>
                            </div>
                </div>
</div>
</div>
</div>
<div id="Paris" class="tabcontent">
<div class="tab-content" id="nav-tabContent">
              
                            
<?php                         
                foreach($module as $key => $value) {?>
 
                            <div class="col-md-3 ">
                            <div class="subCardNxt text-center ">
                                <div class=" text-center ">
                               
                                    <div class="top-banner ">
                                        <img src="images/module.jpeg " width="90% " height="100% " alt=" ">
                                    </div>
                                    <div class="captionText"><span><?php echo $value['module_name']; ?></span></div> 
                                    <div class="barKey " >
                                     <a href="dmodule.php?module_id=<?php echo $value['module_id'];?>" class="search_btn">Join</a> 
                                    </div>
                                    </div>
                </div>
                            
                </div>
                            <?php } ?>
                  <div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
                  </div>
                  </div>
      </div>
</div>
</div>
</div>


<div id="Tokyo" class="tabcontent">
                             
<?php                         
                foreach($class as $key => $value) {?>
 
                            <div class="col-md-3 ">
                            <div class="subCardNxt text-center ">
                                <div class=" text-center ">
                               
                                <div class="top-banner ">
                                        <img src="images/cls.jpeg " width="90% " height="100% " alt=" ">
                                    </div>
                                    <div class="captionText"><span><?php echo $value['class_name']; ?></span></div> 
                                    <div class="barKey " >
                                     <a href="vedio.php?class_id=<?php echo $value['class_id'];?>" class="search_btn">BUY NOW</a> 
                                    </div>
                                   
                                    </div>
                </div>
                            
                </div>
                            <?php } ?>
                  <div>
      </div>
      </div>
      </div>
      </div>
      </div>
      </div>
                  </div>
                  </div>
      </div>
</div>
</div>
</div>
</div>
                        
                    </div>
                    </div>
                    </div>

    </div>





    <footer class="py-3 bg-dark ">
        <div class="container ">
            <p class="m-0  text-white ">Copyright &copy; Sekha 2020</p>
        </div>

    </footer>
    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " crossorigin="anonymous "></script>
    <script>
        $(function() {
            function maskImgs() {
                //$('.img-wrapper img').imagesLoaded({}, function() {
                $.each($('.img-wrapper img'), function(index, img) {
                    var src = $(img).attr('src');
                    var parent = $(img).parent();
                    parent
                        .css('background', 'url(' + src + ') no-repeat center center')
                        .css('background-size', 'cover');
                    $(img).remove();
                });
                //});
            }

            var preview = {
                init: function() {
                    preview.setPreviewImg();
                    preview.listenInput();
                },
                setPreviewImg: function(fileInput) {
                    var path = $(fileInput).val();
                    var uploadText = $(fileInput).siblings('.file-upload-text');

                    if (!path) {
                        $(uploadText).val('');
                    } else {
                        path = path.replace(/^C:\\fakepath\\/, "");
                        $(uploadText).val(path);

                        preview.showPreview(fileInput, path, uploadText);
                    }
                },
                showPreview: function(fileInput, path, uploadText) {
                    var file = $(fileInput)[0].files;

                    if (file && file[0]) {
                        var reader = new FileReader();

                        reader.onload = function(e) {
                            var previewImg = $(fileInput).parents('.file-upload-wrapper').siblings('.preview');
                            var img = $(previewImg).find('img');

                            if (img.length == 0) {
                                $(previewImg).html('<img src="' + e.target.result + '" alt=""/>');
                            } else {
                                img.attr('src', e.target.result);
                            }

                            uploadText.val("Hi,User");
                            maskImgs();
                        }

                        reader.onloadstart = function() {
                            $(uploadText).val('uploading..');
                        }

                        reader.readAsDataURL(file[0]);
                    }
                },
                listenInput: function() {
                    $('.file-upload-native').on('change', function() {
                        preview.setPreviewImg(this);
                    });
                }
            };
            preview.init();
        });
    </script>
    <script type="text/javascript">
        $(document).ready(function() {
            $("#sideToggler").on("click", function() {
                $("#sidebar").toggleClass("open");
            });
        });
    </script>
    <script>
        $(window).on("load", function() {
            $(".loader-Wrapper").hide("slow");
        });
    </script>
   <script>
function openCity(evt, cityName) {
  var i, tabcontent, tablinks;
  tabcontent = document.getElementsByClassName("tabcontent");
  for (i = 0; i < tabcontent.length; i++) {
    tabcontent[i].style.display = "none";
  }
  tablinks = document.getElementsByClassName("tablinks");
  for (i = 0; i < tablinks.length; i++) {
    tablinks[i].className = tablinks[i].className.replace(" active", "");
  }
  document.getElementById(cityName).style.display = "block";
  evt.currentTarget.className += " active";
}
</script>
</body>

</html>