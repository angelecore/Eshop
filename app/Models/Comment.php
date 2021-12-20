<?php

namespace App\Models;

use App\LikableTrait;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable=['Komentaras','Kurejo_id'];
    public function commentable()
    {
        return $this->morphTo();
    }

    public function user()
    {
        //var_dump($this->belongsTo(User::class,'id'));
        // $user = User::where('id',$this->Kurejo_id)->first();
        // var_dump($user);
        return $this->belongsTo(User::class,'Kurejo_id');
    }
    public function comments()
    {
        return $this->morphMany(Comment::class,'Forumo_temos')->latest();
    }
}
