<?php

namespace App\Models;

use Core\Model;

class Figurine extends Model
{
    private $nomFigurine;
    private $descriptionFigurine;
    private $prixFigurine;
    private $imageFigurine;
    private $image2Figurine;
    private $dateAjoutFigurine;
    private $qteFigurine;

    private $db;

    /**
     * @return mixed
     */
    public function getNomFigurine()
    {
        return $this->nomFigurine;
    }

    /**
     * @param mixed $nomFigurine
     * @return Figurine
     */
    public function setNomFigurine($nomFigurine)
    {
        $this->nomFigurine = htmlspecialchars(trim($nomFigurine));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescriptionFigurine()
    {
        return $this->descriptionFigurine;
    }

    /**
     * @param mixed $descriptionFigurine
     * @return Figurine
     */
    public function setDescriptionFigurine($descriptionFigurine)
    {
        $this->descriptionFigurine = htmlspecialchars(trim($descriptionFigurine));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrixFigurine()
    {
        return $this->prixFigurine;
    }

    /**
     * @param mixed $prixFigurine
     * @return Figurine
     */
    public function setPrixFigurine($prixFigurine)
    {
        $this->prixFigurine = htmlspecialchars(trim($prixFigurine));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageFigurine()
    {
        return $this->imageFigurine;
    }

    /**
     * @param mixed $imageFigurine
     * @return Figurine
     */
    public function setImageFigurine($imageFigurine)
    {
        $this->imageFigurine = htmlspecialchars(trim($imageFigurine));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage2Figurine()
    {
        return $this->image2Figurine;
    }

    /**
     * @param mixed $image2Figurine
     * @return Figurine
     */
    public function setImage2Figurine($image2Figurine)
    {
        $this->image2Figurine = htmlspecialchars(trim($image2Figurine));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateAjoutFigurine()
    {
        return $this->dateAjoutFigurine;
    }

    /**
     * @param mixed $dateAjoutFigurine
     * @return Figurine
     */
    public function setDateAjoutFigurine($dateAjoutFigurine)
    {
        $this->dateAjoutFigurine = htmlspecialchars(trim($dateAjoutFigurine));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQteFigurine()
    {
        return $this->qteFigurine;
    }

    /**
     * @param mixed $qteFigurine
     * @return Figurine
     */
    public function setQteFigurine($qteFigurine)
    {
        $this->qteFigurine = htmlspecialchars(trim($qteFigurine));
        return $this;
    }

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function insert()
    {
        $sqlInsertFig = "INSERT INTO figurine (nomFigurine,descriptionFigurine,prixFigurine,imageFigurine,image2Figurine,dateAjoutFigurine,qteFigurine) 
                          VALUES (:fig1,:fig2,:fig3,:fig4,:fig5,NOW(),:fig6)";
        $reqInsertFig = $this->db->prepare($sqlInsertFig);
        $reqInsertFig->bindParam(":fig1", $this->nomFigurine);
        $reqInsertFig->bindParam(":fig2", $this->descriptionFigurine);
        $reqInsertFig->bindParam(":fig3", $this->prixFigurine);
        $reqInsertFig->bindParam(":fig4", $this->imageFigurine);
        $reqInsertFig->bindParam(":fig5", $this->image2Figurine);
        $reqInsertFig->bindParam(":fig6", $this->qteFigurine);

        $reqInsertFig->execute();

    }

    public function select()
    {
        $sqlSelectEmailCo = "SELECT * FROM figurine WHERE id =:id";
        $reqSelectEmailCo = $this->db->prepare($sqlSelectEmailCo);
        $reqSelectEmailCo->bindParam(":id", $this->id);

        $reqSelectEmailCo->execute();
        return $reqSelectEmailCo->fetch();


    }
}