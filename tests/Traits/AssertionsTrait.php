<?php

namespace Milwad\LaravelValidate\Tests\Traits;

trait AssertionsTrait
{
    public function assertValidationPasses(array $data, array $rules): void
    {
        $this->assertTrue($this->getValidatorResult($data, $rules));
    }

    public function assertValidationFails(array $data, array $rules): void
    {
        $this->assertFalse($this->getValidatorResult($data, $rules));
    }

    private function getValidatorResult(array $data, array $rules): bool
    {
        return $this
            ->app['validator']
            ->make($data, $rules)
            ->passes();
    }
}
