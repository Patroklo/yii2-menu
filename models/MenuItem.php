<?php

namespace cyneek\yii2\menu\models;

use Yii;
use yii\db\ActiveRecord;


/**
 * Class MenuItems
 * @package cyneek\yii2\menu\models
 *
 * @property int $id
 * @property string $name
 * @property string $label
 * @property integer $icon
 * @property string $url
 * @property integer $visible
 * @property string $options
 * @property integer $parent_id
 */
class MenuItem extends ActiveRecord
{
    public static function tableName()
    {
        return 'menu_items';
    }
}