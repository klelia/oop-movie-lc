<?php
class Category
{
    public string $name;
    function __construct($name)
    {
        $this->name = $name;

    }
    public static function fetchCategories()
    {
        //leggo il json
        $data = file_get_contents(__DIR__ . '/categories_db.json');
        //trasformo il json in array php
        $dataToArray = json_decode($data, true);
        //creo un nuovo array vuoto  che conterrà tutte le categorie come oggetti
        $categories = [];

        foreach ($dataToArray as $key => $value) {
            $categories[] = new Category($value);
        }

        return $categories;
    }
}