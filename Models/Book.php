<?php
include_once __DIR__ . '/Product.php';

class Book extends Product
{
    private $numPages;
    public function __construct($id, $title, $numPages, $price, $rating, $cover, $category)
    {
        parent::__construct($id, $title, $price, $rating, $cover, $category);
        $this->numPges = $numPages;


    }
    public function formatItem()
    {
        $item = [
            'image' => $this->cover,
            'title' => $this->title,
            'custom' => $this->numPages,
            'category' => $this->category->name,
            'vote' => $this->getVote()
        ];
        return $item;
    }

}
