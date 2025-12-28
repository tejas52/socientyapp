<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <title><?= $this->fetch('title') ?: 'Admin Panel' ?></title>
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Font Awesome -->
    <?= $this->Html->css('https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css') ?>

    <!-- Bootstrap 4 -->
    <?= $this->Html->css('https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css') ?>

    <!-- AdminLTE -->
    <?= $this->Html->css('/adminlte/dist/css/adminlte.min.css') ?>

    <?= $this->fetch('css') ?>
</head>

  <body class="layout-fixed sidebar-expand-lg bg-body-tertiary">
<div class="app-wrapper">

    <!-- Navbar -->

    <!-- Sidebar -->

    <!-- Content Wrapper -->
    <?= $this->element('admin/sidebar') ?>

        <!-- Page Header -->
        <section class="content-header">
            <div class="container-fluid">
                <h1><?= $this->fetch('title') ?></h1>
            </div>
        </section>

        <!-- Main Content -->
        <section class="content">
            <!-- ❌ DO NOT add extra container-fluid here -->
            <?= $this->fetch('content') ?>
        </section>


    <!-- Footer -->
    <?= $this->element('admin/footer') ?>

</div>

<!-- ✅ SCRIPT ORDER IS CRITICAL -->

<!-- jQuery FIRST -->
<?= $this->Html->script('https://code.jquery.com/jquery-3.6.0.min.js') ?>

<!-- Bootstrap Bundle -->
<?= $this->Html->script('https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js') ?>

<!-- AdminLTE -->
<?= $this->Html->script('/adminlte/dist/js/adminlte.min.js') ?>

<?= $this->fetch('script') ?>
</body>
</html>
