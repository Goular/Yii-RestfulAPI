<aside class="main-sidebar">

    <section class="sidebar">

        <!-- Sidebar user panel -->
<!--        <div class="user-panel">-->
<!--            <div class="pull-left image">-->
<!--                <img src="< ?= $directoryAsset ?>/img/user2-160x160.jpg" class="img-circle" alt="User Image"/>-->
<!--            </div>-->
<!--            <div class="pull-left info">-->
<!--                <p>Alexander Pierce</p>-->
<!---->
<!--                <a href="#"><i class="fa fa-circle text-success"></i> Online</a>-->
<!--            </div>-->
<!--        </div>-->

        <!-- search form -->
<!--        <form action="#" method="get" class="sidebar-form">-->
<!--            <div class="input-group">-->
<!--                <input type="text" name="q" class="form-control" placeholder="Search..."/>-->
<!--              <span class="input-group-btn">-->
<!--                <button type='submit' name='search' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i>-->
<!--                </button>-->
<!--              </span>-->
<!--            </div>-->
<!--        </form>-->
        <!-- /.search form -->

        <?= dmstr\widgets\Menu::widget(
            [
                'options' => ['class' => 'sidebar-menu tree', 'data-widget' => 'tree'],
                'items' => [
                    // ['label' => 'Menu Yii2', 'options' => ['class' => 'header']],
                    ['label' => '管理员用户', 'icon' => ' fa-user-secret', 'url' => ['/adminuser/index']],
                    ['label' => '文章管理', 'icon' => ' fa-file-word-o', 'url' => ['/article/index']],
                    ['label' => '登录', 'url' => ['site/login'], 'visible' => Yii::$app->user->isGuest],
                    [
                        'label' => '权限管理',
                        'icon' => ' fa-unlock-alt',
                        'url' => '#',
                        'items' => [
                            ['label' => '路由', 'icon' => ' fa-road', 'url' => ['/admin/route'],],
                            ['label' => '权限', 'icon' => ' fa-certificate', 'url' => ['/admin/permission'],],
                            ['label' => '角色', 'icon' => ' fa-user', 'url' => ['/admin/role'],],
                            ['label' => '分配', 'icon' => ' fa-check-circle', 'url' => ['/admin/assignment'],],
                            ['label' => '菜单', 'icon' => ' fa-list-alt', 'url' => ['/admin/menu'],],
                        ],
                    ],
                    [
                        'label' => '系统工具',
                        'icon' => 'share',
                        'url' => '#',
                        'items' => [
                            ['label' => 'Gii', 'icon' => 'file-code-o', 'url' => ['/gii'],],
                            ['label' => 'Debug', 'icon' => 'dashboard', 'url' => ['/debug'],],

                        ],
                    ],
                ],
            ]
        ) ?>

    </section>

</aside>
