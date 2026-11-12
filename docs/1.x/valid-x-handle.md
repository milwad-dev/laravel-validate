## ValidXHandle

If you want to validate an X (formerly Twitter) handle, you can use the `ValidXHandle` rule:

```php
use Milwad\LaravelValidate\Rules\ValidXHandle;

return [
    'x' => ['required', new ValidXHandle()], // x => milwad_dev
];
```

A valid handle is 1 to 15 characters long and contains only letters, digits and underscores.

> **Note**
> New X accounts need at least 4 characters, but older accounts can be shorter, so the rule accepts 1 to 15.

The check is case-insensitive. It checks the format only, not whether the account exists.

### Accepting a leading @

People often type handles with an `@`. To accept that, pass `true`:

```php
return [
    'x' => ['required', new ValidXHandle(true)], // x => @milwad_dev or milwad_dev
];
```

The value is validated as-is, so strip the `@` before you store it if you need the bare handle.

With `using_container` enabled, you can use the string form:

```php
return [
    'x' => 'required|ValidXHandle',            // without @
    'x_with_at' => 'required|ValidXHandle:at', // @ allowed
];
```
