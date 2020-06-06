
<?php
 class admindetail{
     function profile($r){
       Db::query("SELECT admin_id,admin_name,admin_password,admin_email from admin_register where admin_id= '$r'");
       Db::execute();
       $result = Db::result();
       return $result;
    }
    function update($r,$arrsubject){
      $where= "admin_id ='".$r."'";
      Db::updateQuery("admin_register" ,$arrsubject ,$where );
     
      return true;
    }
}
?>