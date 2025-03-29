► ON-SCREEN FOOD MENU FOR RESTAURANTS
#####################################
Brief project description.

Project implements solution for a dinning menu generation, where data are taken from PostgreSQL database via PHP script.
On frontend side data is received by means of pure Javascript.
Webpack environment is used for a frontend foundation.
PUG syntax is used instead of plain HTML.
   
Take a note that Webpack module bundler is tuned for proxy connections in webpack.config.js
to be able to connect frontend JS with backend PHP hosted on localhost Apache service.

Also make sure to check entry points of webpack.config.js.
There are index1, index2, index3 and admin.
So bundler will emit index1.html, index2.html, index3.html to the browser.  

http://localhost:8080/index1.html
http://localhost:8080/index2.html
http://localhost:8080/index3.html
http://localhost:8080/admin.html

Such feature will be useful to display independent information on different screens.
You can add more of them if you have such needs.

► DATABASE ENVIRONMENT [_db folder]
###################################

Host: localhost
Database : menus
Table: dinnermenus

To import "dinnermenus" table to "menus" database execute following:
psql -U postgres -d menus < dinnermenus.sql


SQL QUERY TO INSERT DATA
########################

INSERT INTO dinnermenus (id, code, category, title, description, weight, price)
VALUES
(1, '1032', 'Cold dishes', 'Cold dishes menu 1', 'secondary description', '100', '100'),
(2, '1034', 'Cold dishes', 'Cold dishes menu 2', 'secondary description', '100', '120'),
(3, '1066', 'Side dishes', 'Side dishes 1 extra', 'secondary description', '150', '55'),
(4, '1067', 'Side dishes', 'Side dishes 1 extra', 'secondary description', '150', '65'),
(5, '2015', 'First courses', 'Soup with meat 1', 'secondary description', '100', '90'),
(6, '2006', 'First courses', 'Soup with meat 2', 'secondary description', '250', '80'),
(7, '3046', 'Second courses', 'Delicious fish 1', 'secondary description', '75', '75'),
(8, '3040', 'Second courses', 'Delicious fish 2', 'secondary description', '50', '20'),
(9, '3047', 'Drinks', 'Coca-Cola Light 1', 'secondary description', '75', '80'),
(10, '3041', 'Drinks', 'Coca-Cola Light 2',	'secondary description', '50', '100'),
(11, '3048', 'Bakery', 'Rug roll ban 1', 'secondary description', '75', '110'),
(12, '3049', 'Bakery', 'Rug roll ban 2', 'secondary description', '50', '150'),
(13, '3050', 'Bread', 'Bread 1', 'secondary description', '54', '70'),
(14, '3051', 'Bread', 'Bread 2', 'secondary description', '40', '65');


► PHP ENVIRONMENT [_htdocs]
###########################

info.php -> shows your PHP environment
connection.php -> test your DB connection
extractor.php -> data parser from DB 


► FAQ & TROUBLESHOOTING
#######################


1] Make sure that you have PostgreSQL/PHP/Node in User/System variables:
C:\Program Files\PostgreSQL\14\bin;
C:\xampp\php;

2] Check that PHP is correctly configured:
c:\xampp\php\php.ini

extension=pdo_pgsql
extension=pgsql

3] Double-check that crucial services like PostgreSQL/Apache are up and running:
services.msc


► TECHNOLOGY STACK
##################
Developed on Windows 7 x64 ESU.

FRONTEND SIDE
#############

PUG markup/Js
NodeJs 23.7
Webpack 5.88
VS Code 1.93

BACKEND SIDE
############

XAMPP [for making PHP 8 work on Windows 7]
Apache [embedded version]
PHP 8.2
PostgreSQL 14
PGAdmin 6.21 [hacked]
