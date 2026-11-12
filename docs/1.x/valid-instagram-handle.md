## ValidInstagramHandle

If you want to validate an Instagram handle, you can use the `ValidInstagramHandle` rule:

```php
use Milwad\LaravelValidate\Rules\ValidInstagramHandle;

return [
    'instagram' => ['required', new ValidInstagramHandle()], // instagram => milwad.dev
];
```

A valid handle is 1 to 30 characters long and contains only letters, digits, underscores and periods. It can't start or end with a period, or contain two periods in a row.

The check is case-insensitive. It checks the format only, not whether the account exists.

### Accepting a leading @

People often type handles with an `@`. To accept that, pass `true`:

```php
return [
    'instagram' => ['required', new ValidInstagramHandle(true)], // instagram => @milwad.dev or milwad.dev
];
```

The value is validated as-is, so strip the `@` before you store it if you need the bare handle.

With `using_container` enabled, you can use the string form:

```php
return [
    'instagram' => 'required|ValidInstagramHandle',            // without @
    'instagram_with_at' => 'required|ValidInstagramHandle:at', // @ allowed
];
```
