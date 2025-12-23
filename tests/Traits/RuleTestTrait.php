<?php

namespace Milwad\LaravelValidate\Tests\Traits;

trait RuleTestTrait
{
    public function test_the_happy_path(): void
    {
        $this->assertValidationPasses(
            $this->getData('valid'),
            $this->getRules()
        );
    }

    public function test_the_unhappy_path(): void
    {
        $this->assertValidationFails(
            $this->getData('invalid'),
            $this->getRules()
        );
    }

    private function getRules(): array
    {
        throw_if(
            ! property_exists($this, 'rules') && ! method_exists($this, 'setRules'),
            new \LogicException(
                'You must define a $rules property or setRules() method.'
            )
        );

        if (! property_exists($this, 'rules')) {
            return $this->setRules();
        }

        throw_if(
            ! class_exists($this->rules),
            new \InvalidArgumentException(
                "Validation rule class [{$this->rules}] does not exist."
            )
        );

        $class = $this->rules;

        return [$this->getKey() => [new $class]];
    }

    private function getData(string $type): array
    {
        throw_if(
            ! in_array($type, ['valid', 'invalid']),
            new \InvalidArgumentException('Invalid data type.')
        );

        $dataProperty = $type.'Data';
        $method = 'get'.ucfirst($dataProperty);

        throw_if(
            ! property_exists($this, $dataProperty) && ! method_exists($this, $method),
            new \LogicException(
                "You must define a $ {$dataProperty}] property or {$method} method."
            )
        );

        if (method_exists($this, $method)) {
            return $this->$method();
        }

        if (is_null($this->$dataProperty) || empty($this->$dataProperty)) {
            throw new \Exception($type.'data property is empty');
        }

        return [$this->getKey() => $this->$dataProperty];
    }

    private function getKey(): string
    {
        return property_exists($this, 'key') ?
            $this->key :
            substr(self::class, (int) strrpos(self::class, '\\') + 1);
    }
}
