<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Book extends Model
{
  // Mass assigned
 //protected $fillable = ['title', 'description', 'public_at','created_by'];
 protected $guarded = [];

 public static function boot() {
         parent::boot();

         // create a event to happen on updating
         static::updating(function($book)  {
             //$book->updated_by = Auth::user()->id;
         });

         // create a event to happen on deleting
         // static::deleting(function($table)  {
         //     $table->deleted_by = Auth::user()->username;
         // });

         // create a event to happen on saving
         static::saving(function($book)  {
             $book->created_by = Auth::user()->id;
         });
 }
  public function authors()
  {
      return $this->belongsToMany('App\Author');
  }

}
