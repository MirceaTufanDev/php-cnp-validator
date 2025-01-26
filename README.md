# PHP CNP Validator

A lightweight and extensible library for validating Romanian CNP (Cod Numeric Personal) in PHP. It uses rules-based validation and supports multiple languages for error messages.

## Features
- Validates CNPs based on multiple rules:
    - Length
    - Numeric content
    - Valid date
    - Valid county code
    - Correct control digit
- Supports custom error messages via translations.
- Modular and extensible design using factories and PSR-4 standards.
- Unit tested with PHPUnit.

## Installation
To use this library, include it in your project via Composer:

```bash
composer require phpvalidator/phpvalidator
