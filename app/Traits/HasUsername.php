<?php

namespace App\Traits;

use Illuminate\Support\Str;

trait HasUsername
{
    protected static $nameField = 'name';

    public static function bootHasUsername()
    {
        static::creating(function ($model) {
            $model->username = self::generateUsername($model->{self::$nameField});
        });
    }

    public static function generateUsername($fullname)
    {
        $names = collect(explode(' ', $fullname))->map(fn ($el) => Str::lower(Str::ascii($el)));

        $firstName = $names->first();

        $lastName = $names->count() > 1 ? '.'.$names->last() : null;

        $username = "{$firstName}{$lastName}";

        $count = 0;
        $username_aux = $username;
        while (self::where('username', $username_aux)->exists()) {
            $count++;
            $username_aux = "{$username}{$count}";
        }

        $username = $username_aux;

        return $username;
    }
}
