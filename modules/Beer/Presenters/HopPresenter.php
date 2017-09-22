<?php

namespace Modules\Beer\Presenters;

use Modules\Beer\Transformers\HopTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class HopPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new HopTransformer();
    }
}
