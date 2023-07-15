## ValidDiscordUsername

If you want to validate the discord username, you can use the `ValidDiscordUsername` rule: 

```php
use Milwad\LaravelValidate\Rules\ValidDiscordUsername;

return [
    'discord-username' => ['required', new ValidDiscordUsername()], // discord-username => Milwad#2134
];
```
