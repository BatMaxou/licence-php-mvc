<?php
$title = 'Your movies';

$moviesElement = '';
foreach ($movies as $movie) {
    $moviesElement .= '
        <div>
            <h2>' . $movie['title'] . '</h2>
            <p>' . $movie['synopsis'] . '</p>
            <p>' . $movie['release_date'] . '</p>
        </div>
    ';
}

$body = '
    <section id="movies">
        <h1>Your movies</h1>
        ' . $moviesElement . '
    </section>
';

require_once(__DIR__ . '/../includes/base.php');
