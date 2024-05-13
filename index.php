<?php

include __DIR__ . '/Views/header.php';
include __DIR__ . '/Models/Movie.php';
include __DIR__ . '/Models/Book.php';
include __DIR__ . '/Models/User.php';

$movies = Product::fetchAll('movies_db', 'Movie');
$books = Product::fetchAll('books_db', 'Book');
$users = User::fetchAll();
?>
<main class="container">
    <section>
        <h2>Movies</h2>
        <div class="row">
            <?php foreach ($movies as $movie) {
                $movie->printCard($movie->formatItem());
            } ?>
        </div>
    </section>
    <section>
        <h2>Books</h2>
        <div class="row">
            <?php foreach ($books as $book) {
                $book->printCard($book->formatItem());
            } ?>
        </div>
    </section>
    <section>
        <h2>Users</h2>
        <div class="row">
            <?php foreach ($users as $user) {
                try {
                    echo $user->multiplication('ciao');
                } catch (Exception $e) {
                    echo 'Eccezione: ' . $e->getMessage() . 'Line: ' . $e->getLine();
                }

                $user->printCard($user->formatItem());
            } ?>
        </div>
    </section>

</main>

<?php include __DIR__ . '/Views/footer.php'; ?>