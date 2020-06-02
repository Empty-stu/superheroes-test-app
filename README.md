<p align="center"><img src="https://res.cloudinary.com/dtfbvvkyp/image/upload/v1566331377/laravel-logolockup-cmyk-red.svg" width="400"></p>

## Please complete this steps to run app

- git clone git@github.com:Empty-stu/superheroes-test-app.git
- cd superheroes-test-app/
- cp .env.example .env
- composer install
- npm install
- php artisan storage:link
- Configure you'r .env file
- php artisan migrate
- php artisan serve

### To tun unit tests execute

- npm run run-unit-test

## Assumptions
Не стал писать Unit тесты для функцианальности репозитоиев.
В случае тестирования select запросов путем подмены модели mock-ами, 
тест всегда будет завершаться удачно. 
В случае с create и update запросами, единственные кейсы, которые могут уронить тест,
это неправильные переданные данные или отсутствие связи с БД. Первый кейс являеться невозможным
на лайве, т.к. данные начинают валидироваться начиная с фронта и строго ограничены по типу данных.
В случае второго кейса, если такое произойдет, то тестом это никак не предугадаешь, по-этому так же
не вижу смысла в тестировании подобного кейса.  
## License

The Laravel framework is open-sourced software licensed under the [MIT license](https://opensource.org/licenses/MIT).
