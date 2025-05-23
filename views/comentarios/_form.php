<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tareas;
use app\models\Empleados;

/** @var yii\web\View $this */
/** @var app\models\Comentarios $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="comentarios-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'tarea_id')->dropDownList(
                ArrayHelper::map(Tareas::find()->all(), 'idtareas', 'titulo'),
                [
                    'prompt' => 'Seleccione una tarea...',
                    'required' => true,
                    'class' => 'form-control'
                ]
            )->label('Tarea <span class="text-danger">*</span>') ?>
        </div>

        <div class="col-md-6">
            <?= $form->field($model, 'empleado_id')->dropDownList(
                ArrayHelper::map(Empleados::find()->all(), 'idempleados', 'nombre'),
                [
                    'prompt' => 'Seleccione un empleado...',
                    'required' => true,
                    'class' => 'form-control'
                ]
            )->label('Empleado <span class="text-danger">*</span>') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'comentario')->textarea([
                'rows' => 6,
                'placeholder' => 'Ingrese el comentario...',
                'required' => true,
                'class' => 'form-control'
            ])->label('Comentario <span class="text-danger">*</span>') ?>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'fecha')->input('date', [
                'class' => 'form-control',
                'required' => true,
                'value' => $model->isNewRecord ? date('Y-m-d') : Yii::$app->formatter->asDate($model->fecha, 'yyyy-MM-dd')
            ])->label('Fecha <span class="text-danger">*</span>') ?>
        </div>
    </div>

    <div class="form-group text-right mt-4">
        <?= Html::a('Cancelar', ['index'], [
            'class' => 'btn btn-outline-secondary mr-2',
            'style' => 'min-width: 100px;'
        ]) ?>
        <?= Html::submitButton('Guardar Comentario', [
            'class' => 'btn btn-primary',
            'style' => 'min-width: 150px;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>