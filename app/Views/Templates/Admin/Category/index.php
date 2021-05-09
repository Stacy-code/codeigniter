<?= $this->extend('Layouts/Admin/default') ?>
<?= $this->section('title') ?>
    Категории
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Список категорий</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="javascript: void(0);">Панель состояния</a></li>
                            <li class="breadcrumb-item active">Категории</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title">Список категорий</h4>
                        <table id="category-list" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Название</th>
                                <th>Описание</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (\is_array($items)): ?>
                                <?php foreach ($items as $category): ?>
                                    <tr>
                                        <td><?php echo $category['id']; ?></td>
                                        <td><?php echo $category['name']; ?></td>
                                        <td><?php echo $category['description']; ?></td>
                                        <td>
                                            <?php if (!is_null($category['parent_id'])) : ?>
                                                <a href="<?php echo base_url('admin/category/edit/' . $category['id']); ?>" class="btn btn-primary btn-sm">Редагувати</a>
                                                <a href="<?php echo base_url('admin/category/delete/' . $category['id']); ?>" class="btn btn-danger btn-sm">Видалити</a>
                                            <?php endif; ?>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            <?php endif; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>

<?= $this->include('Components/DataTable/assets') ?>
<?= $this->section('content') ?>
    <script type="text/javascript">
        $(document).ready(function () {
            $('#category-list').DataTable();
        });
    </script>
<?= $this->endSection() ?>