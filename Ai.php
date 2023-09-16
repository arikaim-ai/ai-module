<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Ai;

use Arikaim\Core\Extension\Module;

/**
 * Ai module class
 */
class Ai extends Module
{   
    /**
     * Install module
     *
     * @return void
     */
    public function install()
    {
        $this->installDriver('Arikaim\\Modules\\Ai\\Drivers\\OpeanAiDriver');
    }
}
