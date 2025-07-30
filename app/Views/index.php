<h2>Books List</h2>

<?php if (session()->getFlashdata('message')): ?>
    <p style="color: green;"><?= session()->getFlashdata('message') ?></p>
<?php endif; ?>

<ul>
<?php foreach ($books as $book): ?>
    <li><strong><?= esc($book['title']) ?></strong> by <?= esc($book['author']) ?> (<?= esc($book['genre']) ?>, <?= esc($book['publication_year']) ?>)</li>
<?php endforeach ?>
</ul>

<a href="/books/create">Add New Book</a>
