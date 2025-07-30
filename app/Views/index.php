<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h2>List of Books</h2>

    <?php if (session()->getFlashdata('message')): ?>
        <p><?= session()->getFlashdata('message') ?></p>
    <?php endif; ?>

    <ul style="list-style: none; padding: 0;">
        <?php foreach ($books as $book): ?>
    <li style="display: flex; align-items: center; gap: 10px; margin-bottom: 10px;">
        <img src="<?= base_url($book['cover_image'] ?? 'images/placeholder.png') ?>"
             alt="Cover"
             width="60" height="90"
             style="object-fit: cover; border-radius: 4px; border: 1px solid #ccc;">

        <div>
            <strong><?= esc($book['title']) ?></strong> by <?= esc($book['author']) ?><br>
            <strong>Genre: </strong><?= esc($book['genre']) ?><br>
            <form action="/books/edit/<?= $book['id'] ?>" method="get" style="display: inline;">
                <button type="submit" style="background-color: #4CAF50; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">Edit</button>
            </form>
            <form action="/books/delete/<?= $book['id'] ?>" method="get" style="display: inline;">
                <button type="submit" style="background-color: #f44336; color: white; border: none; padding: 5px 10px; border-radius: 4px; cursor: pointer;">Delete</button>
            </form>
        </div>
    </li>
<?php endforeach; ?>
    </ul>
    <a href="/books/create">Add New Book</a>

<?= $this->endSection() ?>