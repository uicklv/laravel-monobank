# Laravel Monobank

[![Latest Version on Packagist](https://img.shields.io/packagist/v/uicklv/laravel-monobank.svg?style=flat-square)](https://packagist.org/packages/uicklv/laravel-monobank)
[![Total Downloads](https://img.shields.io/packagist/dt/uicklv/laravel-monobank.svg?style=flat-square)](https://packagist.org/packages/uicklv/laravel-monobank)

Laravel Monobank — це пакет для інтеграції з платіжною системою **Monobank**.  
Він дозволяє швидко підключати еквайринг, створювати платежі та отримувати відповіді від API Monobank у вашому Laravel-проєкті.
Наразі пакет був створений для особистих потреб і має неповний функціонал. В описі нище показано приклад створення інвойсу, але пакет має ще додаткові методи роботи з Monobank. 
В майбутньому будуть розширюватись можливості пакету.
---

## 🚀 Встановлення

Встановіть пакет через Composer:

```bash
composer require uicklv/laravel-monobank
```
Опублікуйте конфіг:

```bash
php artisan vendor:publish --tag="monobank-config"
```
Заповніть змінні в вашому .env файлі:

```bash
MONO_BANK_TOKEN=**************************
MONO_BANK_URL=https://api.monobank.ua/api/
```
## ⚡ Використання
```
<?php

use Uicklv\LaravelMonobank\Facades\Monobank;

// створення інвойсу
$response = Monobank::createInvoice([
    'amount' => 1000,
    'merchantPaymInfo' => [
        'reference' => 4324234,
        'destination' => 'оплата послуг',
    ]
    'webHookUrl' => 'https://example.com/callback'
    'redirectUrl' => 'https://example.com/redirect'
]);

// Отримання статусу відповіді
$response->getStatusCode()

// Отримання ID інвойсу
$response->get('invoiceId')

// Отримання page url оплати
$response->get('pageUrl'),
```
[Документація Monobank](https://api.monobank.ua/docs/acquiring.html)

