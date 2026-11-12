<?php

namespace Milwad\LaravelValidate\Tests\Rules;

use Milwad\LaravelValidate\Rules\ValidMongoObjectId;
use Milwad\LaravelValidate\Tests\TestCase;

class ValidMongoObjectIdTest extends TestCase
{
    /**
     * Test MongoDB ObjectId is valid.
     */
    public function test_mongo_object_id_is_valid()
    {
        foreach (['507f1f77bcf86cd799439011', '000000000000000000000000', '507F1F77BCF86CD799439011'] as $id) {
            $this->assertTrue($this->validate($id), "Expected '$id' to be a valid ObjectId.");
        }
    }

    /**
     * Test MongoDB ObjectId is not valid.
     */
    public function test_mongo_object_id_is_not_valid()
    {
        $invalid = [
            '507f1f77bcf86cd79943901',   // 23 characters
            '507f1f77bcf86cd7994390111', // 25 characters
            '507f1f77bcf86cd79943901g',  // non-hex character
            ' 507f1f77bcf86cd799439011', // leading space
            "507f1f77bcf86cd799439011\n", // trailing newline
            'loremipsum',
        ];

        foreach ($invalid as $id) {
            $this->assertFalse($this->validate($id), "Expected '$id' to be an invalid ObjectId.");
        }
    }

    /**
     * Test non-string values are not valid.
     */
    public function test_non_string_mongo_object_id_is_not_valid()
    {
        foreach ([123, ['507f1f77bcf86cd799439011'], null, ''] as $value) {
            $this->assertFalse((new ValidMongoObjectId)->passes('id', $value));
        }
    }

    private function validate(string $id): bool
    {
        return $this->app['validator']
            ->make(['id' => $id], ['id' => [new ValidMongoObjectId]])
            ->passes();
    }
}
