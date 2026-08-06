<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;

#[Fillable(['name', 'email', 'subject', 'message', 'status', 'is_starred'])]
class Contact extends Model
{
    use Notifiable;

    const STATUS_UNREAD   = 0;
    const STATUS_READ     = 1;
    const STATUS_ARCHIVED = 2;

    // Accessor for display label
    public function getStatusLabelAttribute()
    {
        return match ($this->status) {
            self::STATUS_UNREAD   => 'Unread',
            self::STATUS_READ     => 'Read',
            self::STATUS_ARCHIVED => 'Archived',
            default               => 'Unknown',
        };
    }

    // Scopes for easy filtering
    public function scopeUnread($query)
    {
        return $query->where('status', self::STATUS_UNREAD);
    }

    public function scopeRead($query)
    {
        return $query->where('status', self::STATUS_READ);
    }

    public function scopeArchived($query)
    {
        return $query->where('status', self::STATUS_ARCHIVED);
    }

    public function scopeStarred($query)
    {
        return $query->where('is_starred', true);
    }
}
