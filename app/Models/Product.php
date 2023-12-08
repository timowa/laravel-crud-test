<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Product extends Model
{
    use HasFactory;
    protected $fillable = ['article','name','data','status'];

    public function is_admin(){
        return Auth::user()->is_admin;
    }

    public function scopeAvailable($query){
        return $query->where('status','available');
    }
    public function getAvailable(){
        if($this->status == 'available') return 'Доступен';
        else return 'Недоступен';
    }

    public function getAttr(){
        return json_decode($this->data);
    }
    public function getAttrDescr(){
        $data = json_decode($this->data);
        $stringData = '<span>';
        foreach ($data as $key=>$value){
            $stringData .= $value->name.": ".$value->value."<br>";
        }
        $stringData .= '</span>';

        return $stringData;
    }
}
