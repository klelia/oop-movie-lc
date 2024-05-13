<?php
include_once __DIR__ . '/../Traits/DrawCard.php';
class User
{
    use DrawCard;
    protected $id;
    protected $name;
    protected $surname;
    protected $role;
    protected $userImg;
    public function __construct($id, $name, $surname, $role, $userImg)
    {
        $this->id = $id;
        $this->name = $name;
        $this->surname = $surname;
        $this->role = $role;
        $this->userImg = $userImg;
    }

    public static function fetchAll()
    {
        $data = [
            [
                "id" => 1,
                "name" => "Wayne",
                "surname" => "Barnett",
                "role" => "Founder & CEO",
                "userImg" => "wayne-barnett-founder-ceo.jpg"

            ],
            [
                "id" => 2,
                "name" => "Angela",
                "surname" => "Caroll",
                "role" => "Chief Editor",
                "userImg" => "angela-caroll-chief-editor.jpg"
            ]
        ];
        $users = [];
        foreach ($data as $item) {

            $users[] = new User($item['id'], $item['name'], $item['surname'], $item['role'], $item['userImg']);
        }
        return $users;
    }
    public function formatItem()
    {
        $item = [
            'image' => './images/' . $this->userImg,
            'title' => $this->name . ' ' . $this->surname,
            'custom' => $this->role,
            'category' => '',
            'vote' => ''
        ];
        return $item;
    }
    function multiplication($int)
    {
        if (!is_int($int)) {
            throw new Exception('Is not a number. File User.php');
        }
        return $int * 5;
    }
}
