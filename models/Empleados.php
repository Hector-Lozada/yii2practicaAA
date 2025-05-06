<?php

namespace app\models;
use Yii;
use yii\web\UploadedFile;

/**
 * This is the model class for table "empleados".
 *
 * @property int $idempleados
 * @property string|null $nombre
 * @property string|null $email
 * @property string|null $cargo
 * @property string|null $image_path
 * @property string|null $fecha_ingreso
 *
 * @property Asignaciones[] $asignaciones
 * @property Comentarios[] $comentarios
 */
class Empleados extends \yii\db\ActiveRecord
{
    public $imageFile; // Atributo para el archivo de imagen

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
            [['nombre', 'email', 'cargo', 'image_path', 'fecha_ingreso'], 'default', 'value' => null],
            [['fecha_ingreso'], 'safe'],
            [['nombre', 'email', 'cargo'], 'string', 'max' => 100],
            [['image_path'], 'string', 'max' => 255],
            [['imageFile'], 'file', 'skipOnEmpty' => true, 'extensions' => 'png, jpg, jpeg, gif', 'maxSize' => 5 * 1024 * 1024], // 5MB
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
            'image_path' => 'Imagen',
            'imageFile' => 'Subir Imagen',
            'fecha_ingreso' => Yii::t('app', 'Fecha Ingreso'),
        ];
    }

    public function upload()
    {
        if ($this->imageFile) {
            $uploadDir = Yii::getAlias('@webroot/uploads/avatars/');
            if (!file_exists($uploadDir)) {
                mkdir($uploadDir, 0775, true);
            }

            $fileName = uniqid() . '.' . $this->imageFile->extension;
            $filePath = $uploadDir . $fileName;

            if ($this->imageFile->saveAs($filePath)) {
                $this->image_path = '/uploads/avatars/' . $fileName;
                return true;
            }
        }
        return false;
    }

    /**
     * Elimina la imagen asociada
     */
    public function deleteImage()
    {
        if ($this->image_path && file_exists(Yii::getAlias('@webroot' . $this->image_path))) {
            unlink(Yii::getAlias('@webroot' . $this->image_path));
            return true;
        }
        return false;
    }

    /**
     * Before delete hook
     */
    public function beforeDelete()
    {
        if (!parent::beforeDelete()) {
            return false;
        }

        $this->deleteImage();
        return true;
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
