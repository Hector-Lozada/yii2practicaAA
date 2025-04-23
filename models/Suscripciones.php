<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "suscripciones".
 *
 * @property int $id
 * @property int|null $usuario_id
 * @property int|null $streamer_id
 * @property string|null $fecha_suscripcion
 * @property string|null $nivel
 *
 * @property Streamers $streamer
 * @property Usuarios $usuario
 */
class Suscripciones extends \yii\db\ActiveRecord
{

    /**
     * ENUM field values
     */
    const NIVEL_TIER_1 = 'Tier 1';
    const NIVEL_TIER_2 = 'Tier 2';
    const NIVEL_TIER_3 = 'Tier 3';

    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'suscripciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'streamer_id'], 'default', 'value' => null],
            [['nivel'], 'default', 'value' => 'Tier 1'],
            [['usuario_id', 'streamer_id'], 'integer'],
            [['fecha_suscripcion'], 'safe'],
            [['nivel'], 'string'],
            ['nivel', 'in', 'range' => array_keys(self::optsNivel())],
            [['usuario_id'], 'exist', 'skipOnError' => true, 'targetClass' => Usuarios::class, 'targetAttribute' => ['usuario_id' => 'id']],
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
            'usuario_id' => Yii::t('app', 'Usuario ID'),
            'streamer_id' => Yii::t('app', 'Streamer ID'),
            'fecha_suscripcion' => Yii::t('app', 'Fecha Suscripcion'),
            'nivel' => Yii::t('app', 'Nivel'),
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
     * Gets query for [[Usuario]].
     *
     * @return \yii\db\ActiveQuery|UsuariosQuery
     */
    public function getUsuario()
    {
        return $this->hasOne(Usuarios::class, ['id' => 'usuario_id']);
    }

    /**
     * {@inheritdoc}
     * @return SuscripcionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new SuscripcionesQuery(get_called_class());
    }


    /**
     * column nivel ENUM value labels
     * @return string[]
     */
    public static function optsNivel()
    {
        return [
            self::NIVEL_TIER_1 => Yii::t('app', 'Tier 1'),
            self::NIVEL_TIER_2 => Yii::t('app', 'Tier 2'),
            self::NIVEL_TIER_3 => Yii::t('app', 'Tier 3'),
        ];
    }

    /**
     * @return string
     */
    public function displayNivel()
    {
        return self::optsNivel()[$this->nivel];
    }

    /**
     * @return bool
     */
    public function isNivelTier1()
    {
        return $this->nivel === self::NIVEL_TIER_1;
    }

    public function setNivelToTier1()
    {
        $this->nivel = self::NIVEL_TIER_1;
    }

    /**
     * @return bool
     */
    public function isNivelTier2()
    {
        return $this->nivel === self::NIVEL_TIER_2;
    }

    public function setNivelToTier2()
    {
        $this->nivel = self::NIVEL_TIER_2;
    }

    /**
     * @return bool
     */
    public function isNivelTier3()
    {
        return $this->nivel === self::NIVEL_TIER_3;
    }

    public function setNivelToTier3()
    {
        $this->nivel = self::NIVEL_TIER_3;
    }
}
