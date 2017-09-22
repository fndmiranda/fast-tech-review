<?php

namespace Modules\Beer\Presenters;

use Modules\Beer\Transformers\IngredientTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class IngredientPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new IngredientTransformer();
    }
}
