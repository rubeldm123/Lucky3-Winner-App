# Lucky 3 Winner App

## Description
The **Lucky 3 Winner App** is a web-based application designed to randomly select three winners from a pool of registered users. It provides a user-friendly interface for both users and administrators, allowing easy registration, winner generation, and management of users and winners.

### Features:
- **User Registration**: Users can register by providing their full name and the last four digits of their phone number.
- **Admin Dashboard**: Administrators can generate three random winners and view a list of registered users and winners.
- **Winner Management**: Admins have the capability to delete winners and users as needed.
- **Secure Logout**: Admins can log out, ensuring the security of the admin interface.

## Installation Instructions

### Prerequisites
- A web server (Apache or Nginx)
- PHP version 7.4 or higher
- MySQL or MariaDB
- Composer (optional for managing dependencies)

### Step 1: Clone or Download the Repository
You can clone the repository using Git or download it as a ZIP file.

====================
Step 2: Connect to Your EC2 Instance
Open Terminal on your local machine.
Connect using SSH:
bash
Copy code
ssh -i /path/to/your/key.pem ubuntu@your-instance-public-ip
Step 3: Install Necessary Software
Update the package manager:

bash
Copy code
sudo apt update && sudo apt upgrade -y
Install Apache:

bash
Copy code
sudo apt install apache2 -y
Install PHP and MySQL:

bash
Copy code
sudo apt install php libapache2-mod-php php-mysql -y
Start Apache service:

bash
Copy code
sudo systemctl start apache2
Step 4: Set Up the Database
Log into MySQL:

bash
Copy code
sudo mysql -u root -p
Create the database:

sql
Copy code
CREATE DATABASE gift_voucher;
Create the necessary tables:

sql
Copy code
CREATE TABLE users (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    phone_last4 VARCHAR(4) NOT NULL
);

CREATE TABLE winners (
    id INT AUTO_INCREMENT PRIMARY KEY,
    full_name VARCHAR(100) NOT NULL,
    phone_last4 VARCHAR(4) NOT NULL
);

CREATE TABLE admin (
    id INT AUTO_INCREMENT PRIMARY KEY,
    username VARCHAR(50) NOT NULL,
    password VARCHAR(255) NOT NULL
);
Exit MySQL:

sql
Copy code
EXIT;
