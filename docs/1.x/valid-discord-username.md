## ValidDiscordUsername

If you want to validate bitcoin address you can use `ValidDiscordUsername` rule: 

```php
use Milwad\LaravelValidate\Rules\ValidDiscordUsername;

return [
    'discord-username' => ['required', new ValidDiscordUsername()], // discord-username => Milwad#2134
];
```
