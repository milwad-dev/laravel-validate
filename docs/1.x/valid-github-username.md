## ValidGithubUsername

If you want to validate a GitHub username, you can use the `ValidGithubUsername` rule:

```php
use Milwad\LaravelValidate\Rules\ValidGithubUsername;

return [
    'github' => ['required', new ValidGithubUsername()], // github => milwad-dev
];
```

A valid username is 1 to 39 characters long and contains only letters, digits and hyphens. It can't start or end with a hyphen, or contain two hyphens in a row.

The check is case-insensitive. It checks the format only, not whether the account exists.

### Accepting a leading @

People often type handles with an `@`. To accept that, pass `true`:

```php
return [
    'github' => ['required', new ValidGithubUsername(true)], // github => @milwad-dev or milwad-dev
];
```

The value is validated as-is, so strip the `@` before you store it if you need the bare handle.

With `using_container` enabled, you can use the string form:

```php
return [
    'github' => 'required|ValidGithubUsername',            // without @
    'github_with_at' => 'required|ValidGithubUsername:at', // @ allowed
];
```
