<?php

include __DIR__ . '/Views/header.php';
include __DIR__ . '/Models/Movie.php';
include __DIR__ . '/Models/Book.php';

$movies = Product::fetchAll('movies_db', 'Movie');
$books = Product::fetchAll('books_db', 'Book');
?>
<main class="container">
    <section>
        <h2>Movies</h2>
        <div class="row">
            <?php foreach ($movies as $movie) {
                echo $movie->printCard($movie->formatItem());
            } ?>
        </div>
    </section>
    <section>
        <h2>Books</h2>
        <div class="row">
            <?php foreach ($books as $book) {
                echo $book->printCard($book->formatItem());
            } ?>
        </div>
    </section>

</main>

<?php include __DIR__ . '/Views/footer.php'; ?>