## ValidHashtag

If you need to validate a hashtag for example tags input, you can use the `ValidHashtag` rule:

```php
use Milwad\LaravelValidate\Rules\ValidHashtag;

return [
    'hashtag' => ['required', new ValidHashtag()], // hashtag => #milwad
];
```
