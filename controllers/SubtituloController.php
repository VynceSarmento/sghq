<?php

namespace app\controllers;

use Yii;
use app\models\Subtitulo;
use app\models\SubtituloSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * SubtituloController implements the CRUD actions for Subtitulo model.
 */
class SubtituloController extends Controller {

    /**
     * @inheritdoc
     */
    public function behaviors() {
        return [
            'verbs' => [
                'class' => VerbFilter::className(),
                'actions' => [
                    'delete' => ['POST'],
                ],
            ],
        ];
    }

    /**
     * Lists all Subtitulo models.
     * @return mixed
     */
    public function actionIndex() {
        $searchModel = new SubtituloSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
                    'searchModel' => $searchModel,
                    'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single Subtitulo model.
     * @param integer $id
     * @param integer $idTitulo
     * @return mixed
     */
    public function actionView($id, $idTitulo) {
        return $this->render('view', [
                    'model' => $this->findModel($id, $idTitulo),
        ]);
    }

    /**
     * Creates a new Subtitulo model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate() {
        $model = new Subtitulo();

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'idTitulo' => $model->idTitulo]);
        } else {
            return $this->render('create', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing Subtitulo model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @param integer $idTitulo
     * @return mixed
     */
    public function actionUpdate($id, $idTitulo) {
        $model = $this->findModel($id, $idTitulo);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->id, 'idTitulo' => $model->idTitulo]);
        } else {
            return $this->render('update', [
                        'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing Subtitulo model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @param integer $idTitulo
     * @return mixed
     */
    public function actionDelete($id, $idTitulo) {
        $this->findModel($id, $idTitulo)->delete();

        return $this->redirect(['index']);
    }

    /**
     * Finds the Subtitulo model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @param integer $idTitulo
     * @return Subtitulo the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id, $idTitulo) {
        if (($model = Subtitulo::findOne(['id' => $id, 'idTitulo' => $idTitulo])) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }

}
