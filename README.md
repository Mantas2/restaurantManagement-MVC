# restaurantManagement-MVC
wip

To install composer dependencies, run
<docker exec -it php_menu-app-mvc bash> and run the <composer install> command. This will create the vendor dir.

You should also create a .env file following the .env.example

Also, to create a database, you must execute the db container, and run following commands
<mysql -u root -p ...>
<CREATE DATABASE my_db;>
<CREATE TABLE tables (
    id INT PRIMARY KEY AUTO_INCREMENT,
    table_number INT NOT NULL,
    seats INT NOT NULL,
    BIT(1) NOT NULL
  );>