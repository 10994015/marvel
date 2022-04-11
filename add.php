<?php
require_once('connection.php');
require_once('assist.php');


if(isset($_POST['inputData']) && $_POST['inputData']=='insert'){
    try{
        $type = $_POST['type'];
        $name = $_POST['name'];
        $student = $_POST['student'];
        $time = time();
        $score = $_POST['score'];



        $sql_str = "SELECT * FROM game WHERE student = :student";

        $stmt = $pdo->prepare($sql_str);
 
        $stmt->bindParam(':student',$student);
        $stmt->execute();
       
        $total = $stmt->rowCount();  //計算出查詢結果的總筆數
       
        // 回傳總筆數, 如果有查詢到符合的資料, 則會得到1
        // echo $total;

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
                $sql_str = "UPDATE game SET type1 = :type WHERE student  = :student";
                $stmt = $pdo->prepare($sql_str);
            
                $student    = $_POST['student'];
                $type      = $_POST['type'];
            
                $stmt->bindParam(':student'    ,$student);
                $stmt->bindParam(':type' ,$type);
            
                $stmt->execute();
                header('Location:./finish.php');
           }elseif($type==2){
            $sql_str = "UPDATE game SET type2 = :type WHERE student  = :student";
            $stmt = $pdo->prepare($sql_str);
         
            $student    = $_POST['student'];
            $type      = $_POST['type'];
         
            $stmt->bindParam(':student'    ,$student);
            $stmt->bindParam(':type' ,$type);
         
            $stmt->execute();
            header('Location:./finish.php');
           }elseif($type==3){
                $sql_str = "UPDATE game SET type3 = :type WHERE student  = :student";
                $stmt = $pdo->prepare($sql_str);
            
                $student    = $_POST['student'];
                $type      = $_POST['type'];
            
                $stmt->bindParam(':student'    ,$student);
                $stmt->bindParam(':type' ,$type);
            
                $stmt->execute();
                header('Location:./finish.php');
           }else{
            $sql_str = "UPDATE game SET type4 = :type WHERE student  = :student";
            $stmt = $pdo->prepare($sql_str);
         
            $student    = $_POST['student'];
            $type      = $_POST['type'];
         
            $stmt->bindParam(':student'    ,$student);
            $stmt->bindParam(':type' ,$type);
         
            $stmt->execute();
            header('Location:./finish.php');
           }
        }

        

    }
    catch (PDOException $e ){
        die("Error!: ". $e->getMessage());
      }
}