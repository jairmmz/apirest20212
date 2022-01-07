<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TLanguage extends Model
{
	protected $table='tlanguage';
	protected $primaryKey='idLanguage';
	protected $keyType='string';
	public $incrementing=false;
	public $timestamps=true;

	public function tFavoriteLanguage()
	{
		return $this->hasMany('App\Models\TFavoriteLanguage', 'idLanguage');
	}
}
?>
