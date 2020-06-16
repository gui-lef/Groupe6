<?php


class Utilisateur
{
    private $nomUti;
    private $prenomUti;
    private $emailUti;
    private $mdpUti;
    private $telUti;
    private $typeUtilisateur_idTypeUtilisateur;
    private $adresse_idAdresse;

    private $db;

    /**
     * @return mixed
     */
    public function getNomUti()
    {
        return $this->nomUti;
    }

    /**
     * @param mixed $nomUti
     * @return Utilisateur
     */
    public function setNomUti($nomUti)
    {
        $this->nomUti = $nomUti;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getPrenomUti()
    {
        return $this->prenomUti;
    }

    /**
     * @param mixed $prenomUti
     * @return Utilisateur
     */
    public function setPrenomUti($prenomUti)
    {
        $this->prenomUti = $prenomUti;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getEmailUti()
    {
        return $this->emailUti;
    }

    /**
     * @param mixed $emailUti
     * @return Utilisateur
     */
    public function setEmailUti($emailUti)
    {
        $this->emailUti = $emailUti;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getMdpUti()
    {
        return $this->mdpUti;
    }

    /**
     * @param mixed $mdpUti
     * @return Utilisateur
     */
    public function setMdpUti($mdpUti)
    {
        $this->mdpUti = $mdpUti;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTelUti()
    {
        return $this->telUti;
    }

    /**
     * @param mixed $telUti
     * @return Utilisateur
     */
    public function setTelUti($telUti)
    {
        $this->telUti = $telUti;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getTypeUtilisateurIdTypeUtilisateur()
    {
        return $this->typeUtilisateur_idTypeUtilisateur;
    }

    /**
     * @param mixed $typeUtilisateur_idTypeUtilisateur
     * @return Utilisateur
     */
    public function setTypeUtilisateurIdTypeUtilisateur($typeUtilisateur_idTypeUtilisateur)
    {
        $this->typeUtilisateur_idTypeUtilisateur = $typeUtilisateur_idTypeUtilisateur;
        return $this;
    }

    /**
     * @return mixed
     */
    public function getAdresseIdAdresse()
    {
        return $this->adresse_idAdresse;
    }

    /**
     * @param mixed $adresse_idAdresse
     * @return Utilisateur
     */
    public function setAdresseIdAdresse($adresse_idAdresse)
    {
        $this->adresse_idAdresse = $adresse_idAdresse;
        return $this;
    }

    public function __construct($db)
    {
        $this->db = $db;
    }

    public function verifEmail()
    {
        $sqlSelectEmailCo = "SELECT idUtilisateur,mdpUti,prenomUti FROM utilisateur WHERE emailUti =:emailConnex";
        $reqSelectEmailCo = $this->db->prepare($sqlSelectEmailCo);
        $reqSelectEmailCo->bindParam(":emailConnex", $this->emailUti);

        return $reqSelectEmailCo->execute();


    }

    public function insert()
    {
        $sqlUtilisateur = "INSERT INTO utilisateur (nomUti,prenomUti,emailUti,mdpUti,telUti,adresse_idAdresse) 
                               VALUES (:uti1,:uti2,:uti3,:uti4,:uti5,:uti6)";
        $reqUtilisateur = $this->db->prepare($sqlUtilisateur);
        $reqUtilisateur->bindParam(":uti1", $this->nomUti);
        $reqUtilisateur->bindParam(":uti2", $this->prenomUti);
        $reqUtilisateur->bindParam(":uti3", $this->emailUti);
        $reqUtilisateur->bindParam(":uti4", $this->mdpUti);
        $reqUtilisateur->bindParam(":uti5", $this->telUti);
        $reqUtilisateur->bindParam(":uti6", $this->adresse_idAdresse);

        $reqUtilisateur->execute();
    }
}