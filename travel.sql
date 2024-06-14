CREATE TABLE packages (
  package_id INT AUTO_INCREMENT PRIMARY KEY,
  package_name VARCHAR(255) NOT NULL,
  description TEXT NOT NULL,
  price DECIMAL(10, 2) NOT NULL,
  duration VARCHAR(50) NOT NULL,
  image_path VARCHAR(255)
);
CREATE TABLE bookings (
  booking_id INT AUTO_INCREMENT PRIMARY KEY,
  customer_name VARCHAR(255) NOT NULL,
  contact_details VARCHAR(255) NOT NULL,
  selected_package VARCHAR(255) NOT NULL,
  booking_status VARCHAR(50) NOT NULL
);
CREATE TABLE users (
  user_id INT AUTO_INCREMENT PRIMARY KEY,
  username VARCHAR(255) NOT NULL
);
create table admintable(username varchar(50), password varchar(50));
CREATE TABLE user (
  id int(30) NOT NULL,
  name varchar(30) NOT NULL,
  email varchar(30) NOT NULL,
  password varchar(255) NOT NULL,
);
insert into admintable(username, password)
values ('admin', 'travel@123');