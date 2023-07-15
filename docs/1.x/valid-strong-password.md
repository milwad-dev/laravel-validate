## ValidStrongPassword

If you are using the `ValidStrongPassword` rule, the password must contain a capital word, a small letter, numbers, and a special character like (!@#$%^&*):

```php
use Milwad\LaravelValidate\Rules\ValidStrongPassword;

return [
    'password' => ['required', new ValidStrongPassword()], // password => Milwad123!
];
```
