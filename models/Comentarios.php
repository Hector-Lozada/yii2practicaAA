<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "comentarios".
 *
 * @property int $idcomentarios
 * @property int|null $tarea_id
 * @property int|null $empleado_id
 * @property string|null $comentario
 * @property string|null $fecha
 *
 * @property Empleados $empleado
 * @property Tareas $tarea
 */
class Comentarios extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'comentarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['tarea_id', 'empleado_id', 'comentario', 'fecha'], 'default', 'value' => null],
            [['tarea_id', 'empleado_id'], 'integer'],
            [['comentario'], 'string'],
            [['fecha'], 'safe'],
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
            'idcomentarios' => Yii::t('app', 'Idcomentarios'),
            'tarea_id' => Yii::t('app', 'Tarea ID'),
            'empleado_id' => Yii::t('app', 'Empleado ID'),
            'comentario' => Yii::t('app', 'Comentario'),
            'fecha' => Yii::t('app', 'Fecha'),
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
     * @return ComentariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ComentariosQuery(get_called_class());
    }

}
