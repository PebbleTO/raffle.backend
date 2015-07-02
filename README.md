Symfony JWT
========================

This is a symfony standard with JWT authentication configured.

Check composer.json for dependencies.

#### Usage

```
php -S 127.0.0.1:80 app_dev.php
```

* Go to ```http://localhost/api/login```
* Login as any in_memory user at security.yml
* There are 2 examples:
  * 1st - Send the request through query string
  * 2nd - Stores the token in the localStorage, goes to an example link, get the token from localStorage and send through Header
