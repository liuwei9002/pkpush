#### composer 要用到的
```
 "scripts": {
        "post-root-package-install": [
            "php -r \"copy('.env.example', '.env');\""
        ],
        "post-create-project-cmd": [
            "php artisan key:generate"
        ],
        "post-install-cmd": [
            "php artisan clear-compiled",
            "php artisan optimize"
        ],
        "pre-update-cmd": [
            "php artisan clear-compiled"
        ],
        "post-update-cmd": [
            "php artisan optimize"
        ]
    },
    //设置中国镜像
        "repositories": {
            "packagist": {
                "type": "composer",
                "url": "https://packagist.phpcomposer.com"
            }
        }

```