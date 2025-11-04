<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use InvalidArgumentException;

class User extends Model
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory;

    protected $table = 'users';
    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    // public $timestamps = false;

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
    ];

    public function posts(){
        return $this->hasMany(Post::class);
    }

    private function validateNotEmpty(string $value, string $field){
        if (empty(trim($value))) {
            throw new \InvalidArgumentException("$field не может быть пустым.");
        }
    }

    public function setNameAttribute($value){
        $this->validateNotEmpty($value, 'Имя');
        $this->attributes['name'] = $value;
    }

    public function setEmailAttribute($value){
        $this->validateNotEmpty($value, 'Email');

        if (!filter_var($value, FILTER_VALIDATE_EMAIL)) {
            throw new \InvalidArgumentException('Некорректный email формат');
        }
        $this->attributes['email'] = $value;
    }

    public function setPasswordAttribute($value){
        if (strlen($value) < 6 || strlen($value) > 20) {
            throw new InvalidArgumentException('Пароль должен быть от 6 до 20 символов.');
        }

        $this->attributes['password'] = Hash::make($value);
    }
}
