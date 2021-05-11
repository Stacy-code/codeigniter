<?php 

/**
 * @var array $items
 */

?>

<?= $this->extend('Layouts/Admin/default') ?>
<?= $this->section('title') ?>
    Новости
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Список новостей</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Панель состояния</a></li>
                            <li class="breadcrumb-item active">Новости</li>
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
                        <h4 class="card-title">Список новостей</h4>
                        <table id="post-list" class="table table-bordered">
                            <thead>
                            <tr>
                                <th>ID</th>
                                <th>Заголовок</th>
                                <th>Опубликовано</th>
                                <th>Дата публикации</th>
                                <th>Дата добавления</th>
                                <th>Дата обновления</th>
                                <th>Действия</th>
                            </tr>
                            </thead>
                            <tbody>
                            <?php if (\is_array($items)): ?>
                                <?php foreach ($items as $post): ?>
                                    <tr>
                                        <td><?php echo $post['id']; ?></td>
                                        <td><?php echo $post['title']; ?></td>
                                        <td><?php echo $post['publish']; ?></td>
                                        <td><?php echo $post['published_at']; ?></td>
                                        <td><?php echo $post['created_at']; ?></td>
                                        <td><?php echo $post['updated_at']; ?></td>
                                        <td>
                                            <?php if (!is_null($post['id'])) : ?>
                                                <a href="<?= base_url('admin/post/edit/' . $post['id']); ?>"
                                                        class="btn btn-primary btn-sm">Редактировать</a>
                                                <a href="<?php echo base_url('admin/post/delete/' . $post['id']); ?>"
                                                        class="btn btn-danger btn-sm"
                                                        data-handler="callDeleter"
                                                        data-name="<?= $post['title'] ?>"
                                                        data-entity="<?= 'deleter-' . $post['id'] ?>">Удалить</a>
                                                <form id="deleter-<?= $post['id'] ?>" action="<?= base_url('admin/post/delete/' . $post['id']) ?>" method="POST" style="display: none;">
                                                    <input type="hidden" name="id" id="id" value="<?= $post['id']; ?>">
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
            $('#post-list').DataTable();
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