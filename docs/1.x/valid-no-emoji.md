## ValidNoEmoji

If you want to make sure a value contains no emoji, you can use the `ValidNoEmoji` rule:

```php
use Milwad\LaravelValidate\Rules\ValidNoEmoji;

return [
    'username' => ['required', new ValidNoEmoji()], // username => milwad (passes), milwad🚀 (fails)
];
```

This is useful for usernames, codes, fields sent by SMS, or anything that should stay plain text.

The rule follows the Unicode definition of emoji, so it rejects:

- Characters that are emoji by default: 😀 🚀 ✅ ⌚, including skin tones (👍🏽), ZWJ sequences (👨‍👩‍👧) and flags (🇮🇷).
- Text symbols turned into emoji with the variation selector `U+FE0F`: ❤️ ☺️.
- Keycaps: 1️⃣ #⃣.

Symbols that display as text by default are allowed, so normal text such as `© 2026`, `™`, `→`, `☺` and `✔` passes.

Values that are not valid UTF-8 are rejected.
