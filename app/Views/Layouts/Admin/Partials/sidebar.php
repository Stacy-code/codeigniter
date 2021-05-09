<div class="vertical-menu">
    <div data-simplebar class="h-100">
        <div id="sidebar-menu">
            <ul class="metismenu list-unstyled" id="side-menu">
                <li>
                    <a class="waves-effect" href="<?= base_url('/') ?>" target="_blank">
                        <i class="nav-main-link-icon fa fa-share"></i>
                        <span>Перейти на сайт</span>
                    </a>
                </li>
                <li>
                    <a class="waves-effect <?= url_is('admin/dashboard/*') ? 'active' : '' ?>" href="<?= base_url('admin') ?>">
                        <i class="ri-dashboard-line"></i>
                        <span>Панель состояния</span>
                    </a>
                </li>
                <li class="menu-title">Блог</li>
                <li class="<?= url_is('admin/post/*') ? 'mm-active' : '' ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <?= url_is('admin/post/*') ? 'active' : '' ?>">
                        <i class="ri-file-paper-2-line "></i>
                        <span>Новости</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url('admin/post') ?>"
                                    class="<?= url_is('admin/post/index') ? 'active' : '' ?>">Список новостей</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/post/new') ?>"
                                    class="<?= url_is('admin/post/new') ? 'active' : '' ?>">Добавить новость</a>
                        </li>
                    </ul>
                </li>
                <li class="<?= url_is('admin/category/*') ? 'mm-active' : '' ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <?= url_is('admin/category/*') ? 'active' : '' ?>">
                        <i class="ri-layout-3-line"></i>
                        <span>Категории</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url('admin/category') ?>"
                                    class="<?= url_is('admin/category/index') ? 'active' : '' ?>">Список категорий</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/category/new') ?>"
                                    class="<?= url_is('admin/category/new') ? 'active' : '' ?>">Добавить категорию</a>
                        </li>
                    </ul>
                </li>
                <li class="<?= url_is('admin/tag/*') ? 'mm-active' : '' ?>">
                    <a href="javascript: void(0);" class="has-arrow waves-effect <?= url_is('admin/tag/*') ? 'active' : '' ?>">
                        <i class="ri-hashtag"></i>
                        <span>Метки</span>
                    </a>
                    <ul class="sub-menu" aria-expanded="false">
                        <li>
                            <a href="<?= base_url('admin/tag') ?>"
                                    class="<?= url_is('admin/tag/index') ? 'active' : '' ?>">Список меток</a>
                        </li>
                        <li>
                            <a href="<?= base_url('admin/tag/new') ?>"
                                    class="<?= url_is('admin/tag/new') ? 'active' : '' ?>">Добавить метку</a>
                        </li>
                    </ul>
                </li>
            </ul>
        </div>
    </div>
</div>
