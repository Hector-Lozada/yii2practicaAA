<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "streamers".
 *
 * @property int $id
 * @property string $nombre_canal
 * @property string|null $descripcion
 * @property string|null $fecha_union
 *
 * @property Donaciones[] $donaciones
 * @property Suscripciones[] $suscripciones
 * @property Transmisiones[] $transmisiones
 */
class Streamers extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'streamers';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['descripcion'], 'default', 'value' => null],
            [['nombre_canal'], 'required'],
            [['descripcion'], 'string'],
            [['fecha_union'], 'safe'],
            [['nombre_canal'], 'string', 'max' => 50],
            [['nombre_canal'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre_canal' => Yii::t('app', 'Nombre Canal'),
            'descripcion' => Yii::t('app', 'Descripcion'),
            'fecha_union' => Yii::t('app', 'Fecha Union'),
        ];
    }

    /**
     * Gets query for [[Donaciones]].
     *
     * @return \yii\db\ActiveQuery|DonacionesQuery
     */
    public function getDonaciones()
    {
        return $this->hasMany(Donaciones::class, ['streamer_id' => 'id']);
    }

    /**
     * Gets query for [[Suscripciones]].
     *
     * @return \yii\db\ActiveQuery|SuscripcionesQuery
     */
    public function getSuscripciones()
    {
        return $this->hasMany(Suscripciones::class, ['streamer_id' => 'id']);
    }

    /**
     * Gets query for [[Transmisiones]].
     *
     * @return \yii\db\ActiveQuery|TransmisionesQuery
     */
    public function getTransmisiones()
    {
        return $this->hasMany(Transmisiones::class, ['streamer_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return StreamersQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new StreamersQuery(get_called_class());
    }

}
