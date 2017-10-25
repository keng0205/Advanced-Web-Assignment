<?php
namespace app\components;

use yii\base\Widget;
use yii\helpers\Html;

/**
 * GalleryHtmlWidget
 */
class zoneWidget extends Widget
{
	public $zone;
	/**
	 * initialize widget properties
	 */
    public function init()
    {
        parent::init();

		if($this->zone == null) {
			$this->zone = [];
		}

    }

	/**
	 * run widget
	 */
    public function run()
    {
    	
		foreach ($this->zone as $aZone)	
		{
			if (isset($aZone->zoneName) || property_exists($aZone, 'zoneName'))				
			{
				echo
				"<h2>".
				Html::encode($aZone->zoneName).
				"</h2>";
			}	
			else
			if(isset($aZone->categoryName) || property_exists($aZone, 'categoryName'))
			{
				echo
				"<h2>".
				Html::encode($aZone->categoryName).
				"</h2>";
			}

			if(isset($aZone->floorNumber) || property_exists($aZone, 'floorNumber'))
			{
				echo
				"<h2>".
				Html::encode($aZone->floorNumber).
				"</h2>";
			}

					if($aZone->tenants==null)
					{
						echo "<h3>OPENING SOON</h3>";
					}
					else{
							foreach($aZone->tenants as $aTenant)
							{
								echo "<a href=?r=tenant/viewtenant&id=".$aTenant->id.">".
								"<div class=panel panel-inverse>".
								"<div class=panel-body>".
								Html::encode("Name:").
								Html::encode($aTenant->name).
								 "<br>".
								 Html::encode("Lot Number:").
								 Html::encode($aTenant->lotNumber).
								  "<br>".
								 Html::encode("Zone:").
								 Html::encode($aTenant->zone->zoneName).
								 "<br>".
								 Html::encode("Category:").
								 Html::encode($aTenant->category->categoryName).
								  "<br>".
								 Html::encode("Floor:").
								 Html::encode($aTenant->floor->floorNumber).
								  "<br>".
								 "</div>".
								 "</div>".
								 "</a>";
							}
						}
				

			}



	
	 }
}




?>