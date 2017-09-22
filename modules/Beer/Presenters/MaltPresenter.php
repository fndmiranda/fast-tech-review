<?php

namespace Modules\Beer\Presenters;

use Modules\Beer\Transformers\MaltTransformer;
use Prettus\Repository\Presenter\FractalPresenter;

class MaltPresenter extends FractalPresenter
{
    /**
     * Transformer
     *
     * @return \League\Fractal\TransformerAbstract
     */
    public function getTransformer()
    {
        return new MaltTransformer();
    }
}
