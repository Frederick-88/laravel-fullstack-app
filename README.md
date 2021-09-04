### Laravel Fullstack App ( Laravel Blade, Laravel & MYSQL )

#### A Color-Palette Website which Created by Chen Frederick for Development & Training Purpose

---

### Features :

1. CRUD Backend with Integration in Frontend by MYSQL & Blade
2. Restore & Archive Functionality ( Soft Delete )
3. Plugin Integration + Tailwind.css + Fontawesome + SCSS
4. Likes Functionality that Integrated with Owner's Email
5. Components & Layout in laravel blade

---

### References :

-   https://www.digitalocean.com/community/tutorials/how-to-create-a-new-user-and-grant-permissions-in-mysql-id
-   https://laracasts.com/discuss/channels/laravel/easy-way-to-check-if-laravel-app-has-connection-with-existing-mysql-db
-   setting up tailwind.css -> https://www.youtube.com/watch?v=MFh0Fd7BsjE&list=PL7Ip-iVFndN6WT7bRVyyigadDH1AOZ7V5&index=1&t=220s
-   scss configuration in webpack.mix.js -> https://ralphjsmit.com/tailwind-sass-laravel/
-   installation reference & docs upon styling development -> https://tailwindcss.com
-   format laravel blade codes ( use laravel blade snippets ) -> https://stackoverflow.com/questions/46268211/how-to-format-laravel-blade-codes-in-visual-studio-code
-   color palette data injection resource -> https://colorpalettes.net/color-palette-3983/
-   rainbow navbar -> https://codepen.io/nohoid/pen/kIfto

---

### To Setup :

-   `npm install`
-   `composer install`
-   `npm run dev`

---

### Personal Notes :

-   after installed any plugin, you need to do `npm i` to synchronize between `package.json` & `composer.json`
-   after changed `webpack.mix.js`, since laravel mix is webpack based, you’ll need to compile those files with `npm run dev`.
-   while you're on development please run `php artisan serve` & `npm run watch`. 1 so you can visit localhost, the other 1 so you don't need to run `npm run dev` for every scss file change you made
-   its good to have layout in laravel where you can put your link rel in <head> for just 1 time rather than put in all your component

#### Database Details :

-   Name : 'laravel_fullstack_app'
-   Username : 'laravel_fullstack_admin'
-   Password : 'laravel_fullstack_admin'

---

<p align="center"><a href="https://laravel.com" target="_blank"><img src="https://raw.githubusercontent.com/laravel/art/master/logo-lockup/5%20SVG/2%20CMYK/1%20Full%20Color/laravel-logolockup-cmyk-red.svg" width="400"></a></p>

<p align="center">
<a href="https://travis-ci.org/laravel/framework"><img src="https://travis-ci.org/laravel/framework.svg" alt="Build Status"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/dt/laravel/framework" alt="Total Downloads"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/v/laravel/framework" alt="Latest Stable Version"></a>
<a href="https://packagist.org/packages/laravel/framework"><img src="https://img.shields.io/packagist/l/laravel/framework" alt="License"></a>
</p>

## About Laravel

Laravel is a web application framework with expressive, elegant syntax. We believe development must be an enjoyable and creative experience to be truly fulfilling. Laravel takes the pain out of development by easing common tasks used in many web projects, such as:

-   [Simple, fast routing engine](https://laravel.com/docs/routing).
-   [Powerful dependency injection container](https://laravel.com/docs/container).
-   Multiple back-ends for [session](https://laravel.com/docs/session) and [cache](https://laravel.com/docs/cache) storage.
-   Expressive, intuitive [database ORM](https://laravel.com/docs/eloquent).
-   Database agnostic [schema migrations](https://laravel.com/docs/migrations).
-   [Robust background job processing](https://laravel.com/docs/queues).
-   [Real-time event broadcasting](https://laravel.com/docs/broadcasting).

Laravel is accessible, powerful, and provides tools required for large, robust applications.

## Learning Laravel

Laravel has the most extensive and thorough [documentation](https://laravel.com/docs) and video tutorial library of all modern web application frameworks, making it a breeze to get started with the framework.

If you don't feel like reading, [Laracasts](https://laracasts.com) can help. Laracasts contains over 1500 video tutorials on a range of topics including Laravel, modern PHP, unit testing, and JavaScript. Boost your skills by digging into our comprehensive video library.

## Laravel Sponsors

We would like to extend our thanks to the following sponsors for funding Laravel development. If you are interested in becoming a sponsor, please visit the Laravel [Patreon page](https://patreon.com/taylorotwell).

### Premium Partners

-   **[Vehikl](https://vehikl.com/)**
-   **[Tighten Co.](https://tighten.co)**
-   **[Kirschbaum Development Group](https://kirschbaumdevelopment.com)**
-   **[64 Robots](https://64robots.com)**
-   **[Cubet Techno Labs](https://cubettech.com)**
-   **[Cyber-Duck](https://cyber-duck.co.uk)**
-   **[Many](https://www.many.co.uk)**
-   **[Webdock, Fast VPS Hosting](https://www.webdock.io/en)**
-   **[DevSquad](https://devsquad.com)**
-   **[Curotec](https://www.curotec.com/services/technologies/laravel/)**
-   **[OP.GG](https://op.gg)**
-   **[CMS Max](https://www.cmsmax.com/)**
-   **[WebReinvent](https://webreinvent.com/?utm_source=laravel&utm_medium=github&utm_campaign=patreon-sponsors)**

## Contributing

Thank you for considering contributing to the Laravel framework! The contribution guide can be found in the [Laravel documentation](https://laravel.com/docs/contributions).

## Code of Conduct

In order to ensure that the Laravel community is welcoming to all, please review and abide by the [Code of Conduct](https://laravel.com/docs/contributions#code-of-conduct).

## Security Vulnerabilities

If you discover a security vulnerability within Laravel, please send an e-mail to Taylor Otwell via [taylor@laravel.com](mailto:taylor@laravel.com). All security vulnerabilities will be promptly addressed.

## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
