<?php

namespace lesson04\example04\demo04;

use lesson04\example04\cart\storage\SessionStorage;
use ReflectionClass;

require_once __DIR__ . '/vendor/autoload.php';

##################################

class Container
{
    private $definitions = [];
    private $shared = [];

    public function set($id, $value)
    {
        $this->shared[$id] = null;
        $this->definitions[$id] = [
            'value' => $value,
            'shared' => false,
        ];
    }

    public function setShared($id, $value)
    {
        $this->shared[$id] = null;
        $this->definitions[$id] = [
            'value' => $value,
            'shared' => true,
        ];
    }

    public function get($id)
    {
        if (isset($this->shared[$id])) {
            return $this->shared[$id];
        }

        if (array_key_exists($id, $this->definitions)) {
            $value = $this->definitions[$id]['value'];
            $shared = $this->definitions[$id]['shared'];
        } else {
            $value = $id;
            $shared = false;
        }

        if (is_string($value)) {
            $reflection = new ReflectionClass($value);
            $arguments = [];
            if (($constructor = $reflection->getConstructor()) !== null) {
                foreach ($constructor->getParameters() as $param) {
                    $paramClass = $param->getClass();
                    $arguments[] = $paramClass ? $this->get($paramClass->getName()) : null;
                }
            }
            $component = $reflection->newInstanceArgs($arguments);
        } else {
            $component = call_user_func($value, $this);
        }

        if (!$component) {
            throw new \Exception('Undefined component ' . $id);
        }

        if ($shared) {
            $this->shared[$id] = $component;
        }

        return $component;
    }
}

##################################

$container = new Container();

$container->set('lesson04\example04\cart\storage\StorageInterface', function (Container $container) {
    return new SessionStorage('cart');
});

$container->set('lesson04\example04\cart\cost\CalculatorInterface', 'lesson04\example04\cart\cost\SimpleCost');

$container->setShared('cart', 'lesson04\example04\cart\Cart');

##################################

$cart = $container->get('cart');
$cart->add(1, 3, 100);
print_r($cart->getItems());

$cart2 = $container->get('cart');
print_r($cart2->getItems());
 