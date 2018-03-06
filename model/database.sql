CREATE TABLE reservation(
	reservation_id INT UNSIGNED NOT NULL AUTO_INCREMENT PRIMARY KEY,
	customer_id INT UNSIGNED NOT NULL ,
	number_people tinyint UNSIGNED NULL,
	date DATETIME NULL,
    time varchar(15) NULL,
	FOREIGN KEY (customer_id) REFERENCES customers(customer_id)
);

