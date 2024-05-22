<?php

namespace App\Forms\Components;

use Filament\Forms\Components\Component;

class UserForm extends Component {
    protected string $view = 'forms.components.user-form';

    public static function make(): static {
        return app(static::class);
    }
}
