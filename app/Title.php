<?php 

namespace App;
use Illuminate\Database\Eloquent\Model;

class Title extends Model {
    public $timestamps = false;
    //protected $fillable = ['emp_no',  'title', 'from_date', 'to_date'];
    protected $primaryKey = 'emp_no';
   
    public function employee(){
    return $this->belongsTo('App\Employee', 'emp_no');
    }
}

?>
