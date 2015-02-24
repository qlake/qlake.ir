# نصب

- [نصب کامپوزر](#install-composer)
- [نصب کیولیک](#install-qlake)
- [نیازمندی ها](#server-requirements)

<a name="install-composer"></a>
## نصب کامپوزر

کیولیک برای مدیریت وابستگی ها، از کامپوزر استفاده می کند، بنابراین قبل از نصب کیولیک، می بایست کامپوزر را بر روی سیستم خود نصب کرده باشید. جهت اطلاع از روش نصب، [صفحه رسمی کامپوزر](http://getcomposer.org) را ببینید.

<a name="install-qlake"></a>
## نصب کیولیک

کیولیک را می توانید به چندین روش نصب کنید، البته پیشنهاد ما، نصب با استفاده از کامپوزر است.
### دانلود آخرین نسخه همراه با کتابخانه های وابسته

می توانید از آخرین نسخه پایدار کیولیک (همراه با تمام وابستگی ها) که روزانه برای دانلود در اینجا قرار می دهیم، استفاده کنید.

### از طریق کد مخزن

برای استفاده از این روش، ابتدا آخرین نسخه پایدار را از آدرس http://github.com/qlake/qlake/releases دانلود کنید. بسته به نوع فایل دانلود شده، آنرا از حالت فشرده خارج کرده و از خط فرمان سیستم خود، به مسیر مورد نظر بروید. سپس دستور install کامپوزر را اجرا کنید:

```bash
php composer.phar install
```
<!--
Make sure to place the `~/.composer/vendor/bin` directory in your PATH so the `laravel` executable can be located by your system.

Once installed, the simple `laravel new` command will create a fresh Laravel installation in the directory you specify. For instance, `laravel new blog` would create a directory named `blog` containing a fresh Laravel installation with all dependencies installed. This method of installation is much faster than installing via Composer:

	laravel new blog
-->
###  به وسیله دستور create-project در کامپوزر

همچنین می توانید کیولیک را با استفاده از دستور `create-project` کامپوزر در ترمینال سیستم خود، نصب کنید.

```powershell
php composer.phar create-project qlake/qlake=@dev
```
<a name="server-requirements"></a>
## نیازمندی های سرور

کیولیک برای اجرا شدن کیولیک، موارد زیر:

- PHP >= 5.4
- Mcrypt PHP Extension
- OpenSSL PHP Extension
- Mbstring PHP Extension

As of PHP 5.5, some OS distributions may require you to manually install the PHP JSON extension. When using Ubuntu, this can be done via `apt-get install php5-json`.

<a name="configuration"></a>
## Configuration

The first thing you should do after installing Laravel is set your application key to a random string. If you installed Laravel via Composer, this key has probably already been set for you by the `key:generate` command.

Typically, this string should be 32 characters long. The key can be set in the `.env` environment file. **If the application key is not set, your user sessions and other encrypted data will not be secure!**

Laravel needs almost no other configuration out of the box. You are free to get started developing! However, you may wish to review the `config/app.php` file and its documentation. It contains several options such as `timezone` and `locale` that you may wish to change according to your application.

Once Laravel is installed, you should also [configure your local environment](/docs/5.0/configuration#environment-configuration).

> **Note:** You should never have the `app.debug` configuration option set to `true` for a production application.

<a name="permissions"></a>
### Permissions

Laravel may require some permissions to be configured: folders within `storage` require write access by the web server.

<a name="pretty-urls"></a>
## Pretty URLs

### Apache

The framework ships with a `public/.htaccess` file that is used to allow URLs without `index.php`. If you use Apache to serve your Laravel application, be sure to enable the `mod_rewrite` module.

If the `.htaccess` file that ships with Laravel does not work with your Apache installation, try this one:
```apacheconf
Options +FollowSymLinks
RewriteEngine On

RewriteCond %{REQUEST_FILENAME} !-d
RewriteCond %{REQUEST_FILENAME} !-f
RewriteRule ^ index.php [L]
```
### Nginx

On Nginx, the following directive in your site configuration will allow "pretty" URLs:
```nginx
location / {
	try_files $uri $uri/ /index.php?$query_string;
}
```
Of course, when using [Homestead](/docs/5.0/homestead), pretty URLs will be configured automatically.