<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;

/** @var yii\web\View $this */
/** @var app\models\Proyectos $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="proyectos-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'nombre')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese el nombre del proyecto',
                'required' => true,
                'class' => 'form-control'
            ])->label('Nombre del Proyecto <span class="text-danger">*</span>') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'descripcion')->textarea([
                'rows' => 4,
                'placeholder' => 'Describa los objetivos y características del proyecto',
                'class' => 'form-control'
            ])->label('Descripción') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'fecha_inicio')->input('date', [
                'class' => 'form-control',
                'required' => true,
                'value' => $model->isNewRecord ? '' : Yii::$app->formatter->asDate($model->fecha_inicio, 'yyyy-MM-dd')
            ])->label('Fecha de Inicio <span class="text-danger">*</span>') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'fecha_fin')->input('date', [
                'class' => 'form-control',
                'required' => true,
                'value' => $model->isNewRecord ? '' : Yii::$app->formatter->asDate($model->fecha_fin, 'yyyy-MM-dd')
            ])->label('Fecha de Finalización <span class="text-danger">*</span>') ?>
        </div>
    </div>

    <div class="form-group text-right mt-4">
        <?= Html::a('Cancelar', ['index'], [
            'class' => 'btn btn-outline-secondary mr-2',
            'style' => 'min-width: 100px;'
        ]) ?>
        <?= Html::submitButton('Guardar Proyecto', [
            'class' => 'btn btn-primary',
            'style' => 'min-width: 150px;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>