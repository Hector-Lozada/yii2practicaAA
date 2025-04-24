<?php

namespace app\controllers;

use app\models\Empleados;
use app\models\EmpleadosSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

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
            if ($model->load($this->request->post()) && $model->save()) {
                return $this->redirect(['view', 'idempleados' => $model->idempleados]);
            }
        } else {
            $model->loadDefaultValues();
        }

        return $this->render('create', [
            'model' => $model,
        ]);
    }

    /**
     * Updates an existing Empleados model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param int $idempleados Idempleados
     * @return string|\yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionUpdate($idempleados)
    {
        $model = $this->findModel($idempleados);

        if ($this->request->isPost && $model->load($this->request->post()) && $model->save()) {
            return $this->redirect(['view', 'idempleados' => $model->idempleados]);
        }

        return $this->render('update', [
            'model' => $model,
        ]);
    }

    /**
     * Deletes an existing Empleados model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param int $idempleados Idempleados
     * @return \yii\web\Response
     * @throws NotFoundHttpException if the model cannot be found
     */
    public function actionDelete($idempleados)
    {
        $this->findModel($idempleados)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Empleados model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param int $idempleados Idempleados
     * @return Empleados the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($idempleados)
    {
        if (($model = Empleados::findOne(['idempleados' => $idempleados])) !== null) {
            return $model;
        }

        throw new NotFoundHttpException(Yii::t('app', 'The requested page does not exist.'));
    }
}
