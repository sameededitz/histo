<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Spatie\MediaLibrary\HasMedia;
use Spatie\MediaLibrary\InteractsWithMedia;

class Message extends Model implements HasMedia
{
    use HasFactory, InteractsWithMedia;

    protected $fillable = ['chat_id', 'message', 'sender'];

    protected $appends = ['image_url'];

    public function chat()
    {
        return $this->belongsTo(Chat::class);
    }

    // public function folders(): BelongsToMany
    // {
    //     return $this->belongsToMany(Folder::class, 'folder_messages');
    // }

    public function registerMediaCollections(): void
    {
        $this->addMediaCollection('image')
            ->useDisk('media')
            ->singleFile()
            ->acceptsMimeTypes([
                'image/jpeg',
                'image/png',
                'image/jpg',
            ]);
    }

    public function getImageUrlAttribute()
    {
        $media = $this->getFirstMedia('image');
        return $media ? $media->getUrl() : null;
    }
}
