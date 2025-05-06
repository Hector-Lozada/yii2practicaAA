<?php

namespace app\controllers;

use app\models\Empleados;
use app\models\EmpleadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use yii\web\UploadedFile;
use Yii;
/**
 * EmpleadosController implements the CRUD actions for Empleados model.
 */
class EmpleadosController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return array_merge(
            parent::behaviors(),
            [
                'verbs' => [
                    'class' => VerbFilter::className(),
                    'actions' => [
                        'delete' => ['POST'],
                    ],
                ],
            ]
        );
    }

    /**
     * Lists all Empleados models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new EmpleadosSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Empleados model.
     * @param int $idempleados Idempleados
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idempleados)
    {
        return $this->render('view', [
            'model' => $this->findModel($idempleados),
        ]);
    }

    /**
     * Creates a new Empleados model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Empleados();

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            // Validación temporal
            $model->image_path = 'temp';
            if (!$model->validate()) {
                Yii::$app->session->setFlash('error', $this->getErrorSummary($model));
                return $this->render('create', ['model' => $model]);
            }

            $transaction = Yii::$app->db->beginTransaction();
            try {
                // Procesar imagen
                if ($model->imageFile) {
                    $uploadDir = Yii::getAlias('@webroot/uploads/images/');
                    if (!file_exists($uploadDir)) {
                        mkdir($uploadDir, 0775, true);
                    }

                    $fileName = uniqid() . '.' . $model->imageFile->extension;
                    $filePath = $uploadDir . $fileName;

                    if ($model->imageFile->saveAs($filePath)) {
                        $model->image_path = '/uploads/images/' . $fileName;
                    } else {
                        throw new \Exception('No se pudo guardar la imagen.');
                    }
                }

                if ($model->save(false)) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Empleado creado exitosamente.');
                    return $this->redirect(['view', 'idempleados' => $model->idempleados]);
                } else {
                    throw new \Exception('Error al guardar: ' . print_r($model->errors, true));
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                if (isset($filePath) && file_exists($filePath)) {
                    unlink($filePath);
                }
                Yii::$app->session->setFlash('error', $e->getMessage());
                Yii::error($e->getMessage());
            }
        }

        return $this->render('create', ['model' => $model]);
    }

    public function actionUpdate($idempleados)
    {
        $model = $this->findModel($idempleados);
        $oldImagePath = $model->image_path;

        if ($this->request->isPost) {
            $model->load($this->request->post());
            $model->imageFile = UploadedFile::getInstance($model, 'imageFile');

            if (!$model->validate()) {
                Yii::$app->session->setFlash('error', $this->getErrorSummary($model));
                return $this->render('update', ['model' => $model]);
            }

            $transaction = Yii::$app->db->beginTransaction();
            try {
                // Procesar nueva imagen si se subió
                if ($model->imageFile) {
                    $uploadDir = Yii::getAlias('@webroot/uploads/images/');
                    $fileName = uniqid() . '.' . $model->imageFile->extension;
                    $filePath = $uploadDir . $fileName;

                    if ($model->imageFile->saveAs($filePath)) {
                        // Eliminar la imagen anterior
                        if ($oldImagePath && file_exists(Yii::getAlias('@webroot' . $oldImagePath))) {
                            unlink(Yii::getAlias('@webroot' . $oldImagePath));
                        }
                        $model->image_path = '/uploads/images/' . $fileName;
                    } else {
                        throw new \Exception('No se pudo guardar la nueva imagen.');
                    }
                }

                if ($model->save(false)) {
                    $transaction->commit();
                    Yii::$app->session->setFlash('success', 'Empleado actualizado exitosamente.');
                    return $this->redirect(['view', 'idempleados' => $model->idempleados]);
                } else {
                    throw new \Exception('Error al actualizar: ' . print_r($model->errors, true));
                }
            } catch (\Exception $e) {
                $transaction->rollBack();
                Yii::$app->session->setFlash('error', $e->getMessage());
                Yii::error($e->getMessage());
            }
        }

        return $this->render('update', ['model' => $model]);
    }

    public function actionDelete($idempleados)
    {
        $model = $this->findModel($idempleados);
        $transaction = Yii::$app->db->beginTransaction();

        try {
            if ($model->delete()) {
                $transaction->commit();
                Yii::$app->session->setFlash('success', 'Empleado eliminado exitosamente.');
            } else {
                throw new \Exception('No se pudo eliminar el empleado.');
            }
        } catch (\Exception $e) {
            $transaction->rollBack();
            Yii::$app->session->setFlash('error', $e->getMessage());
            Yii::error($e->getMessage());
        }

        return $this->redirect(['index']);
    }

    protected function findModel($idempleados)
    {
        if (($model = Empleados::findOne($idempleados)) !== null) {
            return $model;
        }

        throw new NotFoundHttpException('El empleado solicitado no existe.');
    }

    private function getErrorSummary($model)
    {
        $errors = [];
        foreach ($model->errors as $attribute => $errorMessages) {
            $label = $model->getAttributeLabel($attribute);
            $errors[] = "$label: " . implode(', ', $errorMessages);
        }
        return implode('<br>', $errors);
    }
}