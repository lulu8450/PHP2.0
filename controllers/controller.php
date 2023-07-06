<?php
require "models/UsersManager.class.php";
require "models/ComputersManager.class.php";

class UsersController
{
    private $usersManager;
    public function __construct()
    {
        $this->usersManager = new UsersManager;
        $this->usersManager->chargementUsers();
    }
    public function afficherUsers()
    {
        $user = $this->usersManager->getUser();
        require "views/users.views.php";
    }

    public function afficherUser($id)
    {
        $users = $this->usersManager->getUsersById($id);
        require "views/user.views.php";
    }
    public function supprimerUsers($id)
    {
        $this->usersManager->suppressionUsersBD($id);
        header('Location: ' . URL . "users");
    }

    public function ajoutUsers()
    {
        require "views/ajoutUsers.view.php";
    }

    public function ajoutUsersValidation()
    {
        $this->usersManager->ajoutUsersBd($_POST['username'], $_POST['password'], $_POST['role']);
        header('Location: ' . URL . "users");
    }

    public function modificationUsersValidation($id)
    {
        $this->usersManager->modificationUsersBD($id, $_POST['username'], $_POST['password'], $_POST['role']);
        header('Location: ' . URL . "users");
    }

}

class ComputersController
{
    private $computersManager;
    public function __construct()
    {
        $this->computersManager = new ComputersManager;
        $this->computersManager->chargementComputers();
    }
    public function afficherComputers()
    {
        $computer = $this->computersManager->getComputer();
        require "views/computers.views.php";
    }

    public function afficherComputer($id)
    {
        $users = $this->computersManager->getComputersById($id);
        require "views/computer.views.php";
    }
    public function supprimerComputers($id)
    {
        $this->computersManager->suppressionComputersBD($id);
        header('Location: ' . URL . "computers");
    }

    public function ajoutComputers()
    {
        require "views/ajoutComputers.view.php";
    }

    public function ajoutComputersValidation()
    {
        $this->computersManager->ajoutComputersBd($_POST['computername']);
        header('Location: ' . URL . "computers");
    }

    public function modificationComputersValidation($id)
    {
        $this->computersManager->modificationComputersBD($id, $_POST['computername']);
        header('Location: ' . URL . "computers");
    }
}
