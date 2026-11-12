## ValidMongoObjectId

If you want to validate a MongoDB ObjectId, you can use the `ValidMongoObjectId` rule:

```php
use Milwad\LaravelValidate\Rules\ValidMongoObjectId;

return [
    'post_id' => ['required', new ValidMongoObjectId()], // post_id => 507f1f77bcf86cd799439011
];
```

A valid ObjectId is exactly 24 hexadecimal characters. Upper-case hex is accepted, like MongoDB's own `ObjectId.isValid()`.

If the `mongodb` PHP extension is installed, a `MongoDB\BSON\ObjectId` instance is accepted as well.

> **Note**
> This rule checks the format only. To check that a document with this id exists, combine it with Laravel's `exists` rule.
