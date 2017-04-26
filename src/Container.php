<?php

namespace Immortal;

use Immortal\Component\Container\Container as ImmortalContainer;
use Immortal\Interfaces\ContainerInterface;

class Container extends ImmortalContainer implements ContainerInterface
{
    private $defaultSettings = [
        'httpVersion' => '1.1',
        'responseChunkSize' => 4096,
        'outputBuffering' => 'append',
        'determineRouteBeforeAppMiddleware' => false,
        'displayErrorDetails' => false,
        'addContentLengthHeader' => true,
        'routerCacheFile' => false,
    ];

    public function __construct(array $values)
    {
        parent::__construct($values);

        $userSettings = isset($values['settings']) ? $values['settings'] : [];

        $this->registerServices($userSettings);
    }

    #------------------------------------------------------------------------
    # Container interface
    #------------------------------------------------------------------------

    public function registerServices(array $userSettings = [])
    {
        $defaultSettings = $this->defaultSettings;

        $this['settings'] = function () use ($userSettings, $defaultSettings) {
            return new Collection(array_merge($defaultSettings, $userSettings));
        };

        $serviceProvider = new ServiceProvider();
        $serviceProvider->register($this);
    }

    #------------------------------------------------------------------------
    # PsrContainer interface
    #------------------------------------------------------------------------

    public function get($key)
    {
        return $this->offsetGet($key);
    }

    public function has($key)
    {
        return $this->offsetExists($key);
    }
}
