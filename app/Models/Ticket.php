<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'date',
        'price',
        'event_id',
        'user_id',
    ];

    //updated or created
    public static function store($request,$id = null)
    {
        //request values
        $ticke = $request->only(['date', 'price','event_id','user_id']);
        $ticke = self::updateOrCreate(['id'=> $id], $ticke);
        return $ticke;
    }

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}