<?php
namespace app\commands;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{	


	public function actionInit()
	{

		$permissions = [];
		$roles = [];

		$auth=Yii::$app->authManager;

		$tenantModifier = $auth->createPermission('tenantModifier');
        $tenantModifier->description = 'Create, Update and Delete tenant';
        $auth->add($tenantModifier);

        // add "zoneModifier" permission
        $zoneModifier = $auth->createPermission('zoneModifier');
        $zoneModifier->description = 'Create, Update and Delete zone';
        $auth->add($zoneModifier);

        // add "categoryModifier" permission
        $categoryModifier = $auth->createPermission('categoryModifier');
        $categoryModifier->description = 'Create, Update and Delete category';
        $auth->add($categoryModifier);

        // add "categoryModifier" permission
        $floorModifier = $auth->createPermission('floorModifier');
        $floorModifier->description = 'Create, Update and Delete floor';
        $auth->add($floorModifier);


        // add "userModifier" permission
        $userModifier = $auth->createPermission('userModifier');
        $userModifier->description = 'Create, Update and Delete user';
        $auth->add($userModifier);

    

		$roles["editor"] = $auth->createRole("editor");
		$roles["editor"]->description = "Editor";
		$auth->add($roles["editor"]);

		$roles["admin"] = $auth->createRole("admin");
		$roles["admin"]->description = "Admin";
		$auth->add($roles["admin"]);

		$auth->addChild($roles["editor"], $tenantModifier);
		$auth->addChild($roles["admin"], $tenantModifier);
		$auth->addChild($roles["admin"],$zoneModifier);
		$auth->addChild($roles["admin"],$categoryModifier);
		$auth->addChild($roles["admin"],$floorModifier);
		$auth->addChild($roles["admin"],$userModifier);

		$auth->assign($roles['admin'], 8);
		$auth->assign($roles['editor'], 9);


	}
}