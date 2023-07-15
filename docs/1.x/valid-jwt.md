## ValidJwt

If you want to validate the jwt (JSON Web Token), you can use the `ValidJwt` rule:

```php
use Milwad\LaravelValidate\Rules\ValidJwt;

return [
    'jwt' => ['required', new ValidJwt()], // jwt => eyJ0eXAiOiJKV1QiLCJhbGciOiJIUzI1NiJ9.eyJpc3MiOiJPbmxpbmUgSldUIEJ1aWxkZXIiLCJpYXQiOjE2ODk0MTc2MDEsImV4cCI6MTcyMDk1MzYwMSwiYXVkIjoid3d3LmV4YW1wbGUuY29tIiwic3ViIjoianJvY2tldEBleGFtcGxlLmNvbSIsIkdpdmVuTmFtZSI6IkpvaG5ueSIsIlN1cm5hbWUiOiJSb2NrZXQiLCJFbWFpbCI6Impyb2NrZXRAZXhhbXBsZS5jb20iLCJSb2xlIjpbIk1hbmFnZXIiLCJQcm9qZWN0IEFkbWluaXN0cmF0b3IiXX0.CkbMklirbZiqG4ebCfd53tNgtXBFyYaRIwCCWdakios
];
```
