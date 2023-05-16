<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Ticket extends Model
{
    use HasFactory;
    protected $fillable = [
        'user_id',
        'date',
        'event_id',
        'price',
    ];

    public function user():BelongsTo
    {
        return $this->belongsTo(User::class);
    }
    public function event():BelongsTo
    {
        return $this->belongsTo(Event::class);
    }
    //updated or created
    public static function store($request,$id = null)
    {
        //request values
        $ticket = $request->only([ 'user_id','date','event_id','price']);
        $ticket = self::updateOrCreate(['id'=> $id], $ticket);
        return $ticket;
    }

}


