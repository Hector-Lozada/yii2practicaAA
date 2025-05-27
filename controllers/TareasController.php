<?php

namespace app\controllers;

use app\models\Tareas;
use app\models\TareasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use Yii;
use yii\filters\AccessControl;

/**
 * TareasController implements the CRUD actions for Tareas model.
 */
class TareasController extends Controller
{
    /**
     * @inheritDoc
     */
    public function behaviors()
    {
        return [
            'access' => [
                'class' => AccessControl::class,
                'only' => ['index', 'view', 'create', 'update', 'delete'],
                'rules' => [
                    [
                        'allow' => true,
                        'actions' => ['index', 'view'],
                        'roles' => ['@'],
                    ],
                    [
                        'allow' => true,
                        'actions' => ['create', 'update', 'delete'],
                        'roles' => ['@'],
                        'matchCallback' => function ($rule, $action) {
                            return \Yii::$app->user->identity->rol === 'admin';
                        }
                    ],
                ],
            ],
        ];
    }

    /**
     * Lists all Tareas models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new TareasSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Tareas model.
     * @param int $idtareas Idtareas
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idtareas)
    {
        return $this->render('view', [
            'model' => $this->findModel($idtareas),
        ]);
    }

    /**
     * Creates a new Tareas model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Tareas();

        if ($this->request->isPost) {
            if ($model->load($this->request->post())) {
                // DEBUG: Mostrar datos recibidos
                Yii::debug($model->attributes);
                
                if ($model->save()) {
                    Yii::$app->session->setFlash('success', 'Tarea creada correctamente');
                    return $this->redirect(['view', 'idtareas' => $model->idtareas]);
                } else {
                    // DEBUG: Mostrar errores de validación
                    Yii::error($model->errors);
                    Yii::$app->session->setFlash('error', 'Error al guardar la tarea: ' . $this->getErrorMessages($model));
                }
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Tareas model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idtareas Idtareas
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idtareas)
    {
        $model = $this->findModel($idtareas);

        if ($this->request->isPost && $model->load($this->request->post())) {
            if ($model->save()) {
                Yii::$app->session->setFlash('success', 'Tarea actualizada correctamente');
                return $this->redirect(['view', 'idtareas' => $model->idtareas]);
            } else {
                Yii::$app->session->setFlash('error', 'Error al actualizar la tarea: ' . $this->getErrorMessages($model));
            }
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Tareas model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idtareas Idtareas
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idtareas)
    {
        $this->findModel($idtareas)->delete();
        Yii::$app->session->setFlash('success', 'Tarea eliminada correctamente');
        return $this->redirect(['index']);
    }

    /**
     * Finds the Tareas model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idtareas Idtareas
     * @return Tareas the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idtareas)
    {
        if (($model = Tareas::findOne(['idtareas' => $idtareas])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
    
    /**
     * Helper para obtener mensajes de error del modelo
     * @param \yii\db\ActiveRecord $model
     * @return string
     */
    protected function getErrorMessages($model)
    {
        $errors = [];
        foreach ($model->errors as $attributeErrors) {
            $errors = array_merge($errors, $attributeErrors);
        }
        return implode(', ', $errors);
    }
}