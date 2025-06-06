<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\EmpleadosSearch $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="empleados-search">

    <?php $form = ActiveForm::begin([
        'action' => ['index'],
        'method' => 'get',
        'options' => [
            'data-pjax' => 1
        ],
    ]); ?>

    <?= $form->field($model, 'idempleados') ?>

    <?= $form->field($model, 'nombre') ?>

    <?= $form->field($model, 'email') ?>

    <?= $form->field($model, 'cargo') ?>

    <?= $form->field($model, 'image_path') ?>

    <?php // echo $form->field($model, 'fecha_ingreso') ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Search'), ['class' => 'btn btn-primary']) ?>
        <?= Html::resetButton(Yii::t('app', 'Reset'), ['class' => 'btn btn-outline-secondary']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
