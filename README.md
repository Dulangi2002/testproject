<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

# Laravel Project with Livewire Jetstream and Alpine.js

## Features
- **User Registration**: Implemented **Jetstream** for an optimal authentication flow. Jetstream gives more flexibility in managing user attributes, passwords, and other authentication methods 
- **Dynamic Interactions**: Utilized **Alpine.js** to provide reactive user interfaces.
- **Optimized Blade Templates**: Integrated **Livewire** components within Laravel blade files to avoid redundancy.
- **Database Integration**: My MySQL database name is `Konekt` (visible in the .env file), managed via **XAMPP**.

## Notes
- I made the following decisions to hopefully optimize the project a bit more. 
### **GET `/posts/{id}/edit`**
- Purpose: Displays a form to edit a post.
- special note: 
  - I did not make a separate blade file for this route.
  - The form is managed via a **Livewire** blade file included in a main Laravel blade template.
  - 
### **GET `/posts/create`**
- Purpose: Displays a form to create a new post.
- special note: 
  - I did not make a separate blade file for this route.
  - The form is managed via a **Livewire** blade file included in a main Laravel blade template.

## Dependencies Instructions
- run 'composer install' to install the dependencies
- run 'npm run build' to build the frontend


