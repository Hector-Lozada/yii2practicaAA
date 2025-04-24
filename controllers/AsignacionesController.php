<?php

namespace app\controllers;

use app\models\Asignaciones;
use app\models\AsignacionesSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * AsignacionesController implements the CRUD actions for Asignaciones model.
 */
class AsignacionesController extends Controller
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
     * Lists all Asignaciones models.
     *
     * @return string
     */
    public function actionIndex()
    {
        $searchModel = new AsignacionesSearch();
        $dataProvider = $searchModel->search($this->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Asignaciones model.
     * @param int $idasignaciones Idasignaciones
     * @return string
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionView($idasignaciones)
    {
        return $this->render('view', [
            'model' => $this->findModel($idasignaciones),
        ]);
    }

    /**
     * Creates a new Asignaciones model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return string|\yii\web\Response
     */
    public function actionCreate()
    {
        $model = new Asignaciones();

        if ($this->request->isPost) {
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idasignaciones' => $model->idasignaciones]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Asignaciones model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idasignaciones Idasignaciones
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idasignaciones)
    {
        $model = $this->findModel($idasignaciones);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idasignaciones' => $model->idasignaciones]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Asignaciones model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idasignaciones Idasignaciones
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idasignaciones)
    {
        $this->findModel($idasignaciones)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Asignaciones model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idasignaciones Idasignaciones
     * @return Asignaciones the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idasignaciones)
    {
        if (($model = Asignaciones::findOne(['idasignaciones' => $idasignaciones])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
