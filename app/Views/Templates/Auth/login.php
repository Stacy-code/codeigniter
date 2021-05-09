<?= $this->extend('Layouts/Auth/default') ?>
<?= $this->section('title') ?>
    Войти
<?= $this->endSection() ?>
<?= $this->section('content') ?>
    <div class="container-fluid p-0">
        <div class="row no-gutters">
            <div class="col-lg-4">
                <div class="authentication-page-content p-4 d-flex align-items-center min-vh-100">
                    <div class="w-100">
                        <div class="row justify-content-center">
                            <div class="col-lg-9">
                                <div>
                                    <div class="text-center">
                                        <div>
                                            <a href="<?= base_url('/') ?>" class="logo">
                                                <img src="<?= base_url('themes/ui/images/logo-dark.png') ?>">
                                            </a>
                                        </div>
                                        <h4 class="font-size-18 mt-4">Добро пожаловать</h4>
                                        <p class="text-muted">Войдите, чтобы продолжить</p>
                                    </div>
                                    <div class="p-2 mt-5">
                                        <?php if (session()->has('error')) : ?>
                                            <div class="alert alert-danger alert-dismissible fade show" role="alert">
                                                <?= session('error') ?>
                                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                    <span aria-hidden="true">&times;</span>
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
                                        <form class="form-horizontal" method="POST" action="<?= base_url('login'); ?>" accept-charset="UTF-8">
                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-at-line auti-custom-input-icon"></i>
                                                <label for="email">Email <i class="text-danger">*</i></label>
                                                <input type="text" class="form-control" id="email" name="email" value="<?= old('email') ?>"
                                                        placeholder="email@example.com" required>
                                            </div>
                                            <div class="form-group auth-form-group-custom mb-4">
                                                <i class="ri-lock-2-line auti-custom-input-icon"></i>
                                                <label for="password">Пароль <i class="text-danger">*</i></label>
                                                <input type="password" class="form-control" id="password" name="password"
                                                        placeholder="password" required>
                                            </div>
                                            <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="remember" name="remember">
                                                <label class="custom-control-label" for="remember">Запомнить меня</label>
                                            </div>
                                            <div class="d-flex justify-content-around align-items-center mt-4">
                                                <a href="<?= base_url('forgot-password'); ?>" class="text-muted">
                                                    <i class="mdi mdi-lock mr-1"></i> Забыли пароль?
                                                </a>
                                                <button class="btn btn-primary w-md waves-effect waves-light" type="submit">
                                                    Войти
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="col-lg-8">
                <div class="authentication-bg">
                    <div class="bg-overlay"></div>
                </div>
            </div>
        </div>
    </div>
<?= $this->endSection() ?>