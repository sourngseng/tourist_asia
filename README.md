<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Project

បង្កើតគេហទំព័រទេសចរណ៍ ដែលយើងអាចទិញសំបុត្រ និងមគ្គុទេសន៍ ដើម្បីដើរកំសាន្តនៅប្រទេសកម្ពុជាផងដែរ។

## យើងប្រើប្រាស់ API Laravel & ReactJS

ខាងក្រោមនេះគឺជា ប្រភពនៃកូដដែលបានយកមកប្រើប្រាស់សម្រាប់បង្កើត project មួយនេះ

-   [React JS Tutorial Crud](https://techvblogs.com/blog/build-crud-app-with-laravel-9-and-reactjs)

## របៀបតម្លើង

```
 git clone https://github.com/sourngseng/tourist_asia.git
```

## Reference Document

-   [Phone SMS Laravel](https://www.tutsmake.com/laravel-8-send-sms-to-mobile-with-nexmo-example/)
-   [Khmer Date](https://github.com/phannaly/php-datetime-khmer)
-   **How to use Date Khmer**

```
{{ $flag=="kh"?KhmerDateTime\KhmerDateTime::parse(Auth::user()->created_at)->fromNow(false)
                            : Auth::user()->created_at->diffForHumans()}}
```

**Installation**

```
composer require nexmo/client
or
composer require laravel/nexmo-notification-channel --with-dependencies
```

**Create Route**

```
use App\Http\Controllers\NexmoSMSController;
Route::get('send-sms', [NexmoSMSController::class, 'index']);
```

**Website**

-   https://dashboard.nexmo.com/getting-started/sms

**Install Flag**

-   https://github.com/MohmmedAshraf/blade-flags
-   https://github.com/Monarobase/country-list
-   Installation

        ```
        composer require outhebox/blade-flags

        ```

        ```
        php artisan vendor:publish --tag=blade-flags-config
        ```
        - How to use:
        ```
        <x-flag-country-br />
            <x-flag-country-cn />
            <x-flag-country-gb />
            <x-flag-country-ru />
            <x-flag-country-us />
        ```
        ```
        <x-flag-country-us class="w-6 h-6"/>
        ```
