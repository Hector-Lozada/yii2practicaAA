<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * This is the model class for table "usuarios".
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $rol
 * @property string|null $nombre
 * @property string|null $apellido
 * @property string|null $creado_en
 * @property string|null $actualizado_en
 * @property int $activo
 */
class Usuarios extends ActiveRecord implements IdentityInterface
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
            [['nombre', 'apellido'], 'default', 'value' => null],
            [['rol'], 'default', 'value' => 'usuario'],
            [['activo'], 'default', 'value' => 1],
            [['username', 'email', 'password'], 'required'],
            [['creado_en', 'actualizado_en'], 'safe'],
            [['activo'], 'integer'],
            [['username', 'rol'], 'string', 'max' => 50],
            [['email', 'nombre', 'apellido'], 'string', 'max' => 100],
            [['password'], 'string', 'max' => 255],
            [['username'], 'unique'],
            [['email'], 'unique'],
        ];
    }

    /**
     * {@inheritdoc}
     */
    public function attributeLabels()
    {
        return [
            'id' => Yii::t('app', 'ID'),
            'username' => Yii::t('app', 'Username'),
            'email' => Yii::t('app', 'Email'),
            'password' => Yii::t('app', 'Password'),
            'rol' => Yii::t('app', 'Rol'),
            'nombre' => Yii::t('app', 'Nombre'),
            'apellido' => Yii::t('app', 'Apellido'),
            'creado_en' => Yii::t('app', 'Creado En'),
            'actualizado_en' => Yii::t('app', 'Actualizado En'),
            'activo' => Yii::t('app', 'Activo'),
        ];
    }

    public static function find()
    {
        return new UsuariosQuery(get_called_class());
    }

    // --- MÉTODOS PARA LOGIN ---

    /**
     * Busca un usuario por username
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'activo' => 1]);
    }

    /**
     * Valida la contraseña del usuario
     * Usa password_hash y password_verify para seguridad.
     */
    public function validatePassword($password)
    {
        // Si guardas el hash con password_hash:
        // return password_verify($password, $this->password);
        // Si tu password está en texto plano (NO recomendado):
        return $this->password === $password;
    }

    // --- MÉTODOS DE IdentityInterface ---
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'activo' => 1]);
    }

    public static function findIdentityByAccessToken($token, $type = null)
    {
        // Solo si usas accessToken
        return static::findOne(['accessToken' => $token, 'activo' => 1]);
    }

    public function getId()
    {
        return $this->id;
    }

    public function getAuthKey()
    {
        // Si tienes campo authKey en la tabla, retorna $this->authKey
        return null;
    }

    public function validateAuthKey($authKey)
    {
        // Si usas authKey, valida aquí
        return true;
    }
}