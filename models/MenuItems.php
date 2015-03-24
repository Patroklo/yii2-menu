<?php

namespace cyneek\yii2\menu\models;

use Yii;
use yii\db\ActiveRecord;

/**
 * MenuItems is the model that loads the menu into the widget
 */
class MenuItems extends ActiveRecord
{
	public $name;
	public $label;
	public $icon;
	public $url;
	public $visible;
	public $options;
	public $parent_id;

	public static function tableName()
	{
		return 'admin_menu_items';
	}

	/**
	 * Gets a list of the active menu items and orders it by parent_id in a
	 * jerarchized array. Used by Admin_menu widget.
	 *
	 * @return array
	 */
	public function get_active_menu_items()
	{
		$itemList = self::find()->where(['visible' => 1])->orderBy('parent_id ASC')->asArray()->all();

		$ordered_menu = [];


		foreach ($itemList as $item)
		{
			if (is_null($item['parent_id']))
			{
				$ordered_menu[$item['id']]['data'] = $item;
				$ordered_menu[$item['id']]['children'] = [];
			}
			else
			{
				$this->recursive_search_item($item, $ordered_menu);
			}
		}

		return $ordered_menu;

	}

	/**
	 * Checks all the menu tree to order the new items that are children of another menu item
	 *
	 * @param $item
	 * @param $ordered_menu
	 */
	protected function recursive_search_item($item, &$ordered_menu)
	{
		if (is_null($ordered_menu))
		{
			return;
		}

		foreach ($ordered_menu as $key => &$menu_item)
		{
			if ($item['parent_id'] == $key)
			{
				$menu_item['children'][$item['id']]['data'] = $item;
				$menu_item['children'][$item['id']]['children'] = [];
			}
			else
			{
				$this->recursive_search_item($item, $menu_item['children']);
			}
		}
	}

	/**
	 * Adds a menu item
	 *
	 * @param $name
	 * @param $parent
	 * @param null $url
	 * @param null $label
	 * @param null $icon
	 * @param null $visible
	 * @param null $options
	 */
	public function add_menu_item($label, $url = NULL, $parent = NULL, $name = NULL, $icon = NULL, $options = NULL, $visible = 1)
	{

		$parent_id = NULL;

		if ( ! is_null($parent))
		{
			$row_parent = self::find()->where(['name' => $parent])->asArray()->one();

			if ( ! is_null($row_parent))
			{
				$parent_id = $row_parent['id'];
			}
		}

		if (is_null($name))
		{
			$name = $label;
		}


		self::insert([  'name' => $name, 'label' => $label,
						'icon' => $icon, 'url' => $url,
						'visible' => $visible, 'options' => $options,
						'parent_id' => $parent_id]);
	}

	/**
	 * Deletes a menu item and all it's children
	 *
	 * @param $name
	 */
	public function delete_menu_item($name)
	{
		$menu_item = self::find()->where(['name' => $name])->asArray()->one();

		if ( ! is_null($menu_item))
		{
			$children = self::find()->where(['parent_id' => $menu_item['id']])->asArray()->all();

			foreach ($children as $child)
			{
				$this->delete_menu_item($child['name']);
			}
			self::deleteAll(['id' => $menu_item['id']]);
		}

	}


	public function hide_menu_item($name)
	{
		self::updateAll(['visible' => 0], ['name' => $name]);
	}

	public function show_menu_item($name)
	{
		self::updateAll(['visible' => 1], ['name' => $name]);
	}

}
