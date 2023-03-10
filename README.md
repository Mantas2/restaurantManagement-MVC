# restaurantManagement-MVC
wip

To install composer dependencies, run
<docker exec -it php_menu-app-mvc bash> and run the composer install command. This will create the vendor dir.

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

CREATE TABLE ingredients (ingredient_id INT PRIMARY KEY AUTO_INCREMENT, name varchar(255) NOT NULL, price FLOAT);
CREATE TABLE dishes (dish_id INT PRIMARY KEY AUTO_INCREMENT, name varchar(255) NOT NULL, price FLOAT);

  CREATE TABLE Dish_Ingredient (
    id INT PRIMARY KEY,
    dish_id INT,
    ingredient_id INT,
    quantity FLOAT,
    FOREIGN KEY (dish_id) REFERENCES dishes(dish_id),
    FOREIGN KEY (ingredient_id) REFERENCES ingredients(ingredient_id)
);