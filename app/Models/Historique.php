<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Historique extends Model
{
    use HasFactory;

    protected $fillable = ['livre_id', 'user_id', 'action'];

    // Relation inverse : Un historique appartient à un livre
    public function livre()
    {
        return $this->belongsTo(Livre::class);
    }

    // Relation inverse : Un historique appartient à un utilisateur
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
