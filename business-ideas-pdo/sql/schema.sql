CREATE TABLE photographer (
    photographer_id INT AUTO_INCREMENT PRIMARY KEY,
    photographer_name VARCHAR (50),
    available_schedule DATE,
    client_id INT,
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);


CREATE TABLE client_records (
    client_id INT AUTO_INCREMENT PRIMARY KEY,
    first_name VARCHAR (50),
    last_name VARCHAR (50),
    gender VARCHAR (50),
    birth_date DATE,
    contact_num VARCHAR (50),
    service_application VARCHAR (50),
    date_added TIMESTAMP DEFAULT CURRENT_TIMESTAMP
);
