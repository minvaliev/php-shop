<?php
/**
 * Created by PhpStorm.
 * User: Альберт
 * Date: 15.01.2019
 * Time: 17:55
 */

namespace app\models;

use yii\db\ActiveRecord;
use Yii;

class Good extends ActiveRecord
{
    public static function tableName()
    {
        return 'good';
    }

    public function getAllGoods() {
        $goods = Yii::$app->cache->get('goods');
        if (!$goods) {
            $goods = Good::find()->asArray()->all();
            Yii::$app->cache->set('goods',$goods,20);
        }

        return $goods;
    }

    public function getGoodsCategories($id) {

        $catGoods = Yii::$app->cache->get("catGoods{$id}");
            if (!$catGoods) {
                $catGoods = Good::find()->where(['category' => $id])->asArray()->all();
                Yii::$app->cache->set('catGoods',$catGoods,20);
            }

        return $catGoods;
    }

//    public function getGoodsCategories($id) {
//
//            $catGoods = Good::find()->where(['category' => $id])->asArray()->all();
//
//        return $catGoods;
//    }

    public function getSearchResults($search) {
        $searchResults = Good::find()->where(['like', 'name', $search])->asArray()->all();
        return $searchResults;
    }
}