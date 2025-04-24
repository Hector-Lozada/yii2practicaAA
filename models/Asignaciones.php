<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "asignaciones".
 *
 * @property int $idasignaciones
 * @property int|null $tarea_id
 * @property int|null $empleado_id
 * @property string|null $fecha_asignacion
 *
 * @property Empleados $empleado
 * @property Tareas $tarea
 */
class Asignaciones extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'asignaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tarea_id', 'empleado_id', 'fecha_asignacion'], 'default', 'value' => null],
            [['tarea_id', 'empleado_id'], 'integer'],
            [['fecha_asignacion'], 'safe'],
            [['tarea_id'], 'exist', 'skipOnError' => true, 'targetClass' => Tareas::class, 'targetAttribute' => ['tarea_id' => 'idtareas']],
            [['empleado_id'], 'exist', 'skipOnError' => true, 'targetClass' => Empleados::class, 'targetAttribute' => ['empleado_id' => 'idempleados']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idasignaciones' => Yii::t('app', 'Idasignaciones'),
            'tarea_id' => Yii::t('app', 'Tarea ID'),
            'empleado_id' => Yii::t('app', 'Empleado ID'),
            'fecha_asignacion' => Yii::t('app', 'Fecha Asignacion'),
        ];
    }

    /**
     * Gets query for [[Empleado]].
     *
     * @return \yii\db\ActiveQuery|EmpleadosQuery
     */
    public function getEmpleado()
    {
        return $this->hasOne(Empleados::class, ['idempleados' => 'empleado_id']);
    }

    /**
     * Gets query for [[Tarea]].
     *
     * @return \yii\db\ActiveQuery|TareasQuery
     */
    public function getTarea()
    {
        return $this->hasOne(Tareas::class, ['idtareas' => 'tarea_id']);
    }

    /**
     * {@inheritdoc}
     * @return AsignacionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new AsignacionesQuery(get_called_class());
    }

}
