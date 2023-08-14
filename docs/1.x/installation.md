# Requirements

***

- ```PHP >= 8.0```
- ```Laravel >= 9.0```
- ```Morilog-Jalali >= 3.x```

| GitHub | L6 | L7 | L8 | L9 | L10 |
|--------|----|----|----|----|-----|
| 1.5    | ✅  | ✅  | ✅  | ✅  | ❌   |
| 1.6    | ❌  | ❌  | ❌  | ✅  | ✅   |
| 1.7    | ❌  | ❌  | ❌  | ✅  | ✅   |

# Installation

You can install the package with Composer.

```bash
composer require milwad/laravel-validate
```

# Publish

If you want to publish a lang file for a custom validation message you can run this command in the terminal:

```shell
php artisan vendor:publish --tag="validate-lang-{$lang}"
```

You can replace `$lang` with your lang name, for ex:

```shell
php artisan vendor:publish --tag="validate-lang-en"
```

If you don't know about langs name you can go [Support Languages](#support-languages)
