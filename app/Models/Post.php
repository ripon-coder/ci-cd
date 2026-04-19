<?php

namespace App\Models;
use App\Enum\EnumStatus;
use App\Observers\PostObserver;
use Illuminate\Database\Eloquent\Attributes\ObservedBy;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

#[ObservedBy([PostObserver::class])]
class Post extends Model
{
    protected $fillable = ['title','content','likes','dislikes','views','comments','is_published'];
    
    protected $casts = [
        'is_published' => EnumStatus::class,
    ];
    public function user() : BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
