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
}
