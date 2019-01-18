<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 17.01.2019
 * Time: 19:14
 */

namespace app\controllers;

use app\models\Cart;
use app\models\Good;
use yii\web\Controller;
use Yii;

class CartController extends Controller

    {
        public function actionOpen () {
            $session = Yii::$app->session;
            $session->open();
//            $session->remove('cart');
//            $session->remove('cart.totalSum');
//            $session->remove('cart.totalQuantity');
            return $this->renderPartial('cart', compact( 'session'));
        }
        public function actionAdd ($name) {
            $good = new Good();
            $good = $good->getOneGood($name);
            $session = Yii::$app->session;
            $session->open();
//            $session->remove('cart');
            $cart = new Cart();
            $cart = $cart->AddToCart($good);
            return $this->renderPartial('cart', compact('good', 'session'));
            }
}