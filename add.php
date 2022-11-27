<?php
require_once('./config/connection.php');
require_once('./config/assist.php');


if(isset($_POST['inputData']) && $_POST['inputData']=='insert'){
    try{
        $type = $_POST['type'];
        $name = $_POST['name'];
        $message = $_POST['message'];
        $student = $_POST['student'];
        $time = date('Y-m-d H:i:s');
        $time2 = date('Y-m-d H:i:s');
        $score = $_POST['score'];
        
        $q1 = (empty($_POST['q1'])) ? '0' : '1';
        $q2 = (empty($_POST['q2'])) ? '0' : '1';
        $q3 = (empty($_POST['q3'])) ? '0' : '1';
        $q4 = (empty($_POST['q4'])) ? '0' : '1';
        $q5 = (empty($_POST['q5'])) ? '0' : '1';
        $q6 = (empty($_POST['q6'])) ? '0' : '1';

        $sql_str = "SELECT * FROM game WHERE student = :student";

        $stmt = $pdo->prepare($sql_str);
 
        $stmt->bindParam(':student',$student);
        $stmt->execute();
       
        $total = $stmt->rowCount();  
        
        $sql_str = "INSERT INTO giveback (student, score, q1, q2, q3, q4, q5, q6, message, time) VALUES (:student, :score, :q1, :q2, :q3, :q4, :q5, :q6, :message, :time2)";
        $stmt_giveback = $pdo->prepare($sql_str);
        
        $stmt_giveback->bindParam(':student',$student);
        $stmt_giveback->bindParam(':score',$score);
        $stmt_giveback->bindParam(':q1',$q1);
        $stmt_giveback->bindParam(':q2',$q2);
        $stmt_giveback->bindParam(':q3',$q3);
        $stmt_giveback->bindParam(':q4',$q4);
        $stmt_giveback->bindParam(':q5',$q5);
        $stmt_giveback->bindParam(':q6',$q6);
        $stmt_giveback->bindParam(':message',$message);
        $stmt_giveback->bindParam(':time2',$time2);

        $stmt_giveback->execute();

        if($total<1){
            if($type==1){
                $sql_str = "INSERT INTO game (name,student,time,type1) VALUES (:name, :student, :time,:type1)";

                $stmt = $pdo->prepare($sql_str);
        
                
        
                $stmt->bindParam(':type1'    ,$type);
                $stmt->bindParam(':name'    ,$name);
                $stmt->bindParam(':student' ,$student);
                $stmt->bindParam(':time',$time);
        
                $stmt->execute();
        
                header('Location:./finish.php');
            }elseif($type==2){
                $sql_str = "INSERT INTO game (name,student,time,type2) VALUES (:name, :student, :time,:type1)";

                $stmt = $pdo->prepare($sql_str);
        
                
        
                $stmt->bindParam(':type1'    ,$type);
                $stmt->bindParam(':name'    ,$name);
                $stmt->bindParam(':student' ,$student);
                $stmt->bindParam(':time',$time);
        
                $stmt->execute();
        
                header('Location:./finish.php');
            }elseif($type==3){
                $sql_str = "INSERT INTO game (name,student,time,type3) VALUES (:name, :student, :time,:type1)";

                $stmt = $pdo->prepare($sql_str);
        
                
        
                $stmt->bindParam(':type1'    ,$type);
                $stmt->bindParam(':name'    ,$name);
                $stmt->bindParam(':student' ,$student);
                $stmt->bindParam(':time',$time);
        
                $stmt->execute();
        
                header('Location:./finish.php');
            }else{
                $sql_str = "INSERT INTO game (name,student,time,type4) VALUES (:name, :student, :time,:type1)";

                $stmt = $pdo->prepare($sql_str);
        
                
        
                $stmt->bindParam(':type1'    ,$type);
                $stmt->bindParam(':name'    ,$name);
                $stmt->bindParam(':student' ,$student);
                $stmt->bindParam(':time',$time);
        
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