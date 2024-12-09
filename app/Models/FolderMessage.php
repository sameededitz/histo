<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class FolderMessage extends Model
{
    use HasFactory;

    protected $fillable = [
        'folder_id',
        'question',
        'answer',
    ];

    /**
     * Folder relationship.
     */
    public function folder()
    {
        return $this->belongsTo(Folder::class);
    }
}
