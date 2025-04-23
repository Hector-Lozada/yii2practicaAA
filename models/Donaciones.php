<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "donaciones".
 *
 * @property int $id
 * @property int|null $usuario_id
 * @property int|null $streamer_id
 * @property float|null $monto
 * @property string|null $mensaje
 * @property string|null $fecha_donacion
 *
 * @property Streamers $streamer
 * @property Usuarios $usuario
 */
class Donaciones extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'donaciones';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['usuario_id', 'streamer_id', 'monto', 'mensaje'], 'default', 'value' => null],
            [['usuario_id', 'streamer_id'], 'integer'],
            [['monto'], 'number'],
            [['mensaje'], 'string'],
            [['fecha_donacion'], 'safe'],
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
            'monto' => Yii::t('app', 'Monto'),
            'mensaje' => Yii::t('app', 'Mensaje'),
            'fecha_donacion' => Yii::t('app', 'Fecha Donacion'),
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
     * @return DonacionesQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new DonacionesQuery(get_called_class());
    }

}
