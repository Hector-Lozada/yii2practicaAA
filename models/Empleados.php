<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "empleados".
 *
 * @property int $idempleados
 * @property string|null $nombre
 * @property string|null $email
 * @property string|null $cargo
 * @property string|null $fecha_ingreso
 *
 * @property Asignaciones[] $asignaciones
 * @property Comentarios[] $comentarios
 */
class Empleados extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'empleados';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'email', 'cargo', 'fecha_ingreso'], 'default', 'value' => null],
            [['fecha_ingreso'], 'safe'],
            [['nombre', 'email', 'cargo'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idempleados' => Yii::t('app', 'Idempleados'),
            'nombre' => Yii::t('app', 'Nombre'),
            'email' => Yii::t('app', 'Email'),
            'cargo' => Yii::t('app', 'Cargo'),
            'fecha_ingreso' => Yii::t('app', 'Fecha Ingreso'),
        ];
    }

    /**
     * Gets query for [[Asignaciones]].
     *
     * @return \yii\db\ActiveQuery|AsignacionesQuery
     */
    public function getAsignaciones()
    {
        return $this->hasMany(Asignaciones::class, ['empleado_id' => 'idempleados']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery|ComentariosQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::class, ['empleado_id' => 'idempleados']);
    }

    /**
     * {@inheritdoc}
     * @return EmpleadosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new EmpleadosQuery(get_called_class());
    }

}
