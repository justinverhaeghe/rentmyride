<?php

class Vehicle
{

    private int $id_vehicles;
    private string $brand;
    private string $model;
    private string $registration;
    private int $mileage;
    private ?int $picture;
    private DateTime $created_at;
    private DateTime $updated_at;
    private ?DateTime $deleted_at;
    private int $id_types;

    /**
     * Méthode retournant la valeur de l'ID_vehicles
     * @return int
     */
    public function get_id_vehicles(): int
    {
        return $this->id_vehicles;
    }

    /**
     * Méthode affectant la valeur de l'Id_vehicles à un véhicule
     * @return [type]
     */
    public function set_id_vehicles(int $id_vehicles)
    {
        $this->id_vehicles = $id_vehicles;
    }

    public function get_brand(): string
    {
        return $this->brand;
    }

    public function set_brand(string $brand)
    {
        $this->brand = $brand;
    }

    public function get_model(): string
    {
        return $this->model;
    }

    public function set_model(string $model)
    {
        $this->model = $model;
    }

    public function get_registration(): string
    {
        return $this->registration;
    }

    public function set_registration(string $registration)
    {
        $this->registration = $registration;
    }

    public function get_mileage(): string
    {
        return $this->mileage;
    }

    public function set_mileage(string $mileage)
    {
        $this->mileage = $mileage;
    }

    public function get_picture(): ?string
    {
        return $this->picture;
    }

    public function set_picture(?string $picture)
    {
        $this->picture = $picture;
    }

    public function get_created_at(): DateTime
    {
        return $this->created_at;
    }

    public function set_created_at(Datetime $created_at)
    {
        $this->created_at = $created_at;
    }

    public function get_updated_at(): DateTime
    {
        return $this->updated_at;
    }

    public function set_updated_at(DateTime $updated_at)
    {
        $this->updated_at = $updated_at;
    }

    public function get_deleted_at(): ?DateTime
    {
        return $this->deleted_at;
    }

    public function set_deleted_at(?DateTime $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }

    public function get_id_types(): int
    {
        return $this->id_types;
    }

    public function set_id_types(int $id_types)
    {
        $this->id_types = $id_types;
    }

    public function insert(): bool
    {
        $pdo = connect();
        $sql = 'INSERT INTO `vehicles`(`id_types`, `brand`, `model`, `registration`, `mileage`) VALUES (:id_type, :brand, :model, :registration, :mileage);';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_type', $this->get_id_types(), PDO::PARAM_INT);
        $sth->bindValue(':brand', $this->get_brand(), PDO::PARAM_STR);
        $sth->bindValue(':model', $this->get_model(), PDO::PARAM_STR);
        $sth->bindValue(':registration', $this->get_registration(), PDO::PARAM_STR);
        $sth->bindValue(':mileage', $this->get_mileage(), PDO::PARAM_INT);
        $result = $sth->execute();
        return $result;
    }

    public static function get_all(): array
    {
        $pdo = connect();
        $sql = "SELECT `vehicles`.*, `types`.`type` 
        FROM `vehicles` 
        INNER JOIN `types` ON `vehicles`.`Id_types` = `types`.`Id_types`;";
        $sth = $pdo->query($sql);
        $datas = $sth->fetchAll();

        return $datas;
    }

    public static function get_first10(): array
    {
        $pdo = connect();
        $sql = "SELECT `vehicles`.*, `types`.`type` 
        FROM `vehicles` 
        INNER JOIN `types` ON `vehicles`.`Id_types` = `types`.`Id_types`
        LIMIT 10;";
        $sth = $pdo->query($sql);
        $datas = $sth->fetchAll();

        return $datas;
    }
}
