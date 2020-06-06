<?php
 class Assessment{
     function assess(){
        Db::query("SELECT assessment_qus.assessment_id,assessment_qus.question,assessment_qus.option_correct  from assessment_qus ");
       Db::execute();
       $result = Db::result();
       return $result;
    }
    function Addassess($arr){
      
         Db::insertQuery("assessment",$arr);
        
         $data= Db::lastId();

         return $data;
  

    }
       
       function Addas($arras){
      
        Db::insertQuery("assessment_qus",$arras);
        return true;
       
      }
       function drop(){
         Db::query("SELECT module_id,module_name from modules"); 
         Db::execute();
         $result = Db::result();
         return $result;
       }
       function drops(){
         Db::query("SELECT class_id,class_name from class"); 
         Db::execute();
         $result = Db::result();
         return $result;
       }
       function deletetutor($assessment_id){
       
        Db::query("DELETE from assessment_qus where  assessment_id='".$assessment_id."'");
        Db::executeOnly();
     return true;
       
       }
       function edit($res){
        Db::query("SELECT *  from assessment_qus where assessment_id='".$res."'");
       Db::execute();
       $result = Db::result();
       return $result;
    }
    function edited($id,$arras){
      $where= "assessment_id ='".$id."'";
      Db::updateQuery("assessment_qus" ,$arras ,$where );
     
      return true;
    }
    
    
}
?>
