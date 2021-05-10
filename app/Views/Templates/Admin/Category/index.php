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
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Панель состояния</a></li>
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
                                                <a href="<?php echo base_url('admin/category/edit/' . $category['id']); ?>"
                                                        class="btn btn-primary btn-sm">Редактировать</a>
                                                <a href="<?php echo base_url('admin/category/delete/' . $category['id']); ?>"
                                                        class="btn btn-danger btn-sm"
                                                        data-handler="callDeleter"
                                                        data-name="<?= $category['name'] ?>"
                                                        data-entity="<?= 'deleter-' . $category['id'] ?>">Удалить</a>
                                                <form id="deleter-<?= $category['id'] ?>" action="<?= base_url('admin/category/delete/' . $category['id']) ?>" method="POST" style="display: none;">
                                                    <input type="hidden" name="id" id="id" value="<?= $category['id']; ?>">
                                                </form>
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

<!-- Start load style before core -->
<?= $this->section('startStyles') ?>
    <?= $this->include('Components/DataTable/styles') ?>
    <?= $this->include('Components/SweetAlerts/styles') ?>
<?= $this->endSection() ?>

<!-- Start load scripts before core -->
<?= $this->section('startScripts') ?>
    <?= $this->include('Components/DataTable/scripts') ?>
    <?= $this->include('Components/SweetAlerts/scripts') ?>

    <script type="text/javascript">
        $(document).ready(function () {
            <!-- Init Datatable -->
            $('#category-list').DataTable();
            <!-- Init Deleter -->
            $(document).on('click', '[data-handler="callDeleter"]', function (e) {
                e.preventDefault();
                var that = $(this),
                    deleteForm = $(document).find('form#' + that.data('entity'));
                if (deleteForm.length > 0) {
                    Swal.fire({
                        title: "Подтвердите удаление!",
                        text: "Вы действительно хотите удалить " + that.data('name'),
                        icon: "warning",
                        showCancelButton: !0,
                        confirmButtonColor: "#ff3d60",
                        cancelButtonColor: "#34c38f",
                        cancelButtonText: "Отмена",
                        confirmButtonText: "Подтвердить"
                    }).then(function(result) {
                        if (result.isConfirmed) {
                            $(deleteForm).submit();
                        }
                    });
                }
            })
        });
    </script>
<?= $this->endSection() ?>