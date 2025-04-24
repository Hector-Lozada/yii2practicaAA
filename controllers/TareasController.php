<?php

namespace app\controllers;

use app\models\Tareas;
use app\models\TareasSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idtareas' => $model->idtareas]);
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

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idtareas' => $model->idtareas]);
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
}
