<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "transmisiones".
 *
 * @property int $id
 * @property int|null $streamer_id
 * @property string|null $titulo
 * @property string|null $categoria
 * @property string|null $fecha_inicio
 * @property string|null $fecha_fin
 *
 * @property Streamers $streamer
 */
class Transmisiones extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'transmisiones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['streamer_id', 'titulo', 'categoria', 'fecha_inicio', 'fecha_fin'], 'default', 'value' => null],
            [['streamer_id'], 'integer'],
            [['fecha_inicio', 'fecha_fin'], 'safe'],
            [['titulo'], 'string', 'max' => 100],
            [['categoria'], 'string', 'max' => 50],
            [['streamer_id'], 'exist', 'skipOnError' => true, 'targetClass' => Streamers::class, 'targetAttribute' => ['streamer_id' => 'id']],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'streamer_id' => Yii::t('app', 'Streamer ID'),
            'titulo' => Yii::t('app', 'Titulo'),
            'categoria' => Yii::t('app', 'Categoria'),
            'fecha_inicio' => Yii::t('app', 'Fecha Inicio'),
            'fecha_fin' => Yii::t('app', 'Fecha Fin'),
        ];
    }

    /**
     * Gets query for [[Streamer]].
     *
     * @return \yii\db\ActiveQuery|StreamersQuery
     */
    public function getStreamer()
    {
        return $this->hasOne(Streamers::class, ['id' => 'streamer_id']);
    }

    /**
     * {@inheritdoc}
     * @return TransmisionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new TransmisionesQuery(get_called_class());
    }

}
