<?php
require_once "Model.class.php";
require_once "Computers.class.php";
class ComputersManager extends Model
{
    private $computer;

    public function ajoutComputers($computers)
    {
        $this->computer[] = $computers;
    }

    public function getComputer()
    {
        return $this->computer;
    }

    public function chargementComputers()
    {
        $req = $this->getBdd()->prepare("SELECT * FROM computers");
        $req->execute();
        $allComputers = $req->fetchAll(PDO::FETCH_ASSOC);
        $req->closeCursor();
        foreach ($allComputers as $computers) {
            $r = new Computers($computers['id'], $computers['computername']);
            $this->ajoutComputers($r);
        }
    }

    public function getComputersById($id)
    {
        for ($i = 0; $i < count($this->computer); $i++) {
            if ($this->computer[$i]->getId() === $id) {
                return $this->computer[$i];
            }
        }
    }

    public function suppressionComputersBD($id)
    {
        $req = " Delete from computers where id = :idComputers ";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":idComputers", $id, PDO::PARAM_INT);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $computers = $this->getComputersById($id);
            unset($computers);
        }
    }

    public function ajoutComputersBd($computername)
    {
        $req = " INSERT INTO computers (computername) values (:computername)";
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":computername", $computername, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
        if ($resultat > 0) {
            $computers = new Computers($this->getBdd()->lastInsertId(), $computername);
            $this->ajoutComputers($computers);
        }
    }

    public function modificationComputersBD($id, $computername)
    {
        $req = " update computers set computername = :computername where id = :id ";
        
        $stmt = $this->getBdd()->prepare($req);
        $stmt->bindValue(":id", $id, PDO::PARAM_INT);
        $stmt->bindValue(":computername", $computername, PDO::PARAM_STR);
        $resultat = $stmt->execute();
        $stmt->closeCursor();
    }
}
