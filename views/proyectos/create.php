<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Proyectos $model */

$this->title = Yii::t('app', 'Create Proyectos');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Proyectos'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="proyectos-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
