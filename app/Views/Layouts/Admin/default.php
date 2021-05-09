<!doctype html>
<html lang="uk">
<head>
    <meta charset="utf-8"/>
    <title><?= env('app.name') ?? 'Codeigniter' ?> - <?= $this->renderSection('title') ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="shortcut icon" href="<?= base_url('themes/ui/images/favicon.ico') ?>">
    <link rel="stylesheet" id="bs-css" href="<?= base_url('themes/ui/css/bootstrap.min.css') ?>">
    <link rel="stylesheet" id="icons-css" href="<?= base_url('themes/ui/css/icons.min.css') ?>">
    <link rel="stylesheet" id="theme-css" href="<?= base_url('themes/ui/css/app.min.css') ?>">
    <?= $this->renderSection('styles') ?>
</head>
<body data-sidebar="dark">
<main id="layout-wrapper">
    <div id="layout-wrapper">
        <?= $this->include('Layouts/Admin/Partials/header') ?>
        <?= $this->include('Layouts/Admin/Partials/sidebar') ?>
        <div class="main-content">
            <div class="page-content">
                <?= $this->renderSection('content') ?>
            </div>
        </div>
    </div>
</main>
<script src="<?= base_url('themes/ui/libs/jquery/jquery.min.js') ?>"></script>
<script src="<?= base_url('themes/ui/libs/bootstrap/js/bootstrap.bundle.min.js') ?>"></script>
<script src="<?= base_url('themes/ui/libs/metismenu/metisMenu.min.js') ?>"></script>
<script src="<?= base_url('themes/ui/libs/simplebar/simplebar.min.js') ?>"></script>
<script src="<?= base_url('themes/ui/libs/node-waves/waves.min.js') ?>"></script>
<script src="<?= base_url('themes/ui/js/app.js') ?>"></script>
<?= $this->renderSection('scripts') ?>
</body>
</html>