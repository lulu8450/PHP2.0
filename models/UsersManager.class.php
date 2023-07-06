<?php
require_once "Model.class.php";
require_once "Users.class.php";
class UsersManager extends Model
{
    private $user;

    public function ajoutUsers($users)
    {
        $this->user[] = $users;
    }

    public function getUser()
    {
        return $this->user;
    }

    public function chargementUsers()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM users");
        $req->execute();
        $allUsers = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($allUsers as $users) {
            $r = new Users($users['id'], $users['username'], $users['password'], $users['role']);
            $this->ajoutUsers($r);
        }
    }

    public function getUsersById($id)
    {
        for ($i = 0; $i < count($this->user); $i++) {
            if ($this->user[$i]->getId() === $id) {
                return $this->user[$i];
            }
        }
    }

    public function suppressionUsersBD($id)
    {
        $req = "
        Delete from users where id = :idUsers
        ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idUsers", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $users = $this->getUsersById($id);
            unset($users);
        }
    }

    public function ajoutUsersBd($username, $password, $role)
    {
        $req = " INSERT INTO users (username, password, role) values (:username, :password, :role)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->bindValue(":role", $role, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $users = new Users($this->getBdd()->lastInsertId(), $username, $password , $role);
            $this->ajoutUsers($users);
        }
    }

    public function modificationUsersBD($id, $username, $password, $role)
    {
        $req = " update users set username = :username, password = :password, role = :role where id = :id ";
        
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":username", $username, PDO::PARAM_STR);
        $stmt->bindValue(":password", $password, PDO::PARAM_STR);
        $stmt->bindValue(":role", $role, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
    }
}
