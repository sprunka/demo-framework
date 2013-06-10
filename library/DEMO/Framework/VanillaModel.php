<?php

namespace DEMO\Framework;

use Inflection\Inflection;

/**
 * Base Class for all Models
 * @author Sean Prunka
 * @version 1.0
 *
 */
class VanillaModel
{
    protected $pModel;

    public function __construct(Inflection $inflect)
    {
        $this->pLimit = PAGINATE_LIMIT;
        $this->pModel = get_class($this);
    }

    public function __destruct()
    {
    }
}
