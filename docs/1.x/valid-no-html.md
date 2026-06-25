## ValidNoHtml

If you want to validate that a string does not contain any HTML tags, you can use the `ValidNoHtml` rule:

```php
use Milwad\LaravelValidate\Rules\ValidNoHtml;

return [
    'content' => ['required', new ValidNoHtml()], // content => Hello World
];
```

By default, the rule checks for direct HTML tags in the given string:

```php
use Milwad\LaravelValidate\Rules\ValidNoHtml;

return [
    'content' => ['required', new ValidNoHtml()], // content => <b>Hello World</b> => invalid
];
```

You can also enable strict mode to detect HTML tags that are encoded as HTML entities:

```php
use Milwad\LaravelValidate\Rules\ValidNoHtml;

return [
    'content' => ['required', new ValidNoHtml(strict: true)],
    // content => &lt;script&gt;alert('test')&lt;/script&gt; => invalid
];
```

> **Note**  
> When strict mode is enabled, the value will first be decoded using `html_entity_decode()` before validation. This allows the rule to detect encoded HTML tags such as `&lt;b&gt;Text&lt;/b&gt;` and reject them.

## ValidNoHtml Parameters

| Parameter | Type   | Default | Description                                                            |
|-----------|--------|---------|------------------------------------------------------------------------|
| `strict`  | `bool` | `false` | Decodes HTML entities before validation and rejects encoded HTML tags. |

## Examples

### Valid Values

```text
Hello World
This is a plain text message.
user@example.com
123456
```

### Invalid Values

```html
<b>Hello World</b>
<script>alert('test')</script>
<a href="https://example.com">Example</a>
```

### Invalid Values in Strict Mode

```text
&lt;b&gt;Hello World&lt;/b&gt;
&lt;script&gt;alert('test')&lt;/script&gt;
```
