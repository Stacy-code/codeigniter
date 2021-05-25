<?= $this->include('Layouts/partials/header-home') ?>

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
<div class="row justify-content-center mt-5">

    <form method="POST" action="<?= base_url('/create') ?>" class="col-6">
        <div class="form-group mb-2">
            <label for="author">Author</label>
            <input name="author" type="text" class="form-control" id="author" aria-describedby="emailHelp" placeholder="Author">
        </div>
        <div class="form-group mb-2">
            <label for="email">Email</label>
            <input name="email" type="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="alex@mail.com">
        </div>
        <div class="form-group mb-2">
            <label for="title">Title</label>
            <input name="title"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Title">
        </div>
        <div class="form-group mb-2">
            <label for="content">Question</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"></textarea>
        </div>
        <div class="form-group mt-2">
            <button name="save" type="submit" class="btn btn-outline-primary">Send</button>
        </div>
    </form>
</div>


<?= $this->include('Layouts/partials/footer-home') ?>
