<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Event extends Model
{
    use HasFactory;


    protected $fillable = [
        'name',
        'description',
        'start_date',
        'end_date',
        'create_by_user',
        // 'team_id',
    ];
    //user 
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'create_by_user', 'id');
    }
    //ticket
    public function tickets(): HasMany
    {
        return $this->hasMany(Ticket::class);
    }
    //teams
    public function teams()
    {
        return $this->belongsToMany(Team::class, 'event_teams')->withTimestamps();
    }

    public static function store($request,$id = null)
    {
        //request values
        $event = $request->only(['name','description','start_date','end_date','create_by_user']);
        $event = self::updateOrCreate(['id'=> $id], $event);

        $events = request('teams');
        $event->teams()->sync($events);
        return $event;
    }


    
   


}
