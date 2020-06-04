<?php
require_once('config/config.php');
  require_once(ABSPATH.'classes/enquiries.php');
 $obj_enquiry= new Enquiry();
 $res = $obj_enquiry->enq();

?>
<!DOCTYPE html>
<html lang="en">
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="Blesson" content="">

    <title>Tutor</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" crossorigin="anonymous">
  
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
                    <a class="nav-link" href="#">Courses<span class="sr-only">(current)</span></a>
                </li>

                <li class="nav-item dropdown">
                    <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">

                        <img src="images/user.png" width="35px" height="35px">

                    </a>
                    <div class="dropdown-menu " aria-labelledby="navbarDropdown">
                        <a class="dropdown-item" href="#"><i class="fas fa-user"></i> User</a>
                        <a class="dropdown-item" href="dashboard.php"><i class="fa fa-tachometer-alt"> </i>Dashboard</a>
                        <a class="dropdown-item" href="profile-edit.php"><i class="fas fa-edit"> </i>Edit Profile</a>
                        <a class="dropdown-item" href="#"><i class="fas fa-sign-out-alt"> </i>Logout</a>

                    </div>

                </li>
                <li class="nav-item my-2">
                    <div class=backGroundNxt>
                        <a href="#"><img src="images/notification1.png" width="19px" height="19px" style="margin-left:1px"></a>
                    </div>
                </li>
            </ul>
        </div>

    </nav>
    
    <!-- Content -->
    <div class="bgBack py-5 mt-5">
        <div class="container">
            <div class="nav nav-tabs d-flex justify-content-center " id="tutorTabs" role="tablist">
               
                <a class="nav-item nav-link  " id="nav-profile-tab"  href="#" role="tab" aria-controls="nav-home" aria-selected="true">View Subject</a>
                <a class="nav-item nav-link  " id="nav-profile-tab"  href="viewclass.php" role="tab" aria-controls="nav-home" aria-selected="true">View classes</a>
                <a class="nav-item nav-link  " id="nav-class-tab" href="class.php" role="tab" aria-controls="nav-home" aria-selected="true">Add Class</a>
                <a class="nav-item nav-link " id="nav-questions-tab"  href="questions.php" role="tab" aria-controls="nav-home" aria-selected="true">Add Questions</a>
                <a class="nav-item nav-link active " id="nav-previousClass-tab"  href="enquiries.php" role="tab" aria-controls="nav-home" aria-selected="true">Enquiries</a>
            </div>
            <div class="bgBack py-5">
        <div class="container">
                          <div class="card shadow mb-4">
                        <div class="card-body">
                            <div class="table-responsive">
                                <table class="table table-bordered" id="dataTable" width="100%" cellspacing="">
                                    <thead>
                                        <tr>
                                            <th>S No.</th>
                                            <th>Name</th>
                                            <th>Enquiry</th>
                                            <th>Mail Id</th>
                                            <th>Replied On</th>
                                            <th>Reply Status</th>
                                            <th>Action</th>
                                        </tr>
                                    </thead>

                                    <tbody>
                                    <?php

                                        $i= 0;

                                        foreach($res as $key => $value) {
                                            $status = ($value['status'] == 1) ? 'NOT REPLIED' : 'REPLIED';
                                        ?>
                                    <tr>
                                        <td><?php echo ++$i;?></td>
                                        <td><?php echo $value['name'];?></td>
                                        <td><?php echo $value['message']; ?></td>
                                        <td><?php echo $value['email']; ?></td>
                                        <td><?php echo $value['date']; ?></td>
                                        <td><?php echo $status; ?></td>
                                        <td><a href=""><i class="fa fa-trash mr-3"></i></a><a href=""><a href="addEnquiry.php"><i class="fa fa-reply"></i></a></td>
                                    </tr>
                                        <?php } ?>
                                    </tbody>
                                </table>
                            </div>
                        </div>
                      
                    </div>
                    </div>
                    </div>
                   
                </div>
                </div>



    <footer class="py-3 bg-dark ">
        <div class="container ">
            <p class="m-0 t text-white ">Copyright &copy; Sekha 2020</p>
        </div>
        <!-- /.container -->
    </footer>


    <script src="https://kit.fontawesome.com/a076d05399.js"></script>
    <script src="https://code.jquery.com/jquery-3.4.1.slim.min.js " crossorigin="anonymous "></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js " crossorigin="anonymous "></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/js/bootstrap.min.js " crossorigin="anonymous "></script>
    <script>
        var fileTypes = ['pdf', 'docx', 'rtf', 'jpg', 'jpeg', 'png', 'txt']; //acceptable file types
        function readURL(input) {
            if (input.files && input.files[0]) {
                var extension = input.files[0].name.split('.').pop().toLowerCase(), //file extension from input file
                    isSuccess = fileTypes.indexOf(extension) > -1; //is extension in acceptable types

                if (isSuccess) { //yes
                    var reader = new FileReader();
                    reader.onload = function(e) {
                        if (extension == 'pdf') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/179/179483.svg');
                        } else if (extension == 'docx') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/281/281760.svg');
                        } else if (extension == 'rtf') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136539.svg');
                        } else if (extension == 'png') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136523.svg');
                        } else if (extension == 'jpg' || extension == 'jpeg') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136524.svg');
                        } else if (extension == 'txt') {
                            $(input).closest('.fileUpload').find(".icon").attr('src', 'https://image.flaticon.com/icons/svg/136/136538.svg');
                        } else {
                            //console.log('here=>'+$(input).closest('.uploadDoc').length);
                            $(input).closest('.uploadDoc').find(".docErr").slideUp('slow');
                        }
                    }

                    reader.readAsDataURL(input.files[0]);
                } else {
                    //console.log('here=>'+$(input).closest('.uploadDoc').find(".docErr").length);
                    $(input).closest('.uploadDoc').find(".docErr").fadeIn();
                    setTimeout(function() {
                        $('.docErr').fadeOut('slow');
                    }, 9000);
                }
            }
        }
        $(document).ready(function() {

            $(document).on('change', '.up', function() {
                var id = $(this).attr('id'); /* gets the filepath and filename from the input */
                var profilePicValue = $(this).val();
                var fileNameStart = profilePicValue.lastIndexOf('\\'); /* finds the end of the filepath */
                profilePicValue = profilePicValue.substr(fileNameStart + 1).substring(0, 20); /* isolates the filename */
                //var profilePicLabelText = $(".upl"); /* finds the label text */
                if (profilePicValue != '') {
                    //console.log($(this).closest('.fileUpload').find('.upl').length);
                    $(this).closest('.fileUpload').find('.upl').php(profilePicValue); /* changes the label text */
                }
            });

            $(".btn-new").on('click', function() {
                $("#uploader").append('<!--error--><div class="fileUpload btn btn-orange"> <img src="https://image.flaticon.com/icons/svg/136/136549.svg" width="20px"  height="20px"class="icon"><span class="upl" id="upload">Upload</span><input type="file" class="upload up" id="up" onchange="readURL(this);" /></div><div class="col-sm-8"><div class="col-sm-1"><a class="btn-check"><i class="fa fa-times"></i></a></div></div>');
            });

            $(document).on("click", "a.btn-check", function() {
                if ($("#upBtn").length > 1) {
                    $(this).closest("#upBtn").remove();
                } else {
                    alert("You have to upload at least one document.");
                }
            });
        });
    </script>
    <script>
        $(window).on("load", function() {
            $(".loader-Wrapper").hide("slow");
        });
    </script>
   

</body>

</html>