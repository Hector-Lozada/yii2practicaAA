<?php

namespace app\models;

use Yii;
use yii\db\ActiveRecord;
use yii\web\IdentityInterface;

/**
 * Modelo Usuarios para autenticación y gestión de usuarios.
 *
 * @property int $id
 * @property string $username
 * @property string $email
 * @property string $password
 * @property string $rol
 * @property string $nombre
 * @property string $apellido
 * @property string $creado_en
 * @property string $actualizado_en
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
     * Busca usuario por ID (requerido por IdentityInterface)
     */
    public static function findIdentity($id)
    {
        return static::findOne(['id' => $id, 'activo' => 1]);
    }

    /**
     * Busca usuario por access token (no lo uses si no tienes API tokens)
     */
    public static function findIdentityByAccessToken($token, $type = null)
    {
        return static::findOne(['accessToken' => $token, 'activo' => 1]);
    }

    /**
     * Busca usuario por username
     */
    public static function findByUsername($username)
    {
        return static::findOne(['username' => $username, 'activo' => 1]);
    }

    /**
     * Devuelve ID del usuario (requerido por IdentityInterface)
     */
    public function getId()
    {
        return $this->id;
    }

    /**
     * Devuelve authKey (si lo usas, puedes agregar el campo en tu tabla)
     */
    public function getAuthKey()
    {
        // Si tienes el campo authKey en la tabla, úsalo
        return $this->authKey ?? null;
    }

    public function validateAuthKey($authKey)
    {
        return $this->getAuthKey() === $authKey;
    }

    /**
     * Valida la contraseña
     * 
     * IMPORTANTE: Usa password_hash y password_verify para mayor seguridad.
     */
    public function validatePassword($password)
    {
        // Si guardas el hash con password_hash:
        // return password_verify($password, $this->password);

        // Si guardas la contraseña en texto plano (NO recomendado):
        return $this->password === $password;
    }
}