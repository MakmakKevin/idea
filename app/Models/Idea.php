<?php

namespace App\Models;

use App\IdeaStatus;
use Illuminate\Database\Eloquent\Casts\AsArrayObject;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use App\Models\User;
class Idea extends Model
{
    /** @use HasFactory<\Database\Factories\IdeaFactory> */
    use HasFactory;

    protected $casts = [
        'links' => AsArrayObject::class,
        'status' => IdeaStatus::class,
    ];

    public $attributes = [
        'status' => IdeaStatus::PENDING->value,
    ];

    public static function getStatusCounts(User $user)
    {
        $statusCounts = $user->ideas()
            ->selectRaw('status, COUNT(*) as count')
            ->groupBy('status')
            ->pluck('count', 'status');

        return collect(IdeaStatus::cases())
            ->mapWithKeys(fn($status) => [
                $status->value => $statusCounts->get($status->value, 0)
            ])
            ->put('all', $user->ideas()->count());

    }


    public function user():BelongsTo{
        return $this->belongsTo(User::class);
    }


    public function steps(): HasMany{
        return $this->hasMany(Step::class);
    }
}
