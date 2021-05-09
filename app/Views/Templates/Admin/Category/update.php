<?= $this->extend('Layouts/Admin/default') ?>
<?= $this->section('title') ?>
Категории
<?= $this->endSection() ?>
<?= $this->section('content') ?>
<div class="container-fluid">
    <div class="row">
        <div class="col-12">
            <div class="page-title-box d-flex align-items-center justify-content-between">
                <h4 class="mb-0">Редактировать: <?= $model['name'] ?></h4>
                <div class="page-title-right">
                    <ol class="breadcrumb m-0">
                        <li class="breadcrumb-item"><a href="<?= base_url('admin') ?>">Панель состояния</a></li>
                        <li class="breadcrumb-item"><a href="<?= base_url('admin/category') ?>">Категории</a></li>
                        <li class="breadcrumb-item active">Редактировать</li>
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
                    <form method="post" action="<?= base_url('admin/category/update/' . $model['id']) ?>">
                        <div class="form-group text-right">
                            <button type="submit" class="btn btn-primary">Сохранить</button>
                        </div>
                        <div class="form-group">
                            <label for="name">Название</label>
                            <input id="name" type="text" name="name" class="form-control" value="<?= old('name') ?? $model['name'] ?>">
                        </div>
                        <div class="form-group">
                            <?php $currentID = old('parent_id') ?? $model['parent_id']; ?>
                            <label for="parent">Родитель</label>
                            <select id="parent" name="parent_id" class="form-control">
                                <option value="">Выберите родительскую категорию</option>
                                <?php foreach ($parents as $parentID => $name) : ?>
                                    <?php if ($currentID == $parentID) : ?>
                                        <option value="<?= $parentID ?>" selected><?= $name ?></option>
                                    <?php else : ?>
                                        <option value="<?= $parentID ?>"><?= $name ?></option>
                                    <?php endif; ?>
                                <?php endforeach; ?>
                            </select>
                        </div>
                        <div class="form-group">
                            <label for="description">Описание</label>
                            <textarea id="description" type="text" name="description" class="form-control"><?= old('description') ?? $model['description'] ?></textarea>
                        </div>
                        <input type="hidden" name="id" id="id" value="<?= $model['id']; ?>">
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
<?= $this->endSection() ?>
