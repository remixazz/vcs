<?php
try
 {
 $pdo = new PDO('mysql:host=localhost;dbname=vcs', 'root', '');
 $sql="INSERT INTO users(login, email, password) VALUES (:login, :email, :password)";
 $stmt=$pdo->prepare($sql);
 
 
 $stmt->bindParam(':login', $_POST['login'], PDO::PARAM_STR);
 $stmt->bindParam(':email', $_POST['email'], PDO::PARAM_STR);
 $stmt->bindParam(':password', md5($_POST['password']), PDO::PARAM_STR);
 $stmt->execute();
 header("Location:index.html");
 echo "<script>alert('Successful registration')</script>";
 } catch(PDOException $e)
 {
 echo 'Connection couldnt be established: ' . $e->getMessage();
 }

?>