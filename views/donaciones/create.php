<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Donaciones $model */

$this->title = Yii::t('app', 'Create Donaciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Donaciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="donaciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
