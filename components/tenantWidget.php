<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * GalleryHtmlWidget
 */
class tenantWidget extends Widget
{
	public $tenants;
	/**
	 * initialize widget properties
	 */
    public function init()
    {
        parent::init();

		if($this->tenants == null) {
			$this->tenants = [];
		}

    }

	/**
	 * run widget
	 */
    public function run()
    {
    	
		foreach ($this->tenants as $tenant)	{
		echo "<a href=?r=tenant/viewtenant&id=".$tenant->id.">".
				"<div class=panel panel-inverse>".
				"<div class=panel-body>".
				Html::encode("Name:").
				Html::encode($tenant->name).
				 "<br>".
				 Html::encode("Lot Number:").
				 Html::encode($tenant->lotNumber).
				  "<br>".
				 Html::encode("Zone:").
				 Html::encode($tenant->zone->zoneName).
				 "<br>".
				 Html::encode("Category:").
				 Html::encode($tenant->category->categoryName).
				  "<br>".
				 Html::encode("Floor:").
				 Html::encode($tenant->floor->floorNumber).
				  "<br>".
				 "</div>".
				 "</div>".
				 "</a>";
		}

	}



	
 }




?>