<?php

namespace app\controllers;
use app\models\Places;
use Yii;
use yii\web\Controller;


class PlacesController extends Controller
{
    public function actionIndex()
    {
        $notificationModel = new Places();
        $notifications = $notificationModel->getAllNotifications();

        return $this->render('index', [
            'notifications' => $notifications,
        ]);
    }

    public function actionCreate()
    {
        $notificationModel = new Places();

        if (Yii::$app->request->isPost && $notificationModel->addNotification(Yii::$app->request->post())) {
            return $this->redirect(['index']);
        }

        return $this->render('create', [
            'model' => $notificationModel,
        ]);
    }
    public function actionDelete($id)
    {
        \Yii::$app->response->format = \yii\web\Response::FORMAT_JSON;

        $notification = Places::findOne(['_id' => $id]);

        if ($notification !== null && $notification->delete()) {
            return ['success' => true];
        } else {
            return ['success' => false];
        }
    }
}