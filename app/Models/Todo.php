<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Todo extends Model
{
    use HasFactory;

    protected $fillable = ['title','completed', 'user_id', 'description'];

    public function steps(){

        return $this->hasmany(Step::class);
    
    }
    
    /*public static function create($title){
        
        $filename = $title->getClientOriginalName();
        //(new self())->deleteOldImage();
        $image->storeAs('images', $filename, 'public');
        auth()->user()->update(['avatar' => $filename]);

            
    }*/
}
