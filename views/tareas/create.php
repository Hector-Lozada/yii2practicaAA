<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Tareas $model */

$this->title = Yii::t('app', 'Create Tareas');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Tareas'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="tareas-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
