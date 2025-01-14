CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(255) NOT NULL,
    email VARCHAR(255) NOT NULL,
    password VARCHAR(255) NOT NULL,
    address VARCHAR(255) NOT NULL,
    gender ENUM('Male', 'Female', 'Other') NOT NULL
);

CREATE TABLE students (
    STUDENT_ID INT AUTO_INCREMENT PRIMARY KEY,
    FIRST_NAME VARCHAR(50),
    EMAIL VARCHAR(50),
    AGE INT,
    ADDRESS VARCHAR(100)
);
-- lệnh reset lại ID tự cấp thành 1 --
ALTER TABLE users AUTO_INCREMENT = 1;
ALTER TABLE students AUTO_INCREMENT = 1;

--Fix lỗi ID tự cấp của students --
ALTER TABLE `students` CHANGE `STUDENT_ID` `STUDENT_ID` INT(11) NOT NULL AUTO_INCREMENT;