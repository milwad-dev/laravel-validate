## ValidHashtag

If you need to validation hashtag for example tags input, you can use `ValidHashtag` rule:

```php
use Milwad\LaravelValidate\Rules\ValidHashtag;

return [
    'hashtag' => ['required', new ValidHashtag()], // hashtag => #milwad
];
```
