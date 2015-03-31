# مسیریابی

مسیریاب کیولیک به شما این امکان را می دهد که مسیرهایی به Controller یا یک Closure تعریف کنید. نوع اول برای احرای برنامه هایی با معماری MVC و نوع دوم برای اجرای برنامه های سبک، سرویس ها و درخواست های RESTful مناسب است.

## تعریف یک مسیر
یک مسیر در ساده ترین حالت، متشکل از یک آدرس URI و یک Closure است.

### یک مسیر با متد GET
```php
Route::get('page', function()
{
    return 'Hello World!';
});
```
کد بالا، یک مسیر با آدرس `page` و متد `GET` ایجاد می کند که در صورت فراخوانی آدرس فرضی `http://domain.com/page`، خروجی مسیر، متن `Hello World!` خواهد بود.

کیولیک قابلیت تعریف مسیر با سایر متدهای استاندارد پروتکل HTTP را نیز دارد:

### مسیر با سایر متدها
```php
Route::post('/', function()
{
    //
});

Route::put('/', function()
{
    //
});

Route::patch('/', function()
{
    //
});

Route::delete('/', function()
{
    //
});

Route::options('/', function()
{
    //
});

Route::head('/', function()
{
    //
});
```
> نکته: در صورت استفاده از متدهای ارسال غیر از GET و POST، نوع متد می بایست با نام `_method` همراه درخواست ارسال شود، در غیر این صورت مسیر اجرا نخواهد شد.