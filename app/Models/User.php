<?php
namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
// use Database\Factories\UserFactory;
use App\Traits\TracksUserActions;
use Illuminate\Database\Eloquent\Attributes\Fillable;
use Illuminate\Database\Eloquent\Attributes\Hidden;
use Illuminate\Database\Eloquent\Concerns\HasUlids;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

#[Fillable([
        'user_name',
        'email',
        'password',
        'certificate_name',
        'nickname',
        'slug',
        'wilayah',
        'weight',
        'gender',
        'phone',
        'phone2',
        'address',
        'images',
        'isActive',
        'mustChangePassword',
        'created_by',
        'updated_by',
        'restored_by',
        'deleted_by',
        'restored_at',
        'reset_by',
        'reset_at',
    ])]
#[Hidden(['password', 'remember_token'])]
class User extends Authenticatable
{
    /** @use HasFactory<UserFactory> */
    use HasUlids, HasFactory, Notifiable, SoftDeletes, TracksUserActions;

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */

    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password'          => 'hashed',
        ];
    }

    public function contributors()
    {
        return $this->hasMany(Contributor::class);
    }
}
