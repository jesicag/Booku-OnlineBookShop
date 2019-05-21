<?php
namespace console\controllers;

use Yii;
use yii\console\Controller;

class RbacController extends Controller
{
	public function actionInit()
	{
		$auth = Yii::$app->authManager;
		
		//add "login" permission
		$login = $auth->createPermission('login');
		$login->description = 'Login';
		$auth->add($login);
		
		//add "register" permision
		$register = $auth->createPermission('register');
		$register->description = 'Register';
		$auth->add($register);
		
		//Create role guest
		$guest = $auth->createRole('guest');
		$auth->add($guest);
		$auth->addChild($guest, $login);
		$auth->addChild($guest,$register);
		
		//add "view_detail" permission
		$view_detail = $auth->createPermission('view_detail');
		$view_detail->description = 'view_detail';
		$auth->add($view_detail);
		
		//add "view_stock" permission
		$view_stock = $auth->createPermission('view_stock');
		$view_stock->description = 'view_stock';
		$auth->add($view_stock);
		
		//add "list_detail" permission
		$list_detail = $auth->createPermission('list_detail');
		$list_detail->description = 'list_detail';
		$auth->add($list_detail);
		
		//add "change_password" permission
		$change_password = $auth->createPermission('change_password');
		$change_password->description = 'change_password';
		$auth->add($change_password);
		
		//add "cancel_request_detail" permission
		$cancel_request_detail = $auth->createPermission('cancel_request_detail');
		$cancel_request_detail->description = 'cancel_request_detail';
		$auth->add($cancel_request_detail);
		
		//add "request_detail" permission
		$request_detail = $auth->createPermission('request_detail');
		$request_detail->description = 'request_detail';
		$auth->add($request_detail);
		
		//add "view_cart" permission
		$view_cart = $auth->createPermission('view_cart');
		$view_cart->description = 'view_cart';
		$auth->add($view_cart);
		
		//add "browse_task" permission and give this all permission
		$browse_task = $auth->createPermission('browse');
		$auth->add($browse_task);
		$auth->addChild($browse_task, $view_detail);
		$auth->addChild($browse_task,$view_stock);
		$auth->addChild($browse_task, $list_detail);
		$auth->addChild($browse_task,$change_password);
		$auth->addChild($browse_task, $cancel_request_detail);
		$auth->addChild($browse_task,$request_detail);
		$auth->addChild($browse_task,$view_cart);
		
		//FOR STAFF
		//add "update_detail" permission
		$update_detail = $auth->createPermission('update_detail');
		$update_detail->description = 'update_detail';
		$auth->add($update_detail);
		
		//add "create_detail" permission
		$create_detail = $auth->createPermission('create_detail');
		$create_detail->description = 'create_detail';
		$auth->add($create_detail);
		
		//add "delete_detail" permission
		$delete_detail = $auth->createPermission('delete_detail');
		$delete_detail->description = 'delete_detail';
		$auth->add($delete_detail);
		
		//add "update_stock" permission
		$update_stock = $auth->createPermission('update_stock');
		$update_stock->description = 'update_stock';
		$auth->add($update_stock);
		
		//add "create_stock" permission
		$create_stock = $auth->createPermission('create_stock');
		$create_stock->description = 'create_stock';
		$auth->add($create_stock);
		
		//add "delete_stock" permission
		$delete_stock = $auth->createPermission('delete_stock');
		$delete_stock->description = 'delete_stock';
		$auth->add($delete_stock);
		
		//add "update_user" permission
		$update_user = $auth->createPermission('update_user');
		$update_user->description = 'update_user';
		$auth->add($update_user);
		
		//add "create_user" permission
		$create_user = $auth->createPermission('create_user');
		$create_user->description = 'create_user';
		$auth->add($create_user);
		
		//add "delete_stock" permission
		$delete_user = $auth->createPermission('delete_user');
		$delete_user->description = 'delete_user';
		$auth->add($delete_user);
		
		//add "approve_detail" permission
		$approve_detail = $auth->createPermission('approve_detail');
		$approve_detail->description = 'approve_detail';
		$auth->add($approve_detail);
		
		//add "reject_detail" permission
		$reject_detail = $auth->createPermission('reject_detail');
		$reject_detail->description = 'reject_detail';
		$auth->add($reject_detail);
		
		//add "return_detail" permission
		$return_detail = $auth->createPermission('return_detail');
		$return_detail->description = 'return_detail';
		$auth->add($return_detail);
		
		//add "list_user" permission
		$list_user = $auth->createPermission('list_user');
		$list_user->description = 'list_user';
		$auth->add($list_user);
		
		//add "view_user" permission
		$view_user = $auth->createPermission('view_user');
		$view_user->description = 'view_user';
		$auth->add($view_user);
		
		//add "list_user" permission
		$list_cart = $auth->createPermission('list_cart');
		$list_cart->description = 'list_cart';
		$auth->add($list_cart);
		
		
		//add "view_expired" permission
		$view_expired = $auth->createPermission('view_expired');
		$view_expired->description = 'view_expired';
		$auth->add($view_expired);
		
		//add "view_unexpired" permission
		$view_unexpired = $auth->createPermission('view_unexpired');
		$view_unexpired->description = 'view_unexpired';
		$auth->add($view_unexpired);
		
		$manage_detail = $auth->createPermission('manage_detail');
		$auth->add($manage_detail);
		$auth->addChild($manage_detail, $update_detail);
		$auth->addChild($manage_detail, $create_detail);
		$auth->addChild($manage_detail, $delete_detail);
		
		$manage_stock = $auth->createPermission('manage_stock');
		$auth->add($manage_stock);
		$auth->addChild($manage_stock, $update_stock);
		$auth->addChild($manage_stock, $create_stock);
		$auth->addChild($manage_stock, $delete_stock);
		
		$manage_cart = $auth->createPermission('manage_cart');
		$auth->add($manage_cart);
		$auth->addChild($manage_cart, $list_cart);
		$auth->addChild($manage_cart, $view_cart);
		$auth->addChild($manage_cart, $view_expired);
		$auth->addChild($manage_cart, $view_unexpired);
		$auth->addChild($manage_cart, $approve_detail);
		$auth->addChild($manage_cart, $reject_detail);
		$auth->addChild($manage_cart, $return_detail);
		
		$manage_user = $auth->createPermission('manage_user');
		$auth->add($manage_user);
		$auth->addChild($manage_user, $list_user);
		$auth->addChild($manage_user, $view_user);
		$auth->addChild($manage_user, $create_user);
		$auth->addChild($manage_user, $delete_user);
		$auth->addChild($manage_user, $update_user);
		
		//add "revoke_user" permission
		$revoke_user = $auth->createPermission('revoke_user');
		$revoke_user->description = 'revoke_user';
		$auth->add($revoke_user);
		
		//add "view_user" permission
		$assign_user = $auth->createPermission('assign_user');
		$assign_user->description = 'assign_user';
		$auth->add($assign_user);
		
		//Create role user
		$user = $auth->createRole('user');
		$auth->add($user);
		$auth->addChild($user, $browse_task);
		
		//Create role admin
		$admin = $auth->createRole('admin');
		$auth->add($admin);
		$auth->addChild($admin, $browse_task);
		$auth->addChild($admin, $manage_detail);
		$auth->addChild($admin, $manage_stock);
		$auth->addChild($admin, $manage_cart);
		$auth->addChild($admin, $manage_user);
		$auth->addChild($admin, $revoke_user);
		$auth->addChild($admin, $assign_user);
		
		$auth->assign($admin, 1);
		$auth->assign($user, 2);
	}
	
}