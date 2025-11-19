# PHP Practitioner

This project is a simple PHP application that demonstrates the use of Object-Oriented Programming (OOP) principles. It includes a basic user authentication system with features like sign up, sign in, and password reset.

## Object-Oriented Programming (OOP)

This project heavily utilizes OOP concepts to structure the code in a modular and maintainable way. Here are some of the key OOP principles you'll find in this project:

- **Classes and Objects**: The project is divided into classes like `User`, `Database`, `Router`, and `Request`, each representing a specific entity or functionality.
- **Encapsulation**: Each class encapsulates its own data and methods, hiding the internal implementation details from the outside world.
- **Inheritance**: While not explicitly used in this project, the structure allows for easy extension through inheritance.
- **Polymorphism**: The router component demonstrates polymorphism by handling different types of requests and routing them to the appropriate controllers.

## After Forking

After forking this repository, you will need to set up your local environment to run the application.

### 1. Web Server

Make sure you have a web server environment like XAMPP, WAMP, or MAMP that supports PHP and MySQL.

### 2. Database Setup

1.  Create a new MySQL database. The default name used in the configuration is `businessDB`, but you can use any name.
2.  Create a `users` table in your database. You can use the following SQL command:

    ```sql
    CREATE TABLE users (
        id INT AUTO_INCREMENT PRIMARY KEY,
        username VARCHAR(255) NOT NULL UNIQUE,
        password VARCHAR(255) NOT NULL
    );
    ```

### 3. Configuration

1.  Open the `config.php` file in the root directory.
2.  Update the `database` array with your database credentials:
    ```php
    'database' => [
        'host' => 'localhost',
        'dbname' => 'businessDB', // Or your database name
        'username' => 'root',      // Your database username
        'password' => '',         // Your database password
    ]
    ```

Once you have completed these steps, you should be able to run the project on your local server.
