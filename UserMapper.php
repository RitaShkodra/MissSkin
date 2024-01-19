<?php 
include_once '../database/databaseConnection.php';

class UserMapper{
    private $connection;

    function __construct(){
        $conn = new Database;
        $this->connection = $conn->pdo;
    }


    function insertUser($user){

        $conn = $this->connection;

        $id = $user->getId();
        $fullname = $user->getFullname();
        $username = $user->getUsername();
        $email = $user->getEmail();
        $password = $user->getPassword();

        $sql = "INSERT INTO user (id,fullname,username,email,password) VALUES (?,?,?,?,?,?)";

        $statement = $conn->prepare($sql);

        $statement->execute([$id,$fullname,$username, $email, $password]);

        echo "<script> alert('User has been inserted successfuly!'); </script>";

    }

    function getAllUsers(){
        $conn = $this->connection;

        $sql = "SELECT * FROM user";

        $statement = $conn->query($sql);
        $users = $statement->fetchAll();

        return $users;
    }

    function getUserById($id){
        $conn = $this->connection;

        $sql = "SELECT * FROM user WHERE id='$id'";

        $statement = $conn->query($sql);
        $user = $statement->fetch();

        return $user;
    }

    function updateUser($id,$fullname,$username, $email, $password){
         $conn = $this->connection;

         $sql = "UPDATE user SET fullname=?,  username=?, email=?, password=? WHERE id=?";

         $statement = $conn->prepare($sql);

         $statement->execute([$fullname,$username,$email,$password,$id]);

         echo "<script>alert('update was successful'); </script>";
    } 

    function deleteUser($id){
        $conn = $this->connection;

        $sql = "DELETE FROM user WHERE id=?";

        $statement = $conn->prepare($sql);

        $statement->execute([$id]);

        echo "<script>alert('delete was successful'); </script>";
   } 
    function makeUserAdmin($userID)
    {
        $conn = $this->connection;

        $sql = "UPDATE user SET role=1 WHERE userID=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$userID]);

        echo "<script>alert('User has been made an admin successfully!');</script>";
    }
    public function makeAdminUser($userID)
    {
        $conn = $this->connection;

        $sql = "UPDATE user SET role=0 WHERE userID=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$userID]);

        echo "<script>alert('Admin has been made a user successfully!');</script>";
    }
    public function emailExists($email)
    {
        $conn = $this->connection;

        $sql = "SELECT COUNT(*) FROM user WHERE email=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$email]);

        return $statement->fetchColumn() > 0;
    }

    public function usernameExists($username)
    {
        $conn = $this->connection;

        $sql = "SELECT COUNT(*) FROM user WHERE username=?";
        $statement = $conn->prepare($sql);
        $statement->execute([$username]);

        return $statement->fetchColumn() > 0;
    }

    public function countUsers()
    {
        $conn = $this->connection;

        $sql = "SELECT COUNT(*) FROM user";
        $statement = $conn->prepare($sql);
        $statement->execute();

        return $statement->fetchColumn();
    }
}



?>