<?php

namespace Modules\Beer\Presenters;

use Modules\Beer\Transformers\BeerTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class BeerPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new BeerTransformer();
    }
}
