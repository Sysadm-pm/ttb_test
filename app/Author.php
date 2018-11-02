<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Author extends Model
{
  protected $fillable = ['firstName', 'secondName', 'lastName','description','was_born'];

  public static function boot() {
          parent::boot();

          // create a event to happen on updating
          static::updating(function($author)  {
              //$book->updated_by = Auth::user()->id;
          });

          // create a event to happen on deleting
          // static::deleting(function($table)  {
          //     $table->deleted_by = Auth::user()->username;
          // });

          // create a event to happen on saving
          static::saving(function($author)  {
              $author->created_by = Auth::user()->id;
          });
  }
}
