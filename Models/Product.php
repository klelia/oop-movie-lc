<?php
include_once __DIR__ . '/Category.php';
abstract class Product
{
    protected int $id;
    protected string $title;
    protected Category $category;

    protected float $price;
    protected float $rating;
    protected string $cover;

    public function __construct($id, $title, $price, $rating, $cover, $category)
    {
        $this->id = $id;
        $this->title = $title;
        $this->rating = $rating;
        $this->cover = $cover;
        $this->category = $category;
        $this->price = $price;
    }


    abstract function formatItem();

    protected function getVote()
    {
        $voteINT = ceil($this->rating / 2);
        $template = "<p>";
        for ($n = 1; $n <= 5; $n++) {
            $template .= $n <= $voteINT ? '<i class="fa-solid fa-star"></i>' : '<i class="fa-regular fa-star"></i>';
        }
        $template .= "</p>";
        return $template;
    }
    public static function fetchAll($path, $class)
    {
        $data = file_get_contents(__DIR__ . '/' . $path . '.json');
        $dataToArray = json_decode($data, true);
        $categories = Category::fetchCategories();
        $field = ($class == 'Movie') ? 'language' : 'numPages';
        $books = [];
        foreach ($dataToArray as $item) {
            $category = null;
            foreach ($categories as $cat) {
                if ($cat->name == $item['category']) {
                    $category = $cat;
                }
            }
            $books[] = new $class($item['id'], $item['title'], $item[$field], $item['price'], $item['rating'], $item['cover'], $category);
        }
        return $books;
    }

    public function printCard($item)
    {
        extract($item);
        include __DIR__ . '/../Views/card.php';
    }
}