<?php

/** @var yii\web\View $this */
/** @var string $content */

use app\assets\AppAsset;
use app\widgets\Alert;
use yii\bootstrap5\Breadcrumbs;
use yii\bootstrap5\Html;
use yii\bootstrap5\Nav;
use yii\bootstrap5\NavBar;
use yii\helpers\Url;

AppAsset::register($this);

$this->registerCsrfMetaTags();
$this->registerMetaTag(['charset' => Yii::$app->charset], 'charset');
$this->registerMetaTag(['name' => 'viewport', 'content' => 'width=device-width, initial-scale=1, shrink-to-fit=no']);
$this->registerMetaTag(['name' => 'description', 'content' => $this->params['meta_description'] ?? '']);
$this->registerMetaTag(['name' => 'keywords', 'content' => $this->params['meta_keywords'] ?? '']);
$this->registerLinkTag(['rel' => 'icon', 'type' => 'image/x-icon', 'href' => Yii::getAlias('@web/favicon.ico')]);

// Color característico UTELVT (puedes cambiarlo por el verde exacto de la universidad)
$utelvtGreen = '#00723A';

// Obtén el rol del usuario autenticado (si hay uno)
$rol = (Yii::$app->user->isGuest) ? null : Yii::$app->user->identity->rol;
?>
<?php $this->beginPage() ?>
<!DOCTYPE html>
<html lang="<?= Yii::$app->language ?>" class="h-100">
<head>
    <title><?= Html::encode($this->title) ?></title>
    <?php $this->head() ?>
    <!-- Estilos personalizados -->
    <style>
        .utelvt-navbar {
            background: linear-gradient(90deg, <?= $utelvtGreen ?> 80%, #005b2a 100%);
            box-shadow: 0 2px 16px rgba(0,0,0,0.09);
        }
        .navbar-nav .nav-link.active {
            font-weight: bold;
            color: #f7d600 !important;
        }
        .navbar-nav .dropdown-menu {
            background-color: #e8f5e9;
        }
        .navbar-nav .nav-link,
        .navbar-brand {
            color: #fff !important;
        }
        .navbar-nav .nav-link:hover,
        .navbar-nav .dropdown-item:hover {
            color: #ffe066 !important;
            background-color: #129d5f !important;
            border-radius: .25rem;
        }
        .card-main-content {
            background: rgba(255,255,255,0.93);
            box-shadow: 0 0 15px 2px rgba(60,60,60,0.08);
            border-radius: 10px;
            padding: 2rem 1.5rem;
            margin-top: 32px;
        }
        .navbar .navbar-brand .utelvt-text {
            font-weight: bold;
            font-size: 1.4rem;
            color: #fff;
            letter-spacing: 2px;
            margin-left: 8px;
            vertical-align: middle;
            text-shadow: 1px 1px 8px rgba(0,0,0,0.13);
        }
    </style>
</head>
<body class="d-flex flex-column h-100">
<?php $this->beginBody() ?>

<header id="header">
    <?php
    NavBar::begin([
    'brandLabel' =>
        // Logo con fondo circular blanco y sombra
        Html::tag('span',
            Html::img('@web/images/logo.png', [
                'alt' => 'UTELVT Logo',
                'style' => 'height:32px; width:32px; object-fit:contain;'
            ]),
            [
                'style' =>
                    'display:inline-block; vertical-align:middle; ' .
                    'background:#fff; border-radius:50%; ' .
                    'box-shadow: 0 2px 8px rgba(0,0,0,0.10); ' .
                    'padding:4px; margin-right:10px;'
            ]
        )
        .
        '<span class="utelvt-text">UTELVT</span>',
    'brandUrl' => Yii::$app->homeUrl,
    'options' => ['class' => 'navbar-expand-md utelvt-navbar fixed-top']
]);
    $menuItems = [
        ['label' => 'Inicio', 'url' => ['/site/index']],
        [
            'label' => 'Gestión de Proyectos',
            'items' => array_filter([
                $rol === 'admin' ? ['label' => 'Empleados', 'url' => ['/empleados/index']] : null,
                ['label' => 'Proyectos', 'url' => ['/proyectos/index']],
                ['label' => 'Tareas', 'url' => ['/tareas/index']],
                ['label' => 'Asignaciones', 'url' => ['/asignaciones/index']],
                ['label' => 'Comentarios', 'url' => ['/comentarios/index']],
                $rol === 'admin' ? ['label' => 'Usuarios', 'url' => ['/usuarios/index']] : null,
            ])
        ]
    ];
    if (Yii::$app->user->isGuest) {
        $menuItems[] = ['label' => 'Login', 'url' => ['/site/login']];
    } else {
        $menuItems[] = '<li class="nav-item">'
            . Html::beginForm(['/site/logout'], 'post', ['class' => 'd-inline'])
            . Html::submitButton(
                'Logout (' . Html::encode(Yii::$app->user->identity->username) . ')',
                ['class' => 'nav-link btn btn-link logout', 'style' => 'color: #fff;']
            )
            . Html::endForm()
            . '</li>';
    }
    echo Nav::widget([
        'options' => ['class' => 'navbar-nav'],
        'items' => $menuItems
    ]);
    NavBar::end();
    ?>
</header>

<main id="main" class="flex-shrink-0" role="main">
    <div class="container">
        <?php if (!empty($this->params['breadcrumbs'])): ?>
            <div class="pt-4">
                <?= Breadcrumbs::widget(['links' => $this->params['breadcrumbs']]) ?>
            </div>
        <?php endif ?>
        <div class="card card-main-content">
            <?= Alert::widget() ?>
            <?= $content ?>
        </div>
    </div>
</main>

<footer id="footer" class="mt-auto py-3 bg-light">
    <div class="container">
        <div class="row text-muted">
            <div class="col-md-6 text-center text-md-start">&copy; UTELVT <?= date('Y') ?></div>
            <div class="col-md-6 text-center text-md-end"><?= Yii::powered() ?></div>
        </div>
    </div>
</footer>

<?php $this->endBody() ?>
</body>
</html>
<?php $this->endPage() ?>