<?php

/**
 * [Description de la classe Type]
 */
class Type
{
    private int $id_types;
    private string $type;

    /**
     * Méthode retournant la valeur de l'id_types
     * @return int
     */
    public function get_id_types(): int
    {
        return $this->id_types;
    }

    /**
     * Méthode affectant la valeur de l'id_types à une catégorie
     * @return [type]
     */
    public function set_id_types(int $id_types)
    {
        $this->id_types = $id_types;
    }

    /**
     * Méthode retournant la valeur du type.
     * @return [type]
     */
    public function get_type(): string
    {
        return $this->type;
    }

    /**
     * Méthode affectant la valeur du type
     * 
     * @return [type]
     */
    public function set_type(string $type)
    {
        $this->type = $type;
    }

    /**
     * Méthode permettant d'inserer l'input TYPE.
     * @return bool
     */
    public function insert(): bool
    {
        $pdo = connect();
        $sql = 'INSERT INTO `types`(`type`) VALUES (:type);';
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':type', $this->get_type(), PDO::PARAM_STR); //3eme parametre facultatif
        $result = $sth->execute();
        return $result;
    }

    /**
     * Méthode retournant un tableau d'objet des catégories
     * @return array
     */
    public static function get_all(): array
    {
        $pdo = connect();
        $sql = "SELECT * FROM `types`;";
        $sth = $pdo->query($sql);
        $datas = $sth->fetchAll();

        return $datas;
    }

    public static function get(int $id_types): object
    {
        $pdo = connect();
        $sql = "SELECT * FROM `types` WHERE `id_types` = :id_types;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        $sth->execute();
        $result = $sth->fetch();

        return $result;
    }

    public function update(): bool
    {
        $pdo = connect();
        $sql = "UPDATE `types` SET `type` = :type WHERE `id_types` = :id_types;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $this->get_id_types(), PDO::PARAM_INT);
        $sth->bindValue(':type', $this->get_type(), PDO::PARAM_STR);
        $result = $sth->execute();
        return $result;
    }

    public static function delete(int $id_types): bool
    {
        $pdo = connect();
        $sql = "DELETE FROM `types` WHERE `id_types` = :id_types;";
        $sth = $pdo->prepare($sql);
        $sth->bindValue(':id_types', $id_types, PDO::PARAM_INT);
        $result = $sth->execute();
        var_dump($result);
        return $result;
    }
}
