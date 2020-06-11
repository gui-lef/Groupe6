<?php


class Goodie
{
    private $nomGoodie;
    private $descriptionGoodie;
    private $prixGoodie;
    private $imageGoodie;
    private $image2Goodie;
    private $dateAjoutGoodie;
    private $qteGoodie;

    private $db;

    /**
     * @return mixed
     */
    public function getNomGoodie()
    {
        return $this->nomGoodie;
    }

    /**
     * @param mixed $nomGoodie
     * @return Goodie
     */
    public function setNomGoodie($nomGoodie)
    {
        $this->nomGoodie = htmlspecialchars(trim($nomGoodie));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescriptionGoodie()
    {
        return $this->descriptionGoodie;
    }

    /**
     * @param mixed $descriptionGoodie
     * @return Goodie
     */
    public function setDescriptionGoodie($descriptionGoodie)
    {
        $this->descriptionGoodie = htmlspecialchars(trim($descriptionGoodie));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrixGoodie()
    {
        return $this->prixGoodie;
    }

    /**
     * @param mixed $prixGoodie
     * @return Goodie
     */
    public function setPrixGoodie($prixGoodie)
    {
        $this->prixGoodie = htmlspecialchars(trim($prixGoodie));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageGoodie()
    {
        return $this->imageGoodie;
    }

    /**
     * @param mixed $imageGoodie
     * @return Goodie
     */
    public function setImageGoodie($imageGoodie)
    {
        $this->imageGoodie = htmlspecialchars(trim($imageGoodie));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage2Goodie()
    {
        return $this->image2Goodie;
    }

    /**
     * @param mixed $image2Goodie
     * @return Goodie
     */
    public function setImage2Goodie($image2Goodie)
    {
        $this->image2Goodie = htmlspecialchars(trim($image2Goodie));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateAjoutGoodie()
    {
        return $this->dateAjoutGoodie;
    }

    /**
     * @param mixed $dateAjoutGoodie
     * @return Goodie
     */
    public function setDateAjoutGoodie($dateAjoutGoodie)
    {
        $this->dateAjoutGoodie = htmlspecialchars(trim($dateAjoutGoodie));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQteGoodie()
    {
        return $this->qteGoodie;
    }

    /**
     * @param mixed $qteGoodie
     * @return Goodie
     */
    public function setQteGoodie($qteGoodie)
    {
        $this->qteGoodie = htmlspecialchars(trim($qteGoodie));
        return $this;
    }

    public function __construct($db)
    {
        $this->db=$db;
    }

    public function insert(){
        $sqlInsertGoodie="INSERT INTO goodie (nomGoodie,descriptionGoodie,prixGoodie,imageGoodie,image2Goodie,dateAjoutGoodie,qteGoodie)
                          VALUES (:goo1,:goo2,:goo3,:goo4,:goo5,NOW(),:goo6)";
        $reqInsertGoodie=$this->db->prepare($sqlInsertGoodie);
        $reqInsertGoodie->bindParam(':goo1',$this->nomGoodie);
        $reqInsertGoodie->bindParam(':goo2',$this->descriptionGoodie);
        $reqInsertGoodie->bindParam(':goo3',$this->prixGoodie);
        $reqInsertGoodie->bindParam(':goo4',$this->imageGoodie);
        $reqInsertGoodie->bindParam(':goo5',$this->image2Goodie);
        $reqInsertGoodie->bindParam(':goo6',$this->qteGoodie);
        $reqInsertGoodie->execute();

    }
}