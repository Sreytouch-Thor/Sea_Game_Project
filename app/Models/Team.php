<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Team extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'members',
        'created_by_user',
    ];
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class, 'created_by_user', 'id');
    }
    public function events()
    {
        return $this->belongsToMany(Event::class, 'event_teams')->withTimestamps();
    }
    public static function store($reques, $id = null)
    {
        $team = $reques->only(['name', 'members','created_by_user']);

        $team = self::updateOrCreate(['id' => $id], $team);

        return $team;
    }
}
