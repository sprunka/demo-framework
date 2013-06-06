<?php
namespace DEMO\Framework;

/**
 * Base Class for all Models
 * @author Sean Prunka
 * @version 1.0
 *
 */
class VanillaModel
{
    protected $pModel;
    
    public function __construct()
    {
        global $inflect;
        $this->pLimit = PAGINATE_LIMIT;
        $this->pModel = get_class($this);
    }
    
    public function __destruct()
    {
    }
}
