<?= $this->include('Layouts/partials/header-home') ?>


<?php if(!empty($items)) : ?>

<?php foreach($items as $item) : ?>
        <div class=" mt-2 d-flex justify-content-center">
<div class="card col-lg-6 border  rounded shadow p-3 mb-4 ">
    <div class="card-header" style="background-color: #2196f3">
        <strong><?=$item['title'] ?></strong>
    </div>
    <div class="card-body " >
        <blockquote class="blockquote mb-0">
            <h5><?= $item['author'] ?></h5>
            <p><?= $item['content'] ?></p>
            <footer class="blockquote-footer"><?= $item['created_at'] ?></footer>
        </blockquote>
    </div>
</div>
        </div>
<?php endforeach ?>

<?php else :?>

<div class="alert alert-info  alert-dismissible fade show" role="alert">
    <strong>No questions</strong>
    <button type="button" class="close" data-dismiss="alert" aria-label="Close">
        <span aria-hidden="true">&times;</span>
    </button>
</div>

<?php endif ?>



<?= $this->include('Layouts/partials/footer-home') ?>


