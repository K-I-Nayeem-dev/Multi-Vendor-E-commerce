<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400" alt="Laravel Logo"></a></p>

<p align="center">
<a href="https://github.com/laravel/framework/actions"><img src="https://github.com/laravel/framework/workflows/tests/badge.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## Laravel Simple Multi-Vendor E-Commerce Project with Livewire

Welcome to the Laravel Simple Multi-Vendor E-Commerce Project with Livewire! This project aims to provide a basic yet functional multi-vendor e-commerce platform built on Laravel with Livewire components.

## Features

Multi-vendor support: Allow multiple vendors to register and sell products.
<br>
Product management: Vendors can add, edit, and delete their products using Livewire components for a dynamic user experience.
<br>
Order management: Users can place orders, and vendors can manage orders for their products.
<br>
User authentication: Users, vendors, and administrators can register, login, and manage their accounts.
<br>
Basic shopping cart functionality: Users can add products to their cart and proceed to checkout.

## Installation

Clone the repository: git clone https://github.com/your-repository.git
<br>
Navigate to the project directory: cd your-project-directory
<br>
Install composer dependencies: composer install
<br>
Copy the .env.example file to .env: cp .env.example .env
<br>
Generate an application key: php artisan key:generate
<br>
Set up your database in the .env file.
<br>
Migrate and seed the database: php artisan migrate --seed
<br>
Link storage: php artisan storage:link
<br>
Run the server: php artisan serve

## Usage

Access the application in your browser by visiting http://localhost:8000.
<br>
As an administrator, you can manage users and view all orders.
<br>
As a vendor, you can register and manage your products and orders using Livewire components for real-time updates.
<br>
As a user, you can register, browse products, add them to your cart, and place orders.

## Contributing
Contributions are welcome! If you'd like to contribute to this project, please follow these steps:

## Fork the repository.

Create a new branch: git checkout -b feature/my-feature.
<br>
Make your changes and commit them: git commit -am 'Add new feature'.
<br>
Push to the branch: git push origin feature/my-feature.
<br>
Submit a pull request.

## License
This project is licensed under the MIT License - see the LICENSE file for details.

## Acknowledgements

This project was built using Laravel and Livewire. Special thanks to the Laravel and Livewire communities for their contributions and support.

Feel free to customize and extend this project to meet your specific requirements! If you have any questions or issues, please don't hesitate to reach out. Happy coding! 🚀
