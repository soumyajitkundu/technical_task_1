<?php
    require_once('./config/db1.php');

    function fetchRecordAll($entity,$start=0,$end=10)
    {
        // fetch records for entity(category, article, comment) where status is true
        // start and end will control the behaviour for pagination  
        $sql = "select * from $entity where status = 'A' limit $start, $end";
        global $con;
        $res = mysqli_query($con,$sql);
        $data=array();
        if(mysqli_num_rows($res)>0)
        {
            while($record = mysqli_fetch_assoc($res))
            {
                $data[]=$record;
            }
            return $data;
        }
        else
        {
            return false;
        }
       
    }

    function fetchRecordSpecific($entity,$primary)
    {
        // fetch single record for entity(category, article, comment)
        $sql = "select * from $entity where id=$primary";
        global $con;
        $res = mysqli_query($con,$sql);
        $data=array();
        if(mysqli_num_rows($res)>0)
        {
            while($record = mysqli_fetch_assoc($res))
            {
                $data=$record;
            }
            return $data;    
        }
        else
        {
            return false;
        }
    
    }

    function insertRecord($entity,$data)
    {
        // insert single record for entity(category, article, comment) with data passed
        //echo 'Insert Called';
        global $con;
        //using switch case structure
        switch($entity)
        {

            case 'user':
                $sql = "INSERT INTO user(`name`,`email`,`pwd`,`status`) VALUES ('$data[user]','$data[email]','$data[pwd]','A')"; 
                $res= mysqli_query($con,$sql);
                break;
        
            case 'category':
        
                $sql = "INSERT INTO category(`name`, `desc1`, `status`, `created`, `updated`) VALUES ('$data[user]','$data[desc1]','$data[status]','$data[created]', '$data[updated]')";
                $res= mysqli_query($con,$sql);
                break;
        
        
            case 'article':

                $sql = "INSERT INTO article(`author`, `category`, `title`, `content`, `created`, `updated`, `status`) VALUES ('$data[author]','$data[category]','$data[title]','$data[content]','$data[created]','$data[updated]','$data[status]')";
                $res= mysqli_query($con,$sql);
                break;
        
            case 'comment':
                $sql = "INSERT INTO comment(`person`, `content`, `created`, `status`, `article`) VALUES ('$data[person]','$data[content]','$data[created]','$data[status]','$data[article]')";
                $res= mysqli_query($con,$sql);
                break;
        }
       
    }

    function updateRecord($entity,$primary,$data)
    {
        // update single record for entity(category, article, comment) using its primary key with data passed
        $sql ='';
        global $con;
        if($entity == 'user')
        {
             $sql = "UPDATE `user` SET `name` = '$data[name]' ,`email` = '$data[email]',`pwd` = '$data[pwd]' ,`status` = '$data[status]'  where `id` = $primary ";
            $res = mysqli_query($con,$sql);
            if(mysqli_num_rows($res)>0){
                echo "updated record";
            }else{
                echo "not updated";
            }
        }
        if($entity == 'category'){
             $sql = "UPDATE `category` SET `name`='$data[name]',`desc1`='$data[desc1]',`status`='$data[status]',`updated` = now(), `created` = now() WHERE `id` = $primary";
            $res = mysqli_query($con,$sql);
        }
        if($entity == 'article'){
             $sql = "UPDATE `article` SET `author`= '$data[author]' ,`category` = '$data[category]',`title` = '$data[title]',`content` = '$data[content]',`updated` = NOW()   where `id` = $primary ";
            $res = mysqli_query($con,$sql);
            if(mysqli_num_rows($res)>0){
                echo "updated record";
            }else{
                echo "not updated";
            }
        }
        if($entity == 'user'){
             $sql = "UPDATE `comment` SET `person`= '$data[person]',`content`= '$data[content]',,`article`= '$data[article]',`status` = '$data[status]'  where `id` = $primary ";
            $res = mysqli_query($con,$sql);
            if(mysqli_num_rows($res)>0){
                echo "updated record";
            }else{
                echo "not updated";
            }
        }       
    }
    function deleteRecord($entity,$primary)
    {
        // delete single record for entity(category, article, comment) using its primary key
        global $con;
        $sql="delete from $entity where id=$primary";
        $res=mysqli_query($con,$sql);
        if(mysqli_affected_rows($GLOBALS['con'])>0)
        {
            return ture;
        }
        else
        {
            return false;
        }
    }
    function authenticate($username, $pwd)
    {
        // if successful, redirect to dashboard
        // else stay on login page
        global $con;
        $sql = "select * from user where name= '$username' and status='A' and pwd='$pwd'";
        $res = mysqli_query($con, $sql);
        return $res;
    }
?>