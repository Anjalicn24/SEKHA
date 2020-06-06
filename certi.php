<?php
 class certi{
     function certificate(){
       Db::query("SELECT user_id,username,user_email,certificate,score from user where certificate=1");
       Db::execute();
       $result = Db::result();
       return $result;
    }
}
?>