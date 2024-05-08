<?php
include_once __DIR__ . '/Product.php';
class Movie extends Product
{
    private $language;
    public function __construct($id, $title, $language, $price, $rating, $cover, $category)
    {
        parent::__construct($id, $title, $price, $rating, $cover, $category);
        $this->language = $language;


    }
    public function formatItem()
    {
        $item = [
            'image' => $this->cover,
            'title' => $this->title,
            'custom' => $this->language,
            'category' => $this->category->name,
            'vote' => $this->getVote()
        ];
        return $item;
    }


}
