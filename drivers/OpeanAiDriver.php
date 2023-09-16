<?php
/**
 * Arikaim
 *
 * @link        http://www.arikaim.com
 * @copyright   Copyright (c)  Konstantin Atanasov <info@arikaim.com>
 * @license     http://www.arikaim.com/license
 * 
*/
namespace Arikaim\Modules\Mailers\Drivers;

use Arikaim\Core\Driver\Traits\Driver;
use Arikaim\Core\Interfaces\Driver\DriverInterface;
use OpenAI;

/**
 * OpeanAI driver class
 */
class OpeanAiDriver implements DriverInterface
{   
    use Driver;
   
    /**
     * OpenAI client instance
     *
     * @var object|null
     */
    protected $client;

    /**
     * Constructor
     */
    public function __construct()
    {      
        $this->setDriverParams('openai','ai','OpenAi driver','OpenAi client driver');        
    }

    /**
     * Get OpenAi client
     *
     * @return object|null
     */
    public function client(): ?object
    {
        return $this->client;
    }

    /**
     * Init driver
     *
     * @param Properties $properties
     * @return void
     */
    public function initDriver($properties)
    {     
        $config = $properties->getValues();      
        $organization = empty($config['organization'] ?? null) ? null : $config['organization'];

        $this->client = OpenAI::client($config['api_key'],$organization);
    }

    /**
     * Create driver config properties array
     *
     * @param Arikaim\Core\Collection\Properties $properties
     * @return void
     */
    public function createDriverConfig($properties)
    {                        
        // Api key
        $properties->property('api_key',function($property) {
            $property
                ->title('Api Key')
                ->type('text')             
                ->required(true)    
                ->default('');
        });

        // Organization
        $properties->property('organization',function($property) {
            $property
                ->title('Organization')
                ->type('text')             
                ->required(false)    
                ->default('');
        });
         
    }
}
