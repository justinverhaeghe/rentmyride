<?php

class Rent
{

    private int $id_rents;
    private string $startdate;
    private string $enddate;
    private DateTime $created_at;
    private ?DateTime $confirmed_at;
    private int $id_vehicles;
    private int $id_clients;

    /**
     * @return int
     */
    public function get_isd_rents(): int
    {
        return $this->id_rents;
    }

    /**
     * @param int $id_rents
     * 
     * @return [type]
     */
    public function set_id_rents(int $id_rents)
    {
        $this->id_rents = $id_rents;
    }

    /**
     * @return string
     */
    public function get_startdate(): string
    {
        return $this->startdate;
    }

    /**
     * @param string $startdate
     * 
     * @return [type]
     */
    public function set_startdate(string $startdate)
    {
        $this->startdate = $startdate;
    }

    /**
     * @return string
     */
    public function get_enddate(): string
    {
        return $this->enddate;
    }

    /**
     * @param string $enddate
     * 
     * @return [type]
     */
    public function set_enddate(string $enddate)
    {
        $this->enddate = $enddate;
    }

    /**
     * @return DateTime
     */
    public function get_created_at(): DateTime
    {
        return $this->created_at;
    }

    /**
     * @param DateTime $created_at
     * 
     * @return [type]
     */
    public function set_created_at(DateTime $created_at)
    {
        $this->created_at = $created_at;
    }

    /**
     * @return DateTime
     */
    public function get_confirmed_at(): DateTime
    {
        return $this->confirmed_at;
    }

    /**
     * @param DateTime $confirmed_at
     * 
     * @return [type]
     */
    public function set_confirmed_at(DateTime $confirmed_at)
    {
        $this->confirmed_at = $confirmed_at;
    }

    /**
     * @return int
     */
    public function get_id_vehicles(): int
    {
        return $this->id_vehicles;
    }

    /**
     * @param int $id_vehicles
     * 
     * @return [type]
     */
    public function set_id_vehicles(int $id_vehicles)
    {
        $this->id_vehicles = $id_vehicles;
    }

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
    public function set_id_clients(int $id_clients)
    {
        $this->id_clients = $id_clients;
    }

    public function insert(): bool
    {
        $pdo = Database::connect();
        $sql = 'INSERT INTO `rents`(`startdate`, `enddate`, `id_clients`,`id_vehicles`) 
                VALUES (:startdate, :enddate, :id_clients, :id_vehicles);';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':startdate', $this->get_startdate());
        $sth->bindValue(':enddate', $this->get_enddate());
        $sth->bindValue(':id_clients', $this->get_id_clients());
        $sth->bindValue(':id_vehicles', $this->get_id_vehicles());

        $result = $sth->execute();
        return $result;
    }

    public static function getAll()
    {
        $pdo = Database::connect();
        $sql = 'SELECT * 
        FROM `rents` 
        INNER JOIN `clients` ON `rents`.`id_clients` = `clients`.`id_clients` 
        INNER JOIN `vehicles` ON `rents`.`id_vehicles` = `vehicles`.`id_vehicles`;';
        $sth = $pdo->prepare($sql);
        $sth->execute();
        $datas = $sth->fetchAll();
        return $datas;
    }

    public static function confirm($id_rents): bool
    {
        $pdo = Database::connect();
        $sql = 'UPDATE `rents`
                SET `confirmed_at`= NOW()
                WHERE `id_rents`=:id_rents ;';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_rents', $id_rents);
        $sth->execute();

        return (bool) $sth->rowCount();
    }
}
