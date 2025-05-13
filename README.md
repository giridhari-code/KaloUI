# KaloUI

**KaloUI** is a lightweight and modular PHP UI component system that enables dynamic loading and rendering of components like alerts, buttons, forms, and more — using pure PHP.

## 🚀 Features

- ⚡ Dynamic component loading: `KaloUI::load('Alert', [...])`
- 🧩 Clean and reusable PHP component structure
- 🧠 No external frameworks required
- 💡 Easy to extend with your own custom components
- 🌐 Optional support for client-side dynamic loading (JavaScript)

## 📦 Example Usage

```php
require_once 'kaloui/KaloUI.php';

KaloUI::load('Alert', [
    'type' => 'success',
    'message' => 'Welcome to KaloUI!'
]);
