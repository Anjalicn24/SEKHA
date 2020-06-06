<?php

 class classes{
     function class(){
       Db::query("SELECT class.class_description,class.class_amount,class.video,class.class_duration,modules.module_name from class LEFT JOIN modules ON modules.module_id = class.module_id");
       
       Db::execute();
       $result = Db::result();
       return $result;
    }
    function drop(){
      Db::query("SELECT module_id,module_name from modules"); 
      Db::execute();
      $result = Db::result();
      return $result;
         
      
       }
       function Addclass($arrclass){
       
        Db::insertQuery("class",$arrclass);
        return true;
     
      }
      
}
?>