# IPMEDT4-Backend


## Installatie

** SQL Aanmaken: **
```
CREATE USER '<username>'@'localhost' IDENTIFIED WITH mysql_native_password BY '<password>';
CREATE DATABSE '<database_name>';
GRANT ALL ON <database_name>.* to '<username>'@'localhost';
exit;
```

** Project Clonen: **
```
git clone <link naar github>
cd <project-naam>
composer install
npm install
cp .env.example .env
php artisan key:generate
```


- Bewerk in de .env file de DB_DATABSE, DB_USERNAME en DB_PASSWORD naar de valide gegevens
