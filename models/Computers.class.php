<?php
class Computers
{
    private $id;
    private $computername;
    private $computerstatus = "Non-Assigner";

    public function __construct($id, $computername, )
    {
        $this->id = $id;
        $this->computername = $computername;
        // $this->computerstatus = $computerstatus;
    }
    public function getId()
    {
        return $this->id;
    }
    public function setId($id)
    {
        $this->id = $id;
    }
    public function getComputername()
    {
        return $this->computername;
    }
    public function setComputername($computername)
    {
        $this->computername = $computername;
    }
    public function setComputerstatus($computerstatus)
    {
        $this->computerstatus = $computerstatus;
    }
    public function getComputerstatus()
    {
        return $this->computerstatus;
    }
}
