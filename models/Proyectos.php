<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "proyectos".
 *
 * @property int $idproyectos
 * @property string|null $nombre
 * @property string|null $descripcion
 * @property string|null $fecha_inicio
 * @property string|null $fecha_fin
 *
 * @property Tareas[] $tareas
 */
class Proyectos extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'proyectos';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['nombre', 'descripcion', 'fecha_inicio', 'fecha_fin'], 'default', 'value' => null],
            [['descripcion'], 'string'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['nombre'], 'string', 'max' => 100],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idproyectos' => Yii::t('app', 'Idproyectos'),
            'nombre' => Yii::t('app', 'Nombre'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
        ];
    }

    /**
     * Gets query for [[Tareas]].
     *
     * @return \yii\db\ActiveQuery|TareasQuery
     */
    public function getTareas()
    {
        return $this->hasMany(Tareas::class, ['proyecto_id' => 'idproyectos']);
    }

    /**
     * {@inheritdoc}
     * @return ProyectosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new ProyectosQuery(get_called_class());
    }

}
