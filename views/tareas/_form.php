<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Proyectos;

/** @var yii\web\View $this */
/** @var app\models\Tareas $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="tareas-form">

    <?php $form = ActiveForm::begin([
        'id' => 'tarea-form',
        'enableAjaxValidation' => false,
    ]); ?>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'titulo')->textInput([
                'maxlength' => true,
                'placeholder' => 'Ingrese el título de la tarea',
                'required' => true,
                'class' => 'form-control'
            ])->label('Título <span class="text-danger">*</span>') ?>
        </div>

        <div class="col-md-6">
            <div class="form-group field-tareas-proyecto_id required">
                <label class="control-label" for="tareas-proyecto_id">Proyecto <span class="text-danger">*</span></label>
                <div class="input-group">
                    <?= $form->field($model, 'proyecto_id', [
                        'template' => "{input}",
                        'options' => ['class' => 'flex-grow-1']
                    ])->dropDownList(
                        ArrayHelper::map(Proyectos::find()->all(), 'id', 'nombre'),
                        [
                            'prompt' => 'Seleccione un proyecto...',
                            'class' => 'form-control',
                            'required' => true
                        ]
                    )->label(false) ?>
                    <div class="input-group-append">
                        <?= Html::a('<i class="glyphicon glyphicon-plus"></i> Nuevo Proyecto', 
                            ['proyectos/create'], 
                            [
                                'class' => 'btn btn-success',
                                'title' => 'Crear nuevo proyecto',
                                'target' => '_blank'
                            ]) ?>
                    </div>
                </div>
                <div class="help-block"></div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-12">
            <?= $form->field($model, 'descripcion')->textarea([
                'rows' => 4,
                'placeholder' => 'Describa los detalles de la tarea',
                'class' => 'form-control'
            ])->label('Descripción') ?>
        </div>
    </div>

    <div class="form-group text-right mt-4">
        <?= Html::a('Cancelar', ['index'], [
            'class' => 'btn btn-outline-secondary mr-2',
            'style' => 'min-width: 100px;'
        ]) ?>
        <?= Html::submitButton('Guardar Tarea', [
            'class' => 'btn btn-primary',
            'style' => 'min-width: 150px;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>