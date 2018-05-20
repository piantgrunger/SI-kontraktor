<?php

namespace app\controllers;

use Yii;
use app\models\RAB;
use app\models\RABSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\d_RAB;
/**
 * RABController implements the CRUD actions for RAB model.
 */
class RabController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
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
     * Lists all RAB models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new RABSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single RAB model.
     * @param integer $id
     * @return mixed
     */
    public function actionView($id)
    {
        return $this->render('view', [
            'model' => $this->findModel($id),
        ]);
    }

    /**
     * Creates a new RAB model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new RAB();

        if ($model->load(Yii::$app->request->post())) {
            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailRab = Yii::$app->request->post('d_RAB', []);

                if (($model->save()) && (count($model->detailRab) > 0)
                   ) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_rab]);
                }
                $transaction->rollBack();
            } catch (\Exception $ecx) {

                $transaction->rollBack();
                throw $ecx;
            }
            if (count($model->detailRab) == 0) {
                $model->addError('detailRAB', 'RAB Harus memiliki detail Pekerjaan');
            }


            return $this->render('create', [
                'model' => $model,
            ]);
            } else {
             $model->tgl_rab=date('Y-m-d');
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing RAB model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailRab = Yii::$app->request->post('d_RAB', []);

                if (($model->save()) && (count($model->detailRab) > 0)) {
                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_rab]);
                }
                $transaction->rollBack();
            } catch (\Exception $ecx) {

                $transaction->rollBack();
                throw $ecx;
            }
            if (count($model->detailRab) == 0) {
                $model->addError('detailRAB', 'RAB Harus memiliki detail Pekerjaan');
            }


            return $this->render('update', [
                'model' => $model,
            ]);
        }  else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }
    public function actionPekerjaan($id)
    {
        $model = d_RAB::findOne($id);

        if ($model->load(Yii::$app->request->post(),'')) {

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->sDetailRabMaterial = Yii::$app->request->post('sd_RAB_material', []);
                $model->sDetailRabPeralatan = Yii::$app->request->post('sd_RAB_peralatan', []);
                $model->sDetailRabPekerja = Yii::$app->request->post('sd_RAB_pekerja', []);


                if (($model->save()) ) {

                    $transaction->commit();
                    return $this->redirect(['view', 'id' => $model->id_rab]);
                }
                $transaction->rollBack();
            } catch (\Exception $ecx) {

                $transaction->rollBack();
                throw $ecx;
            }


            return $this->render('pekerjaan', [
                'model' => $model,
            ]);
        } else {
            return $this->render('pekerjaan', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing RAB model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {

       try
      {
        $this->findModel($id)->delete();

      }
      catch(\yii\db\IntegrityException  $e)
      {
	Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dipakai Modul Lain");
       }
         return $this->redirect(['index']);
    }

    /**
     * Finds the RAB model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return RAB the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = RAB::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
