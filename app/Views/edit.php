<?= $this->extend('layout') ?>

<?= $this->section('content') ?>
    <h2>Edit Book</h2>

    <form action="/books/update/<?= esc($book['id']) ?>" method="post" enctype="multipart/form-data">
        <label>Title: <input type="text" name="title" value="<?= esc($book['title']) ?>" required></label><br>
        <label>Author: <input type="text" name="author" value="<?= esc($book['author']) ?>" required></label><br>
        <label>Genre: <input type="text" name="genre" value="<?= esc($book['genre']) ?>" required></label><br>
        <label>Publication Year: <input type="number" name="publication_year" value="<?= esc($book['publication_year']) ?>" required></label><br>
        <label>Cover Image (optional):
        <input type="file" name="cover_image" accept="image/*">
        <input type="hidden" name="old_cover_image" value="<?= esc($book['cover_image']) ?>">
        </label><br>
        <button type="submit">Update</button>
    </form>
<?= $this->endSection() ?>