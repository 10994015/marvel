<?php
require_once('./config/connection.php');
require_once('./config/assist.php');


if(isset($_POST['inputData']) && $_POST['inputData']=='insert'){
    try{
        $type = $_POST['type'];
        $name = $_POST['name'];
        $student = $_POST['student'];
        $time = date('Y-m-d H:i:s');
        $score = $_POST['score'];



        $sql_str = "SELECT * FROM game WHERE student = :student";

        $stmt = $pdo->prepare($sql_str);
 
        $stmt->bindParam(':student',$student);
        $stmt->execute();
       
        $total = $stmt->rowCount();  
       

        if($total<1){
            if($type==1){
                $sql_str = "INSERT INTO game (name,student,time,score,type1) VALUES (:name, :student, :time,:score,:type1)";

                $stmt = $pdo->prepare($sql_str);
        
                
        
                $stmt->bindParam(':type1'    ,$type);
                $stmt->bindParam(':name'    ,$name);
                $stmt->bindParam(':student' ,$student);
                $stmt->bindParam(':time',$time);
                $stmt->bindParam(':score',$score);
        
                $stmt->execute();
        
                header('Location:./finish.php');
            }elseif($type==2){
                $sql_str = "INSERT INTO game (name,student,time,score,type2) VALUES (:name, :student, :time,:score,:type1)";

                $stmt = $pdo->prepare($sql_str);
        
                
        
                $stmt->bindParam(':type1'    ,$type);
                $stmt->bindParam(':name'    ,$name);
                $stmt->bindParam(':student' ,$student);
                $stmt->bindParam(':time',$time);
                $stmt->bindParam(':score',$score);
        
                $stmt->execute();
        
                header('Location:./finish.php');
            }elseif($type==3){
                $sql_str = "INSERT INTO game (name,student,time,score,type3) VALUES (:name, :student, :time,:score,:type1)";

                $stmt = $pdo->prepare($sql_str);
        
                
        
                $stmt->bindParam(':type1'    ,$type);
                $stmt->bindParam(':name'    ,$name);
                $stmt->bindParam(':student' ,$student);
                $stmt->bindParam(':time',$time);
                $stmt->bindParam(':score',$score);
        
                $stmt->execute();
        
                header('Location:./finish.php');
            }else{
                $sql_str = "INSERT INTO game (name,student,time,score,type4) VALUES (:name, :student, :time,:score,:type1)";

                $stmt = $pdo->prepare($sql_str);
        
                
        
                $stmt->bindParam(':type1'    ,$type);
                $stmt->bindParam(':name'    ,$name);
                $stmt->bindParam(':student' ,$student);
                $stmt->bindParam(':time',$time);
                $stmt->bindParam(':score',$score);
        
                $stmt->execute();
        
                header('Location:./finish.php');
            }
        }else{
           if($type==1){
                $sql_str = "UPDATE game SET type1 = :type, time = :time WHERE student  = :student";
                $stmt = $pdo->prepare($sql_str);
            
                $student    = $_POST['student'];
                $type      = $_POST['type'];
            
                $stmt->bindParam(':student'    ,$student);
                $stmt->bindParam(':type' ,$type);
                $stmt->bindParam(':time',$time);
            
                $stmt->execute();
                header('Location:./finish.php');
           }elseif($type==2){
            $sql_str = "UPDATE game SET type2 = :type, time=:time WHERE student  = :student";
            $stmt = $pdo->prepare($sql_str);
         
            $student    = $_POST['student'];
            $type      = $_POST['type'];
            
         
            $stmt->bindParam(':student'    ,$student);
            $stmt->bindParam(':type' ,$type);
            $stmt->bindParam(':time',$time);
         
            $stmt->execute();
            header('Location:./finish.php');
           }elseif($type==3){
                $sql_str = "UPDATE game SET type3 = :type, time = :time WHERE student  = :student";
                $stmt = $pdo->prepare($sql_str);
            
                $student    = $_POST['student'];
                $type      = $_POST['type'];
            
                $stmt->bindParam(':student'    ,$student);
                $stmt->bindParam(':type' ,$type);
                $stmt->bindParam(':time',$time);
            
                $stmt->execute();
                header('Location:./finish.php');
           }else{
            $sql_str = "UPDATE game SET type4 = :type, time = :time WHERE student  = :student";
            $stmt = $pdo->prepare($sql_str);
         
            $student    = $_POST['student'];
            $type      = $_POST['type'];
         
            $stmt->bindParam(':student'    ,$student);
            $stmt->bindParam(':type' ,$type);
            $stmt->bindParam(':time',$time);
         
            $stmt->execute();
            header('Location:./finish.php');
           }
        }

        

    }
    catch (PDOException $e ){
        die("Error!: ". $e->getMessage());
      }
}