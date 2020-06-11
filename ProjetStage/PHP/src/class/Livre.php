<?php


class Livre
{
    private $nomLivre;
    private $descriptionLivre;
    private $prixLivre;
    private $imageLivre;
    private $image2Livre;
    private $dateAjoutLivre;
    private $qteLivre;

    private $db;


    /**
     * @return mixed
     */
    public function getNomLivre()
    {
        return $this->nomLivre;
    }

    /**
     * @param mixed $nomLivre
     * @return Livre
     */
    public function setNomLivre($nomLivre)
    {
        $this->nomLivre = htmlspecialchars(trim($nomLivre));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDescriptionLivre()
    {
        return $this->descriptionLivre;
    }

    /**
     * @param mixed $descriptionLivre
     * @return Livre
     */
    public function setDescriptionLivre($descriptionLivre)
    {
        $this->descriptionLivre =htmlspecialchars(trim( $descriptionLivre));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrixLivre()
    {
        return $this->prixLivre;
    }

    /**
     * @param mixed $prixLivre
     * @return Livre
     */
    public function setPrixLivre($prixLivre)
    {
        $this->prixLivre = htmlspecialchars(trim($prixLivre));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImageLivre()
    {
        return $this->imageLivre;
    }

    /**
     * @param mixed $imageLivre
     * @return Livre
     */
    public function setImageLivre($imageLivre)
    {
        $this->imageLivre = htmlspecialchars(trim($imageLivre));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getImage2Livre()
    {
        return $this->image2Livre;
    }

    /**
     * @param mixed $image2Livre
     * @return Livre
     */
    public function setImage2Livre($image2Livre)
    {
        $this->image2Livre = htmlspecialchars(trim($image2Livre));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getDateAjoutLivre()
    {
        return $this->dateAjoutLivre;
    }

    /**
     * @param mixed $dateAjoutLivre
     * @return Livre
     */
    public function setDateAjoutLivre($dateAjoutLivre)
    {
        $this->dateAjoutLivre = htmlspecialchars(trim($dateAjoutLivre));
        return $this;
    }

    /**
     * @return mixed
     */
    public function getQteLivre()
    {
        return $this->qteLivre;
    }

    /**
     * @param mixed $qteLivre
     * @return Livre
     */
    public function setQteLivre($qteLivre)
    {
        $this->qteLivre = htmlspecialchars(trim($qteLivre));
        return $this;
    }

    public function __construct($db)
    {
        $this->db=$db;
    }
    public function insert(){


    $sqlInsertLivre ="INSERT INTO livre (nomLivre,descriptionLivre,prixLivre,imageLivre,image2Livre,dateAjoutLivre,qteLivre)
                              VALUES (:liv1,:liv2,:liv3,:liv4,:liv5,NOW(),:liv6)";
    $reqInsertLivre = $this->db->prepare($sqlInsertLivre);
    $reqInsertLivre->bindParam(":liv1", $this->nomLivre);
    $reqInsertLivre->bindParam(":liv2", $this->descriptionLivre);
    $reqInsertLivre->bindParam(":liv3", $this->prixLivre);
    $reqInsertLivre->bindParam(":liv4", $this->imageLivre);
    $reqInsertLivre->bindParam(":liv5", $this->image2Livre);
    $reqInsertLivre->bindParam(":liv6", $this->qteLivre);

    $reqInsertLivre->execute();
    }

}
