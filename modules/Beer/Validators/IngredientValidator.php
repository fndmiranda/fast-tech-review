<?php

namespace Modules\Beer\Validators;

use \Prettus\Validator\Contracts\ValidatorInterface;
use \Prettus\Validator\LaravelValidator;

class IngredientValidator extends LaravelValidator
{

    protected $rules = [
        ValidatorInterface::RULE_CREATE => [
            'name'         => ['required', 'min:1', 'max:255'],
        ],
        ValidatorInterface::RULE_UPDATE => [
            'name'         => ['required', 'min:1', 'max:255'],
        ],
    ];
}
