<?php

use yii\helpers\Html;

/** @var yii\web\View $this */
/** @var app\models\Suscripciones $model */

$this->title = Yii::t('app', 'Create Suscripciones');
$this->params['breadcrumbs'][] = ['label' => Yii::t('app', 'Suscripciones'), 'url' => ['index']];
$this->params['breadcrumbs'][] = $this->title;
?>
<div class="suscripciones-create">

    <h1><?= Html::encode($this->title) ?></h1>

    <?= $this->render('_form', [
        'model' => $model,
    ]) ?>

</div>
