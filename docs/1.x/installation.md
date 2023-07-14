                                                       # Requirements
***
- ```PHP >= 8.0```
- ```Laravel >= 9.0```
- ```Morilog-Jalali >= 3.x```


| GitHub    | L6                 | L7                 | L8                 | L9                 | L10                |
|-----------|--------------------|--------------------|--------------------|--------------------|--------------------|
| 1.5       | :white_check_mark: | :white_check_mark: | :white_check_mark: | :white_check_mark: | :x:                |
| 1.6       | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: |
| 1.7       | :x:                | :x:                | :x:                | :white_check_mark: | :white_check_mark: |

# Installation
You can install package with composer.

```bash
composer require milwad/laravel-validate
```

# Publish
If you want to publish lang file for custom validation message you can run this command in terminal:

```shell
php artisan vendor:publish --tag="validate-lang-{$lang}"
```

You can replace `$lang` to your lang name, for ex:

```shell
php artisan vendor:publish --tag="validate-lang-en"
```

If you don't know about langs name you can go [Support Languages](#support-languages)
