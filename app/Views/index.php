<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h2>List of Books</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <p><?= session()->getFlashdata('message') ?></p>
    <?php endif; ?>

    <ul>
        <?php foreach ($books as $book): ?>
            <li>
                <?= esc($book['title']) ?> by <?= esc($book['author']) ?>
                <a href="/books/edit/<?= $book['id'] ?>">Edit</a>
                <a href="/books/delete/<?= $book['id'] ?>">Delete</a>
            </li>
        <?php endforeach; ?>
    </ul>
    <a href="/books/create">Add New Book</a>

<?= $this->endSection() ?>

