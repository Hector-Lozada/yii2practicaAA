<?php

namespace app\models;

use Yii;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $nombre_usuario
 * @property string|null $email
 * @property string|null $fecha_registro
 *
 * @property Donaciones[] $donaciones
 * @property Suscripciones[] $suscripciones
 */
class Usuarios extends \yii\db\ActiveRecord
{


    /**
     * {@inheritdoc}
     */
    public static function tableName()
    {
        return 'usuarios';
    }

    /**
     * {@inheritdoc}
     */
    public function rules()
    {
        return [
            [['email'], 'default', 'value' => null],
            [['nombre_usuario'], 'required'],
            [['fecha_registro'], 'safe'],
            [['nombre_usuario'], 'string', 'max' => 50],
            [['email'], 'string', 'max' => 100],
            [['nombre_usuario'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'nombre_usuario' => Yii::t('app', 'Nombre Usuario'),
            'email' => Yii::t('app', 'Email'),
            'fecha_registro' => Yii::t('app', 'Fecha Registro'),
        ];
    }

    /**
     * Gets query for [[Donaciones]].
     *
     * @return \yii\db\ActiveQuery|DonacionesQuery
     */
    public function getDonaciones()
    {
        return $this->hasMany(Donaciones::class, ['usuario_id' => 'id']);
    }

    /**
     * Gets query for [[Suscripciones]].
     *
     * @return \yii\db\ActiveQuery|SuscripcionesQuery
     */
    public function getSuscripciones()
    {
        return $this->hasMany(Suscripciones::class, ['usuario_id' => 'id']);
    }

    /**
     * {@inheritdoc}
     * @return UsuariosQuery the active query used by this AR class.
     */
    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }

}
