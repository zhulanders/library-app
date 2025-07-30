<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h2>Add a New Book</h2>

    <form action="/books/store" method="post">
        <label>Title: <input type="text" name="title" required></label><br>
        <label>Author: <input type="text" name="author" required></label><br>
        <label>Genre: <input type="text" name="genre" required></label><br>
        <label>Publication Year: <input type="number" name="publication_year" required></label><br>
        <button type="submit">Save</button>
    </form>
<?= $this->endSection() ?>