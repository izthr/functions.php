<?php 
function db_conn() { 
$host = 'localhost';          //ホスト名　'127.0.0.1'; 

$db = 'lesson1';              //データベース名 

$db_user = 'root';            //MySQL接続ユーザー名 

$db_pass = '';                //MySQL接続パスワード 

$charset = 'utf8mb4';         //文字コード 

$dsn = "mysql:host=$host;dbname=$db;charset=$charset";   //DSN 



try { 

    $pdo = new PDO($dsn, $db_user, $db_pass); 
    $pdo->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION); 
    $pdo->setAttribute(PDO::ATTR_EMULATE_PREPARES, false); 
     $sql = "INSERT INTO user (email, name, gender) VALUE (:email, :name, :gender)"; 
      $stmt =$pdo ->prepare($sql);
   $stmt->bindValue(':email',  $_SESSION['email'], PDO::PARAM_STR); 
    $stmt->bindValue(':name', $_SESSION['name'], PDO::PARAM_STR); 
    $stmt->bindValue(':gender',$_SESSION['gender'], PDO::PARAM_STR); 

    $stmt->execute(); 

    
} catch (PDOException $e) { 

   echo $e->getMessage(); 
 die();

} 
}
?>
  