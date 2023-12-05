CREATE TABLE products (
	prod_id INT PRIMARY KEY AUTO_INCREMENT,
    prod_name varchar(100) NOT NULL,
    thumb_url varchar(255),
    brand varchar(100) NOT NULL,
    gender TINYINT DEFAULT 0,
    shoe_type varchar(100) NOT NULL,
    price decimal(7, 2) NOT NULL,
    prim_color varchar(100) NOT NULL,
    sec_color varchar(100) NOT NULL,
    available bool DEFAULT 1,
    avail_date datetime default CURRENT_TIMESTAMP,
    
    CHECK (gender >= 0 and gender <= 2)
    
);