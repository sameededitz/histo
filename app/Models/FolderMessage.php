<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_id',
        'sender_id',
        'response_id',
    ];

    /**
     * Sender message relationship.
     */
    public function sender()
    {
        return $this->belongsTo(Message::class, 'sender_id');
    }

    /**
     * Response message relationship.
     */
    public function response()
    {
        return $this->belongsTo(Message::class, 'response_id');
    }

    /**
     * Folder relationship.
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
