DROP DATABASE IF EXISTS my_db;
CREATE DATABASE my_db;

USE my_db;

CREATE TABLE tables (
  id INT PRIMARY KEY AUTO_INCREMENT,
  table_number INT NOT NULL,
  seats INT NOT NULL,
  is_available BIT(1) NOT NULL
);

CREATE TABLE ingredients (
  ingredient_id INT PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  quantity_on_hand FLOAT
);

CREATE TABLE dishes (
  dish_id INT PRIMARY KEY AUTO_INCREMENT,
  name varchar(255) NOT NULL,
  quantity FLOAT
);

CREATE TABLE Dish_Ingredient (
  id INT PRIMARY KEY,
  dish_id INT,
  ingredient_id INT,
  quantity FLOAT,
  FOREIGN KEY (dish_id) REFERENCES dishes(dish_id),
  FOREIGN KEY (ingredient_id) REFERENCES ingredients(ingredient_id)
);

INSERT INTO tables (table_number, seats, is_available) VALUES (1, 5, 1), (2, 5, 1), (3, 5, 1), (4, 5, 1), (5, 5, 1);

INSERT INTO ingredients (name, quantity_on_hand) VALUES ('Ground Beef', 100), ('Tomato Sauce', 100), ('Chicken Breast', 100);

INSERT INTO dishes (name, quantity) VALUES ('Spaghetti Bolognese', 0), ('Chicken Curry', 0);

INSERT INTO Dish_Ingredient (id, dish_id, ingredient_id, quantity) VALUES (1, 1, 1, 1), (2, 1, 2, 16), (3, 2, 3, 2);