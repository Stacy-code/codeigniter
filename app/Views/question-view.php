<?= $this->include('Layouts/partials/header-home') ?>


<div class=" mt-2 d-flex justify-content-center">
    <div class="card col-lg-6 border  rounded shadow p-3 mb-4 ">
        <div class="card-header" style="background-color: #2196f3">
            <strong><?=$question['title'] ?></strong>
        </div>
        <div class="card-body " >
            <blockquote class="blockquote mb-0">
                <h5><?= $question['author'] ?></h5>
                <p><?= $question['content'] ?></p>
                <footer class="blockquote-footer"><?= $question['created_at'] ?></footer>
            </blockquote>

        </div>
    </div>
</div>

<?php if(!empty($answers)) : ?>

    <?php foreach($answers as $answer) : ?>
        <div class=" mt-2 d-flex justify-content-center">
            <div class="card col-lg-6 border  rounded shadow p-3 mb-4 ">
                <div class="card-header">
                    <strong><?=$answer['author'] ?></strong>
                </div>
                <div class="card-body " >
                    <blockquote class="blockquote mb-0">
                        <p><?= $answer['content'] ?></p>
                        <footer class="blockquote-footer"><?= $answer['date_create'] ?></footer>
                    </blockquote>
                </div>
            </div>
        </div>

    <?php endforeach ?>

<?php else :?>

    <div class="alert alert-info  alert-dismissible fade show" role="alert">
        <strong>No answers</strong>
        <button type="button" class="close" data-dismiss="alert" aria-label="Close">

        </button>
    </div>

<?php endif ?>

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

    <form method="POST" action="<?= base_url('/question/view/'.$question['id']) ?>" class="col-6">
        <p>Please write your answer for question</p>
        <div class="form-group mb-2">
            <label for="author">Author</label>
            <input name="author" type="text" class="form-control" id="author" aria-describedby="emailHelp" value="<?= old('author') ?>" >
        </div>
        <div class="form-group mb-2">
            <label for="content">Answer</label>
            <textarea name="content" class="form-control" id="exampleFormControlTextarea1" rows="3"><?= old('content') ?></textarea>
        </div>
        <div class="form-group mt-2">
            <button name="save" type="submit" class="btn btn-outline-primary">Send</button>
        </div>
    </form>
</div>


<?= $this->include('Layouts/partials/footer-home') ?>
