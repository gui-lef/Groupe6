<?php

 namespace App\Models;
 use Core\Model;

class Dvd extends Model
{
    private $nomDvd;
    private $descriptionDvd;
    private $prixDvd;
    private $imageDvd;
    private $image2Dvd;
    private $dateAjoutDvd;
    private $qteDvd;

    private $db;

    public function __construct($db)
    {
        $this->db=$db;
    }

    /**
     * @return mixed
     */
    public function getNomDvd()
    {
        return $this->nomDvd;
    }

    /**
     * @param mixed $nomDvd
     * @return Dvd
     */
    public function setNomDvd($nomDvd)
    {
        $this->nomDvd = htmlspecialchars(trim($nomDvd));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescriptionDvd()
    {
        return $this->descriptionDvd;
    }

    /**
     * @param mixed $descriptionDvd
     * @return Dvd
     */
    public function setDescriptionDvd($descriptionDvd)
    {
        $this->descriptionDvd = htmlspecialchars(trim($descriptionDvd));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrixDvd()
    {
        return $this->prixDvd;
    }

    /**
     * @param mixed $prixDvd
     * @return Dvd
     */
    public function setPrixDvd($prixDvd)
    {
        $this->prixDvd = htmlspecialchars(trim($prixDvd));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageDvd()
    {
        return $this->imageDvd;
    }

    /**
     * @param mixed $imageDvd
     * @return Dvd
     */
    public function setImageDvd($imageDvd)
    {
        $this->imageDvd = htmlspecialchars(trim($imageDvd));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage2Dvd()
    {
        return $this->image2Dvd;
    }

    /**
     * @param mixed $image2Dvd
     * @return Dvd
     */
    public function setImage2Dvd($image2Dvd)
    {
        $this->image2Dvd = htmlspecialchars(trim($image2Dvd));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateAjoutDvd()
    {
        return $this->dateAjoutDvd;
    }

    /**
     * @param mixed $dateAjoutDvd
     * @return Dvd
     */
    public function setDateAjoutDvd($dateAjoutDvd)
    {
        $this->dateAjoutDvd = htmlspecialchars(trim($dateAjoutDvd));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQteDvd()
    {
        return $this->qteDvd;
    }

    /**
     * @param mixed $qteDvd
     * @return Dvd
     */
    public function setQteDvd($qteDvd)
    {
        $this->qteDvd = htmlspecialchars(trim($qteDvd));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDb()
    {
        return $this->db;
    }

    /**
     * @param mixed $db
     * @return Dvd
     */
    public function setDb($db)
    {
        $this->db = $db;
        return $this;
    }


    public function insert(){
        $sqlInsertDvd="INSERT INTO dvdbluray (nomDvd,descriptionDvd,prixDvd,imageDvd,image2Dvd,dateAjoutDvd,qteDvd)
                        VALUES (:dvd1,:dvd2,:dvd3,:dvd4,:dvd5,NOW(),:dvd6) ";
        $reqInsertDvd= $this->db->prepare($sqlInsertDvd);
        $reqInsertDvd-> bindParam(":dvd1",$this->nomDvd);
        $reqInsertDvd-> bindParam(":dvd2",$this->descriptionDvd);
        $reqInsertDvd-> bindParam(":dvd3",$this->prixDvd);
        $reqInsertDvd-> bindParam(":dvd4",$this->imageDvd);
        $reqInsertDvd-> bindParam(":dvd5",$this->image2Dvd);
        $reqInsertDvd-> bindParam(":dvd6",$this->qteDvd);
        $reqInsertDvd->execute();
    }
    public function select()
    {
        $sqlSelectEmailCo = "SELECT * FROM dvdbluray WHERE id =:id";
        $reqSelectEmailCo = $this->db->prepare($sqlSelectEmailCo);
        $reqSelectEmailCo->bindParam(":id", $this->id);

        $reqSelectEmailCo->execute();
        return $reqSelectEmailCo->fetch();


    }

}