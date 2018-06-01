<?php

namespace app\controllers;

use Yii;
use app\models\RABSearch;

use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;
use app\models\RAB;
use app\models\d_RAB;
use app\models\sd_RAB_material;
use app\models\sd_RAB_pekerja;
use app\models\sd_RAB_peralatan;
use app\models\RAB_history;
use app\models\d_RAB_history;
use app\models\sd_RAB_history_material;
use app\models\sd_RAB_history_pekerja;
use app\models\sd_RAB_history_peralatan;
use Mpdf\Tag\Dd;

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
                     return $this->render('edit_pekerjaan', [
                        'model' => $this->findModel($model->id_rab),
                    ]);
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
    public function actionRevisi($id)
    {
        $model = $this->findModel($id);
        $model->scenario='revisi';
        $old_revisi= $model->tgl_revisi;
        $model->old_file_acuan_revisi= $model->file_acuan_revisi;

        $historyModel = new RAB_history;
        $historyModel ->setAttributes($model->getAttributes(null,['id_rab']), false);
        $historyModel->no_rab = $model->no_rab .' Revisi :'.date("Y-m-d H:i:s");
       $dhistoryModel1=[];
        foreach ($model->detailRab as  $dmodel1 )
        {
            $dhistoryModel = new d_RAB_history;
            $dhistoryModel->setAttributes($dmodel1->getAttributes(null, ['id_rab','id_d_rab']), false);

            $sdHistoryMaterial = [];
            foreach($dmodel1->sDetailRabMaterial as $sdModel1)
            {
                $SModelMaterial = new sd_RAB_history_material;
                $SModelMaterial ->setAttributes($sdModel1->getAttributes(null, ['id_d_rab', 'id_sd_rab']), false);

                $sdHistoryMaterial[] = $SModelMaterial;
            }
            $dhistoryModel->sDetailRabMaterial =$sdHistoryMaterial;

            $sdHistoryPeralatan = [];
            foreach ($dmodel1->sDetailRabPeralatan as $sdModel2) {
                $SModelPeralatan = new sd_RAB_history_peralatan;
                $SModelPeralatan -> setAttributes($sdModel2->getAttributes(null, ['id_d_rab', 'id_sd_rab']), false);

                $sdHistoryPeralatan[] = $SModelPeralatan;
            }
            $dhistoryModel->sDetailRabPeralatan = $sdHistoryPeralatan;

            $sdHistoryPekerja = [];
            foreach ($dmodel1->sDetailRabPekerja as $sdModel3) {
                $SModelPekerja = new sd_RAB_history_pekerja;
                $SModelPekerja -> setAttributes($sdModel3->getAttributes(null, ['id_d_rab', 'id_sd_rab']), false);

                $sdHistoryPekerja[] = $SModelPekerja;
            }
            $dhistoryModel->sDetailRabPekerja = $sdHistoryPekerja;





            $dhistoryModel1[] = $dhistoryModel;

        }
        $historyModel->detailRab = $dhistoryModel1;


        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailRab = Yii::$app->request->post('d_RAB', []);

                if (($model->upload('file_acuan_revisi'))&& ($model->save()) && (count($model->detailRab) > 0)) {
                    $transaction->commit();
                    if ($old_revisi !== $model->tgl_revisi)
                       $historyModel->save(false);

                    return $this->render('edit_pekerjaan', [
                        'model' => $this->findModel($id),
                    ]);
                }
                $transaction->rollBack();
            } catch (\yii\db\IntegrityException $e) {
                $transaction->rollBack();

                Yii::$app->session->setFlash('error', "Data Tidak Dapat Direvisi Karena Dipakai Modul Lain");
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
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post())) {

            $transaction = Yii::$app->db->beginTransaction();
            try {
                $model->detailRab = Yii::$app->request->post('d_RAB', []);

                if (($model->upload('file_acuan_revisi')) && ($model->save()) && (count($model->detailRab) > 0)) {
                    $transaction->commit();

                    return $this->render('edit_pekerjaan', [
                        'model' => $this->findModel($id),
                    ]);
                }
                $transaction->rollBack();
            } catch (\yii\db\IntegrityException $e) {
                $transaction->rollBack();

                Yii::$app->session->setFlash('error', "Data Tidak Dapat Diubah Karena Dipakai Modul Lain");
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
        } else {
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

                    $modelRAB = d_RAB::findOne($model->id_d_rab);
                    $model_d_material = sd_RAB_material::find() ->where(['id_d_rab' =>$model->id_d_rab]);
                    $modelRAB->total_biaya_material = is_null($model_d_material->sum('sub_total')) ? 0 : $model_d_material->sum('sub_total');
                    $model_d_peralatan = sd_RAB_peralatan::find()->where(['id_d_rab' => $model->id_d_rab]);
                    $modelRAB->total_biaya_peralatan = is_null($model_d_peralatan->sum('sub_total')) ? 0 : $model_d_peralatan->sum('sub_total');
                    $model_d_pekerja = sd_RAB_pekerja::find()->where(['id_d_rab' => $model->id_d_rab]);
                    $modelRAB->total_biaya_pekerja = is_null($model_d_pekerja->sum('sub_total'))?0: $model_d_pekerja->sum('sub_total');

                    $modelRAB->save();


                    $modelRAB = RAB::findOne($model->id_rab);
                    $model_d = d_RAB::find()->where(['id_rab' => $model->id_rab]);
                    $modelRAB->total_biaya_material = is_null($model_d->sum('total_biaya_material')) ? 0 : $model_d->sum('total_biaya_material');
                    $modelRAB->total_biaya_peralatan = is_null($model_d->sum('total_biaya_peralatan')) ? 0 : $model_d->sum('total_biaya_peralatan');
                    $modelRAB->total_biaya_pekerja = is_null($model_d->sum('total_biaya_pekerja')) ? 0 : $model_d->sum('total_biaya_pekerja');
                    $modelRAB->total_rab = $modelRAB->total_biaya_material+ $modelRAB->total_biaya_peralatan+ $modelRAB->total_biaya_pekerja+
                        $modelRAB->margin+ $modelRAB->dana_cadangan;
                    $modelRAB->save();


              return $this->render('edit_pekerjaan', [
            'model' => $this->findModel($model->id_rab),
        ]);
                }
                $transaction->rollBack();
            } catch (\yii\db\IntegrityException $e) {
                $transaction->rollBack();

                Yii::$app->session->setFlash('error', "Data Tidak Dapat Dihapus Karena Dipakai Modul Lain");
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
