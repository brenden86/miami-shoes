LOAD DATA LOCAL INFILE 'C:/Users/brend/Desktop/Projects/miami-shoes/database/data/prod-data.csv'
INTO TABLE products
FIELDS TERMINATED BY ','
ENCLOSED BY '"'
LINES TERMINATED BY '\r\n'
IGNORE 1 ROWS;

SET GLOBAL local_infile=ON;

SELECT * FROM products ORDER BY prod_id DESC;