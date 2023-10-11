<?php

class Vehicle
{

    private int $id_vehicles;
    private string $brand;
    private string $model;
    private string $registration;
    private int $milleage;
    private int $picture;
    private DateTime $created_at;
    private DateTime $updated_at;
    private DateTime $deleted_at;

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

    public function set_model(string $brand)
    {
        $this->brand = $brand;
    }

    public function get_registration(): string
    {
        return $this->registration;
    }

    public function set_registration(string $registration)
    {
        $this->registration = $registration;
    }

    public function get_milleage(): string
    {
        return $this->milleage;
    }

    public function set_milleage(string $milleage)
    {
        $this->milleage = $milleage;
    }

    public function get_picture(): string
    {
        return $this->picture;
    }

    public function set_picture(string $picture)
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

    public function get_deleted_at(): DateTime
    {
        return $this->deleted_at;
    }

    public function set_deleted_at(DateTime $deleted_at)
    {
        $this->deleted_at = $deleted_at;
    }
}
