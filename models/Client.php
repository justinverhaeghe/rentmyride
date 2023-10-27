<?php

class Client
{

    private int $id_clients;
    private string $lastname;
    private string $firstname;
    private string $email;
    private string $birthday;
    private string $phone;
    private string $city;
    private string $zipcode;
    private DateTime $created_at;
    private DateTime $updated_at;

    /**
     * @return int
     */
    public function get_id_clients(): int
    {
        return $this->id_clients;
    }

    /**
     * @param int $id_clients
     * 
     * @return [type]
     */
    public function set_is_clients(int $id_clients)
    {
        $this->id_clients = $id_clients;
    }

    /**
     * @return string
     */
    public function get_lastname(): string
    {
        return $this->lastname;
    }

    /**
     * @param string $lastname
     * 
     * @return [type]
     */
    public function set_lastname(string $lastname)
    {
        $this->lastname = $lastname;
    }

    /**
     * @return string
     */
    public function get_firstname(): string
    {
        return $this->firstname;
    }

    /**
     * @param string $firstname
     * 
     * @return [type]
     */
    public function set_firstname(string $firstname)
    {
        $this->firstname = $firstname;
    }

    /**
     * @return string
     */
    public function get_email(): string
    {
        return $this->email;
    }

    /**
     * @param string $email
     * 
     * @return [type]
     */
    public function set_email(string $email)
    {
        $this->email = $email;
    }

    /**
     * @return DateTime
     */
    public function get_birthday(): string
    {
        return $this->birthday;
    }

    /**
     * @param Datetime $birthday
     * 
     * @return [type]
     */
    public function set_birthday(string $birthday)
    {
        $this->birthday = $birthday;
    }

    /**
     * @return string
     */
    public function get_phone(): string
    {
        return $this->phone;
    }

    /**
     * @param string $phone
     * 
     * @return [type]
     */
    public function set_phone(string $phone)
    {
        $this->phone = $phone;
    }

    /**
     * @return string
     */
    public function get_city(): string
    {
        return $this->city;
    }

    /**
     * @param string $city
     * 
     * @return [type]
     */
    public function set_city(string $city)
    {
        $this->city = $city;
    }

    /**
     * @return string
     */
    public function get_zipcode(): string
    {
        return $this->zipcode;
    }

    /**
     * @param string $zipcode
     * 
     * @return [type]
     */
    public function set_zipcode(string $zipcode)
    {
        $this->zipcode = $zipcode;
    }

    /**
     * @return DateTime
     */
    public function get_created_at(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @param Datetime $created_at
     * 
     * @return [type]
     */
    public function set_created_at(Datetime $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return DateTime
     */
    public function get_updated_at(): DateTime
    {
        return $this->updated_at;
    }

    /**
     * @param DateTime $updated_at
     * 
     * @return [type]
     */
    public function set_updated_at(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    /**
     * Méthode d'insertion en base de donnée des infos clients
     * @return bool
     */
    public function insert(): int
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `clients`(`lastname`, `firstname`, `email`,`birthday`, `phone`, `city`, `zipcode`) 
                VALUES (:lastname, :firstname, :email, :birthday, :phone, :city, :zipcode);';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':lastname', $this->get_lastname());
        $sth->bindValue(':firstname', $this->get_firstname());
        $sth->bindValue(':email', $this->get_email());
        $sth->bindValue(':birthday', $this->get_birthday());
        $sth->bindValue(':phone', $this->get_phone());
        $sth->bindValue(':city', $this->get_city());
        $sth->bindValue(':zipcode', $this->get_zipcode(), PDO::PARAM_INT);

        $sth->execute();
        $result = $pdo->lastInsertId();
        return $result;
    }
}
