## ValidDiscordUsername

If you may to validation bitcoin address you can use `ValidDiscordUsername` rule: 

```php
use Milwad\LaravelValidate\Rules\ValidDiscordUsername;

return [
    'bitcoin-address' => ['required', new ValidDiscordUsername()], // discord-username => Milwad#2134
];
```
