<?= $this->extend('Layouts/Admin/default') ?>
<?= $this->section('title') ?>
Создать новость
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="container-fluid">
        <div class="row">
            <div class="col-12">
                <div class="page-title-box d-flex align-items-center justify-content-between">
                    <h4 class="mb-0">Создать новость</h4>
                    <div class="page-title-right">
                        <ol class="breadcrumb m-0">
                            <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Панель состояния</a></li>
                            <li class="breadcrumb-item"><a href="<?= base_url('admin/post') ?>">Новости</a></li>
                            <li class="breadcrumb-item active">Создать</li>
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
                    <?php if (session()->has('errors')) : ?>
                        <?php foreach (session('errors') as $error) : ?>
                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                <?= $error ?>
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </div>
                        <?php endforeach ?>
                    <?php endif ?>
                    <form method="post" action="<?= base_url('admin/post/create') ?>">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                        <div class="form-group">
                            <label for="title">Заголовок</label>
                            <input id="title" type="text" name="title" class="form-control" value="<?= old('title') ?>">
                        </div>
                        <div class="form-group">
                            <label for="author_id">Автор</label>
                            <select id="author_id" name="author_id" class="form-control">
                                <option value="">Выберите автора</option>
                                <?php foreach ($users as $userID => $name) : ?>
                                    <?php if (old('author_id') == $userID) : ?>
                                        <option value="<?= $userID ?>" selected><?= $name ?></option>
                                    <?php else : ?>
                                        <option value="<?= $userID ?>"><?= $name ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="category_id">Категория</label>
                            <select id="category_id" name="category_id" class="form-control">
                                <option value="">Выберите категорию</option>
                                <?php foreach ($categories as $categoryID => $name) : ?>
                                    <?php if (old('category_id') == $categoryID) : ?>
                                        <option value="<?= $categoryID ?>" selected><?= $name ?></option>
                                    <?php else : ?>
                                        <option value="<?= $categoryID ?>"><?= $name ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="content">Контент</label>
                            <textarea id="content" type="text" name="content" class="form-control"><?= old('content') ?></textarea>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
