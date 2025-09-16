<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Chat extends Model
{
    protected $fillable = ['user_id','doctor_id','last_message_at'];

    public function messages(): HasMany
    {
        return $this->hasMany(Message::class);
    }

    public function lastMessage()
    {
        return $this->hasOne(Message::class)->latestOfMany();
    }
    public function doctor()
{
    return $this->belongsTo(User::class, 'doctor_id');
}

public function user()
{
    return $this->belongsTo(User::class, 'user_id');
}

}
