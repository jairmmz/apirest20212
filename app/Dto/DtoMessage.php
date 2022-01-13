<?php
namespace App\Dto;

class DtoMessage
{
	public $type=null;
	public $listMessage=null;

	public function __construct()
	{
		$this->type='error';
		$this->listMessage=[];
	}

	public function exception()
	{
		$this->type='exception';
	}

	public function error()
	{
		$this->type='error';
	}

	public function warning()
	{
		$this->type='warning';
	}

	public function success()
	{
		$this->type='success';
	}

	public function existsMessage()
	{
		return count($this->listMessage)>0;
	}
}
?>

