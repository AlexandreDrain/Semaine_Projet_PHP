<?php
namespace src\Entity;

class Service {

	/**
	 * nom de l'image (chemin inclu).
	 * @var string
	 */
	private $image_name;
	/**
	 * nom du service proposé par le garagiste
	 * @var string
	 */
	private $service_name;
	/**
	 * description du service proposé par le garagiste
	 * @var string
	 */
	private $description_service;
    /**
     * si oui ou nom le service doit être publié
     * @var boolean
     */
    private $etat_publication;


    /**
     * @return string
     */
    public function getImageName()
    {
        return $this->image_name;
    }

    /**
     * @param string $image_name
     */
    public function setImageName($image_name)
    {
        $this->image_name = $image_name;
    }

    /**
     * @return string
     */
    public function getServiceName()
    {
        return $this->service_name;
    }

    /**
     * @param string $service_name
     */
    public function setServiceName($service_name)
    {
        $this->service_name = $service_name;
    }

    /**
     * @return string
     */
    public function getDescriptionService()
    {
        return $this->description_service;
    }

    /**
     * @param string $description_service
     */
    public function setDescriptionService($description_service)
    {
        $this->description_service = $description_service;
    }

    /**
     * @return boolean
     */
    public function getEtatPublication()
    {
        return $this->etat_publication;
    }

    /**
     * @param boolean $etat_publication
     */
    public function setEtatPublication($etat_publication)
    {
        $this->etat_publication = $etat_publication;
    }

    /**
     * Récupère le nom d'utilisateur, l'email et le mot de passe
     * Prépare la requête SQL pour le "INSERT INTO"
     * @return string
     */
    public function getStrParamsSQL(): string
    {
        // On crée un tableau avec les 3 propriétés
        $tab = [
            htmlentities($this->image_name),
            htmlentities($this->$service_name),
            htmlentities($this->description_service),
            htmlentities($this->etat_publication)
        ];
        // On crée une chaîne de caractères séparés de virgules et les quotes simples
        $str = implode("','", $tab);
        // On a ajoute une quote simple au début et une à la fin
        // On retourne l'ensemble
        return "'" . $str . "'";
    }

    
}
