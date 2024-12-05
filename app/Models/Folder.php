<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Folder extends Model
{
    use HasFactory;

    protected $fillable = ['user_id', 'name'];


    protected static function boot()
    {
        parent::boot();

        static::deleting(function ($folder) {
            $folder->messages->each(function ($message) {
                $message->clearMediaCollection('image');
                $message->delete();
            });
        });
    }

    /**
     * Relationship with User
     */
    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Relationship with Messages
     */
    public function messages()
    {
        return $this->hasMany(FolderMessage::class);
    }
}
