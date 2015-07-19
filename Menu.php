<?php
namespace cyneek\yii2\menu;

use cyneek\yii2\menu\models\MenuItems;
use Yii;
use yii\base\Widget;
use kartik\sidenav\SideNav;

/**
 * Menu Widget
 *
 * @author Joseba Juaniz <joseba.juaniz@gmail.com>
 * @since 1.0
 */
class Menu extends Widget
{
	/**
	 * @var array the SideNav plugin options passed manually
	 */
	public $options = [];


	/**
	 * Gets a list of ordered menu items from the MenuItems model and
	 * makes an array of items compatible with the SideNav widget
	 *
	 * @return array
	 */
	protected function item_list()
	{
		$menuItemsObj = new MenuItems();

		$items = $menuItemsObj->get_active_menu_items();

		$ordered_list = [];

		foreach ($items as $item) {
			$ordered_list[] = $this->recursive_make_list($item);
		}

		return $ordered_list;

	}

	/**
	 * Does the heavy lifting of making the ordered list of SideNav items
	 * calling recursively each children node to traverse all the nodes
	 *
	 * @param $item
	 * @return mixed
	 */
	protected function recursive_make_list($item)
	{
		$new_item['label'] = $item['data']['label'];

		if ($item['data']['icon'] != '') {
			$new_item['icon'] = $item['data']['icon'];
		}

		if ($item['data']['url'] != '') {
			$new_item['url'] = $item['data']['url'];
		}

		if ($item['data']['options'] != '') {
			$new_item['options'] = json_decode($item['data']['options'], true);
		}

		if (!empty($item['children'])) {
			foreach ($item['children'] as $child) {
				$new_item['items'][] = $this->recursive_make_list($child);
			}
		}

		return $new_item;
	}

	public function run()
	{
		if (!array_key_exists('type', $this->options)) {
			$this->options['type'] = SideNav::TYPE_DEFAULT;
		}

		if (!array_key_exists('encodeLabels', $this->options)) {
			$this->options['encodeLabels'] = FALSE;
		}

		if (!array_key_exists('heading', $this->options)) {
			$this->options['heading'] = '<span class="glyphicon glyphicon-cog"></span> Admin';
		}

		$this->options['items'] = $this->item_list();

		return SideNav::widget($this->options);
	}
}