<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Asignaciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asignaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <?= $form->field($model, 'tarea_id')->textInput() ?>

    <?= $form->field($model, 'empleado_id')->textInput() ?>

    <?= $form->field($model, 'fecha_asignacion')->textInput() ?>

    <div class="form-group">
        <?= Html::submitButton(Yii::t('app', 'Save'), ['class' => 'btn btn-success']) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>
