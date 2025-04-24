<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "tareas".
 *
 * @property int $idtareas
 * @property string|null $titulo
 * @property string|null $descripcion
 * @property int|null $proyecto_id
 *
 * @property Asignaciones[] $asignaciones
 * @property Comentarios[] $comentarios
 * @property Proyectos $proyecto
 */
class Tareas extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'tareas';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['titulo', 'descripcion', 'proyecto_id'], 'default', 'value' => null],
            [['descripcion'], 'string'],
            [['proyecto_id'], 'integer'],
            [['titulo'], 'string', 'max' => 100],
            [['proyecto_id'], 'exist', 'skipOnError' => true, 'targetClass' => Proyectos::class, 'targetAttribute' => ['proyecto_id' => 'idproyectos']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'idtareas' => Yii::t('app', 'Idtareas'),
            'titulo' => Yii::t('app', 'Titulo'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'proyecto_id' => Yii::t('app', 'Proyecto ID'),
        ];
    }

    /**
     * Gets query for [[Asignaciones]].
     *
     * @return \yii\db\ActiveQuery|AsignacionesQuery
     */
    public function getAsignaciones()
    {
        return $this->hasMany(Asignaciones::class, ['tarea_id' => 'idtareas']);
    }

    /**
     * Gets query for [[Comentarios]].
     *
     * @return \yii\db\ActiveQuery|ComentariosQuery
     */
    public function getComentarios()
    {
        return $this->hasMany(Comentarios::class, ['tarea_id' => 'idtareas']);
    }

    /**
     * Gets query for [[Proyecto]].
     *
     * @return \yii\db\ActiveQuery|ProyectosQuery
     */
    public function getProyecto()
    {
        return $this->hasOne(Proyectos::class, ['idproyectos' => 'proyecto_id']);
    }

    /**
     * {@inheritdoc}
     * @return TareasQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TareasQuery(get_called_class());
    }

}
