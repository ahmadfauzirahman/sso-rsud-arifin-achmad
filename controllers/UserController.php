<?php

namespace app\controllers;

use app\components\Auth;
use app\components\HelperSso;
use app\models\TbPegawai;
use Yii;
use app\models\AkunAknUser;
use app\models\AkunAknUserSearch;
use yii\web\Controller;
use yii\web\NotFoundHttpException;
use yii\filters\VerbFilter;

/**
 * UserController implements the CRUD actions for AkunAknUser model.
 */
class UserController extends Controller
{
    /**
     * @inheritdoc
     */
    public function behaviors()
    {
        $this->layout = Auth::getRole();
        return Auth::behaviors([
            'deny' => function ($rule, $action) {
                $this->redirect(['masuk/index']);
            },
        ]);
    }

    function writeResponse($condition, $msg = null, $data = null)
    {
        $_res = new \stdClass();
        $_res->con = $condition == true ? true : false;
        $_res->msg = $msg;
        $_res->results = $data;
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        // $response = new \Phalcon\Http\Response();
        // return $response->setContent(json_encode($_res));
        return $_res;
    }

    /**
     * Lists all AkunAknUser models.
     * @return mixed
     */
    public function actionIndex()
    {
        $searchModel = new AkunAknUserSearch();
        $dataProvider = $searchModel->search(Yii::$app->request->queryParams);

        return $this->render('index', [
            'searchModel' => $searchModel,
            'dataProvider' => $dataProvider,
        ]);
    }

    /**
     * Displays a single AkunAknUser model.
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
     * Creates a new AkunAknUser model.
     * If creation is successful, the browser will be redirected to the 'view' page.
     * @return mixed
     */
    public function actionCreate()
    {
        $model = new AkunAknUser();
//        var_dump($ar);
//        exit();
        if ($model->load(Yii::$app->request->post())) {
            $username = str_replace(" ", "", $model->username);
            $password = md5($model->getPassword());
            $model->setTanggalPendaftaran(date('Y-m-d H:i:s'));
            $model->setUsername($username);
            $model->setPassword($password);
            $model->setStatus('0');
            $model->save();
            return $this->redirect(['view', 'id' => $model->userid]);
        } else {
            return $this->render('create', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Updates an existing AkunAknUser model.
     * If update is successful, the browser will be redirected to the 'view' page.
     * @param integer $id
     * @return mixed
     */
    public function actionUpdate($id)
    {
        $model = $this->findModel($id);

        if ($model->load(Yii::$app->request->post()) && $model->save()) {
            return $this->redirect(['view', 'id' => $model->userid]);
        } else {
            return $this->render('update', [
                'model' => $model,
            ]);
        }
    }

    /**
     * Deletes an existing AkunAknUser model.
     * If deletion is successful, the browser will be redirected to the 'index' page.
     * @param integer $id
     * @return mixed
     */
    public function actionDelete($id)
    {
        $this->findModel($id)->delete();

        return $this->redirect(['index']);
    }


    public function actionGetPegawai($id)
    {
        $data = TbPegawai::find()->where(['pegawai_id' => $id])->one();
//        var_dump($data);
//        var_dump($id);
//        exit();
        return $this->writeResponse(true, "Berhasil", $data);
//        echo Json::encode($data);
    }

    /**
     * Finds the AkunAknUser model based on its primary key value.
     * If the model is not found, a 404 HTTP exception will be thrown.
     * @param integer $id
     * @return AkunAknUser the loaded model
     * @throws NotFoundHttpException if the model cannot be found
     */
    protected function findModel($id)
    {
        if (($model = AkunAknUser::findOne($id)) !== null) {
            return $model;
        } else {
            throw new NotFoundHttpException('The requested page does not exist.');
        }
    }
}
