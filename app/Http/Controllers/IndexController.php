<?php
namespace App\Http\Controllers;

class IndexController extends Controller
{
	public function __construct(){}

	public function actionIndex()
	{
		return response()->json(
		[
			'welcome' => 'Bienvenido al servicio REST'
		]);
	}
}
?>
