<?php

namespace app\controllers;
use Yii;
use yii\web\Controller;
use app\models\Notification;

class NotificationController extends Controller
{
    public function actionIndex()
    {
        $notificationModel = new Notification();
        $notifications = $notificationModel->getAllNotifications();

        return $this->render('index', [
            'notifications' => $notifications,
        ]);
    }

    public function actionCreate()
    {
        $notificationModel = new Notification();

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

        $notification = Notification::findOne(['_id' => $id]);

        if ($notification !== null && $notification->delete()) {
            return ['success' => true];
        } else {
            return ['success' => false];
        }
    }
}