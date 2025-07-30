<!DOCTYPE html>
<html>
<head>
    <title><?= esc($title ?? 'Library App') ?></title>
    <link rel="stylesheet" href="<?= base_url('css/style.css') ?>">
</head>
<body>
    <div class="container">
        <?= $this->renderSection('content') ?>
    </div>
</body>
</html>
