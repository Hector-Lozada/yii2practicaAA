<?php

use yii\helpers\Html;
use yii\widgets\ActiveForm;
use yii\helpers\ArrayHelper;
use app\models\Tareas;
use app\models\Empleados;

/** @var yii\web\View $this */
/** @var app\models\Asignaciones $model */
/** @var yii\widgets\ActiveForm $form */
?>

<div class="asignaciones-form">

    <?php $form = ActiveForm::begin(); ?>

    <div class="row">
        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Tarea <span class="text-danger">*</span></label>
                <div class="input-group">
                    <?= $form->field($model, 'tarea_id', [
                        'template' => "{input}",
                        'options' => ['class' => 'flex-grow-1']
                    ])->dropDownList(
                        ArrayHelper::map(Tareas::find()->all(), 'idtareas', 'titulo'),
                        [
                            'prompt' => 'Seleccione una tarea...',
                            'required' => true,
                            'class' => 'form-control'
                        ]
                    )->label(false) ?>
                    <div class="input-group-append">
                        <?= Html::a('Nueva Tarea', 
                            ['tareas/create'], 
                            [
                                'class' => 'btn btn-success',
                                'title' => 'Crear nueva tarea',
                                'target' => '_blank',
                                'style' => 'white-space: nowrap;'
                            ]) ?>
                    </div>
                </div>
            </div>
        </div>

        <div class="col-md-6">
            <div class="form-group">
                <label class="control-label">Empleado <span class="text-danger">*</span></label>
                <div class="input-group">
                    <?= $form->field($model, 'empleado_id', [
                        'template' => "{input}",
                        'options' => ['class' => 'flex-grow-1']
                    ])->dropDownList(
                        ArrayHelper::map(Empleados::find()->all(), 'idempleados', 'nombre'),
                        [
                            'prompt' => 'Seleccione un empleado...',
                            'required' => true,
                            'class' => 'form-control'
                        ]
                    )->label(false) ?>
                    <div class="input-group-append">
                        <?= Html::a('Nuevo Empleado', 
                            ['empleados/create'], 
                            [
                                'class' => 'btn btn-success',
                                'title' => 'Crear nuevo empleado',
                                'target' => '_blank',
                                'style' => 'white-space: nowrap;'
                            ]) ?>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-md-6">
            <?= $form->field($model, 'fecha_asignacion')->input('date', [
                'class' => 'form-control',
                'required' => true,
                'value' => $model->isNewRecord ? date('Y-m-d') : Yii::$app->formatter->asDate($model->fecha_asignacion, 'yyyy-MM-dd')
            ])->label('Fecha de Asignación <span class="text-danger">*</span>') ?>
        </div>
    </div>

    <div class="form-group text-right mt-4">
        <?= Html::a('Cancelar', ['index'], [
            'class' => 'btn btn-outline-secondary mr-2',
            'style' => 'min-width: 100px;'
        ]) ?>
        <?= Html::submitButton('Guardar Asignación', [
            'class' => 'btn btn-primary',
            'style' => 'min-width: 150px;'
        ]) ?>
    </div>

    <?php ActiveForm::end(); ?>

</div>