# CRUD_WEBSITE_USING_PHP



# 📝 PHP CRUD Notes App

A simple and elegant web application for managing notes with full **CRUD (Create, Read, Update, Delete)** functionality. Built using **PHP**, **MySQL**, **Bootstrap 5**, **DataTables**, and **jQuery**, this project allows users to create and manage personal notes in an intuitive interface.

## 🌟 Features

- ✅ Add new notes with a title and description
- ✏️ Edit existing notes using a Bootstrap modal
- ❌ Delete notes with confirmation
- 📄 Responsive, searchable, and paginated notes table powered by DataTables
- 🎨 Clean UI with animations and interactive effects
- 📦 Full-stack integration using PHP & MySQL

## 📷 Screenshots

![image](https://github.com/user-attachments/assets/3e9c2ce0-04a0-453d-b728-41604a861f6d)

![image](https://github.com/user-attachments/assets/49114b3f-28c8-439e-a094-d128212c4ee6)

![image](https://github.com/user-attachments/assets/940d172b-0807-451b-a4c2-7feb7d587068)

![image](https://github.com/user-attachments/assets/290373cb-e728-4cf7-9b05-cd2fc7ac4741)

![image](https://github.com/user-attachments/assets/403266d0-c348-4fdb-8935-a0e987d88959)






https://github.com/user-attachments/assets/00be8eb7-dc6b-411b-9f3a-115602dd31e1





## 🚀 Technologies Used

- **Frontend:**
  - HTML5, CSS3, Bootstrap 5
  - JavaScript, jQuery
  - DataTables for advanced table functionalities

- **Backend:**
  - PHP (vanilla)
  - MySQL (local database)

## 🔧 Setup Instructions

1. **Clone the repository**
   ```bash
   git clone https://github.com/your-username/php-crud-notes-app.git
   cd php-crud-notes-app
   ```

2. **Set up the MySQL Database**
   - Import the following SQL into your local database:
     ```sql
     CREATE DATABASE IF NOT EXISTS Notes;
     USE Notes;

     CREATE TABLE `note` (
       `sno` INT NOT NULL AUTO_INCREMENT,
       `title` VARCHAR(255) NOT NULL,
       `des` TEXT NOT NULL,
       `datetime` TIMESTAMP DEFAULT CURRENT_TIMESTAMP,
       PRIMARY KEY (`sno`)
     );
     ```

3. **Update database credentials in `index.php`**
   ```php
   $servername = "localhost";
   $username = "root";
   $password = "";
   $dbname = "Notes";
   ```

4. **Run the App**
   - Start your local server (e.g., using XAMPP/LAMP/WAMP)
   - Place the project folder in `htdocs` (XAMPP) or your server’s root
   - Visit `http://localhost/php-crud-notes-app/`

## 📁 Project Structure

```
php-crud-notes-app/
│
├── index.php         # Main CRUD interface
├── style.css         # Custom styles (if any)
├── image.png         # Logo displayed in the navbar
├── README.md         # Project documentation
```

## 🧠 Learning Outcomes

Through this project, you’ll understand:
- PHP-MySQL database interactions (CRUD)
- Using modals and AJAX-like interactions
- Enhancing tables with DataTables
- Building dynamic and responsive web interfaces



