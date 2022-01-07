<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class TFavoriteLanguage extends Model
{
    protected $table='tfavoritelanguage';
    protected $primaryKey='idFavoriteLanguage';
    protected $keyType='string';
    public $incrementing=false;
    public $timestamps=true;

	public function tPerson()
	{
		return $this->belongsTo('App\Models\TPerson', 'idPerson');
	}

	public function tLanguage()
	{
		return $this->belongsTo('App\Models\TLanguage', 'idLanguage');
	}    
}
?>