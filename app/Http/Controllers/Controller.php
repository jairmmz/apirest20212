<?php
namespace App\Http\Controllers;

use Laravel\Lumen\Routing\Controller as BaseController;

use App\Dto\DtoMessage;

class Controller extends BaseController
{
	protected $_so;

	public function __construct()
	{
		$this->_so=new \stdClass();

		$this->_so->mo=new DtoMessage();
		$this->_so->dto=new \stdClass();
	}
}
?>
