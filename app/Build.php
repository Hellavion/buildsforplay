<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Build extends Model
{
    /**
     * Массово присваиваемые атрибуты.
     *
     * @var array
     */
    protected $fillable = ['name', 'user_id', 'url_video', 'description', 'full_text'];

    /**
     * Получить пользователя - владельца данной статьи
     */
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    /**
     * Получить список билдов
     */
    public function getList()
    {
        return $this->get();
    }
}
