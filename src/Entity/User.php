<?php
namespace src\Entity;

class User
{

	/**
	 * @var string
	 */
	private $name;
	/**
	 * @var string
	 */
	private $last_name;
	/**
	 * @var string
	 */
	private $email;
	/**
	 * @var string
	 */
	private $password;
	/**
	 * @var string
	 */
	private $role;


	/**
     * Initialisation des propriétés de l'utilisateur à la construction de l'objet
     * @param string $username
     * @param string $email
     * @param string $password
     */
    public function __construct(string $name,string $lastName, string $email, string $password, string $role)
    {
        $this->name = $name;
        $this->lastName = $lastName;
        $this->email = $email;
        $this->setPassword($password);
        $this->role = $role;
    }


    /**
     * @return string
     */
    public function getName()
    {
        return $this->name;
    }

    /**
     * @param string $name
     */
    public function setName($name)
    {
        $this->name = $name;
    }

    /**
     * @return string
     */
    public function getLastName()
    {
        return $this->last_name;
    }

    /**
     * @param string $last_name
     */
    public function setLastName($last_name)
    {
        $this->last_name = $last_name;
    }

    /**
     * @return string
     */
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * @param string $email
     */
    public function setEmail($email)
    {
        $this->email = $email;
    }

    /**
     * @return string
     */
    public function getPassword()
    {
        return $this->password;
    }

    /**
     * Ajoute et hash le mot de passe
     * @param string $password
     */
    public function setPassword(string $password): void
    {
        // Hashage
        $hash = password_hash($password, PASSWORD_BCRYPT);
        // Stockage
        $this->password = $hash;
    }

   
    // public function getPasswordVerifi()
    // {
    //     return $this->passwordVerifi;
    // }

    
    // public function setPasswordVerifi(string $password): void
    // {
    //     // Hashage
    //     $hash = password_hash($password, PASSWORD_BCRYPT);
    //     // Stockage
    //     $this->password = $hash;
    // }
    


    /**
     * @return string
     */
    public function getRole()
    {
        return $this->role;
    }

    /**
     * @param string $role
     */
    public function setRole($role)
    {
        $this->role = $role;
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
            htmlentities($this->name),
            htmlentities($this->lastName),
            htmlentities($this->email),
            htmlentities($this->password),
            htmlentities($this->role)
        ];
        // On crée une chaîne de caractères séparés de virgules et les quotes simples
        $str = implode("','", $tab);
        // On a ajoute une quote simple au début et une à la fin
        // On retourne l'ensemble
        return "'" . $str . "'";
    }

}