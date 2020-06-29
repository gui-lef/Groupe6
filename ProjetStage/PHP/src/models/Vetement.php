<?php

namespace App\Models;
use Core\Model;

class Vetement extends Model
{
    private $nomVetement;
    private $descriptionVetement;
    private $prixVetement;
    private $tailleVetement;
    private $imageVetement;
    private $image2Vetement;
    private $dateAjoutVetement;
    private $qteVetement;

    private $db;

    /**
     * @return mixed
     */
    public function getNomVetement()
    {
        return $this->nomVetement;
    }

    /**
     * @param mixed $nomVetement
     * @return Vetement
     */
    public function setNomVetement($nomVetement)
    {
        $this->nomVetement =htmlspecialchars(trim($nomVetement));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescriptionVetement()
    {
        return $this->descriptionVetement;
    }

    /**
     * @param mixed $descriptionVetement
     * @return Vetement
     */
    public function setDescriptionVetement($descriptionVetement)
    {
        $this->descriptionVetement = htmlspecialchars(trim($descriptionVetement));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrixVetement()
    {
        return $this->prixVetement;
    }

    /**
     * @param mixed $prixVetement
     * @return Vetement
     */
    public function setPrixVetement($prixVetement)
    {
        $this->prixVetement = htmlspecialchars(trim($prixVetement));
        return $this;
    }
    /**
     * @return mixed
     */
    public function getTailleVetement()
    {
        return $this->tailleVetement;
    }

    /**
     * @param mixed $tailleVetement
     * @return Vetement
     */
    public function setTailleVetement($tailleVetement)
    {
        $this->tailleVetement = htmlspecialchars(trim($tailleVetement));
        return $this;
    }
    /**
     * @return mixed
     */
    public function getImageVetement()
    {
        return $this->imageVetement;
    }

    /**
     * @param mixed $imageVetement
     * @return Vetement
     */
    public function setImageVetement($imageVetement)
    {
        $this->imageVetement = htmlspecialchars(trim($imageVetement));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage2Vetement()
    {
        return $this->image2Vetement;
    }

    /**
     * @param mixed $image2Vetement
     * @return Vetement
     */
    public function setImage2Vetement($image2Vetement)
    {
        $this->image2Vetement = htmlspecialchars(trim($image2Vetement));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateAjoutVetement()
    {
        return $this->dateAjoutVetement;
    }

    /**
     * @param mixed $dateAjoutVetement
     * @return Vetement
     */
    public function setDateAjoutVetement($dateAjoutVetement)
    {
        $this->dateAjoutVetement = htmlspecialchars(trim($dateAjoutVetement));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQteVetement()
    {
        return $this->qteVetement;
    }

    /**
     * @param mixed $qteVetement
     * @return Vetement
     */
    public function setQteVetement($qteVetement)
    {
        $this->qteVetement = htmlspecialchars(trim($qteVetement));
        return $this;
    }
    public function __construct($db){
        $this->db=$db;
    }
    public function insert(){
        $sqlInsertVetement="INSERT INTO vetement (nomVetement,descriptionVetement,prixVetement,tailleVetement,imageVetement,image2Vetement,dateAjoutVetement,qteVetement)
                                VALUES (:vet1,:vet2,:vet3,:vet4,:vet5,:vet6,NOW(),:vet7)";
        $reqInsertVetement=$this->db->prepare($sqlInsertVetement);
        $reqInsertVetement->bindParam(':vet1',$this->nomVetement);
        $reqInsertVetement->bindParam(':vet2',$this->descriptionVetement);
        $reqInsertVetement->bindParam(':vet3',$this->prixVetement);
        $reqInsertVetement->bindParam(':vet4',$this->tailleVetement);
        $reqInsertVetement->bindParam(':vet5',$this->imageVetement);
        $reqInsertVetement->bindParam(':vet6',$this->image2Vetement);
        $reqInsertVetement->bindParam(':vet7',$this->qteVetement);
        $reqInsertVetement->execute();
    }
    public function select()
    {
        $sqlSelectEmailCo = "SELECT * FROM vetement WHERE id =:id";
        $reqSelectEmailCo = $this->db->prepare($sqlSelectEmailCo);
        $reqSelectEmailCo->bindParam(":id", $this->id);

        $reqSelectEmailCo->execute();
        return $reqSelectEmailCo->fetch();


    }
}