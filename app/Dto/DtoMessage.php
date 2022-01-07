<?php
namespace App\Dto;

class DtoMessage
{
	public $type=null;
	public $message=null;

	public function __construct()
	{
		$this->type='error';
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
}
?>
