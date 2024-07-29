<?php

class User
{
    private $db;

    function __construct()
    {
        $this->db = new PDO('mysql:host=localhost;dbname=voyage-reservation',
            "root", "");
    }

    function index()
    {
        $query = "select * from user where role='ROLE_CLIENT'";
        $clients = $this->db->query($query);
        return $clients;
    }

    function create($data)
    {
        $first_name = $data['first_name'];
        $last_name = $data['last_name'];
        $email = $data['email'];
        $role = "ROLE_CLIENT";
        $pass = md5($data['password']);
        $this->db->exec("insert into user values ('', '$first_name','$last_name','$email','$role','$pass')");
    }

    //Suppression d'1 client
    function delete($id)
    {
        $this->db->exec("delete from user where id='$id'");
    }

    //MAJ d'1 client
//    function updateClient($data)
//    {
//        try {
//            $id = $data['clientId'];
//            $first_name = $data['first_name'];
//            $last_name = $data['last_name'];
//            $email = $data['email'];
//            $password = md5($data['password']);
//            $role = "ROLE_CLIENT";
//            $this->db->exec("update client set nom ='$first_name', prenom='$last_name', email = '$email', role = '$role', password = '$password' where id='$id'");
//        } catch (Exception $e){
//            throw $e;
//        }
//    }

    function update($data)
    {
        try {
            if (empty($data['clientId']) || empty($data['first_name']) || empty($data['last_name']) || empty($data['email']) || empty($data['password'])) {
                throw new Exception('All fields are required.');
            }

            $id = intval($data['clientId']);
            $first_name = htmlspecialchars(trim($data['first_name'])); // Sanitize string input
            $last_name = htmlspecialchars(trim($data['last_name']));
            $email = filter_var($data['email'], FILTER_SANITIZE_EMAIL); // Sanitize email
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                throw new Exception('Invalid email format.');
            }
            $password = md5(trim($data['password']));

            // Prepare SQL statement
            $stmt = $this->db->prepare("UPDATE user SET first_name = :first_name, last_name = :last_name, email = :email, role = :role, password = :password WHERE id = :id");

            // Bind parameters
            $role = "ROLE_CLIENT";
            $stmt->bindParam(':first_name', $first_name);
            $stmt->bindParam(':last_name', $last_name);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':role', $role);
            $stmt->bindParam(':password', $password);
            $stmt->bindParam(':id', $id, PDO::PARAM_INT);

            // Execute the query
            $stmt->execute();

        } catch (PDOException $e) {
            // Log the error message
            error_log("Database error: " . $e->getMessage());

            // Provide a user-friendly message
            throw new Exception("An error occurred while updating the client. Please try again later.");
        } catch (Exception $e) {
            // Log and provide a user-friendly message for general exceptions
            error_log("General error: " . $e->getMessage());

            throw new Exception($e->getMessage());
        }
    }

    //Get User by ID
    function getOneById($id)
    {
        $clients = $this->db->query("select * from user where id='$id'");
        return $clients->fetch();
    }
}