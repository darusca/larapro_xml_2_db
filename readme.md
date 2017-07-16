### 1. Project Details

#### 1.1 Design Patterns:

*MVC,
Repository*

- It is designed with the Repository Pattern, which allows a Controller to pass data to the Repository which in turn interfaces with the Model.

- This is achieved by *injecting* a repository Dependency in the Controller, so that the repository implements its interface with the model, starting in the Controller.

- OOP (Interfaces, Namespaces, Encapsulation, Information Hiding, properties and methods Accessibility, Static, Dynamic, etc.).

*All this ensures the code is:*
- Testable (injection are mocked)
- Maintainable (OOP not procedural)
- Reduced code (reusable), and
- Less bugs (info hiding, accessibility, encapsulation, etc)

Note: The specifics for this **Development Environment** follows:

Virtual Box, Vagrant, Centos 7, PHP 5.6, MySQL 14.14, PHPMyAdmin, git, composer, artisan, pear, PHPStorm 2017 with XDebug, Code Sniffer (phpcs), GitHub);

#### 1.2 Web Server requirements:
* PHP >= 5.6.4
* OpenSSL PHP Extension
* PDO PHP Extension
* Mbstring PHP Extension
* Tokenizer PHP Extension
* XML PHP Extension

### 2. Front-End Technical Details

##### Input: the config.XML
The blade template receives the the associative array() containing the config.XML data

##### Process:
* The *Blade engine iterates*, *displays and attributes (custom 'data-*' attributes)* this *associative array* data.
* *JQuery stores* these *'data-*'* into variables.
* A *JavaScript* Object (class) *initializes* JQuery, *binds/fires* the button click event, and *processes* server response.
* *JQuery* asynchronously *posts* the data to *'/create'* route
##### Output:
* Client is *notified* when *sending/saving* ('button is disabled'), and on saved ('on success button is enabled').
* Display server response.


### 3. Back-End Technical Details
##### Input:
* The server accepts two (get/post) requests in the routes, namely 'receive' and 'create'
* Request handling logic are mapped to 2 Controller class methods respectively
##### Process:
* An Utility class parses the config.XML file, using the native 'simplexml_load_file()' PHP function
* *'simplexml_load_file(config.XML)'* returns an associative array() containing the config.XML data (ex: 'title', 'description' ...)
* These data is persisted in the database during the click event process from the front-end

**Note:** This project uses the SimpleXML - PHP5’s new API for accessing the contents of XML documents.

##### Output:
* The Controller returns the package view with this associative array()
* When the data is to be persisted to the db, the Controller responds to the asynchronous call appropriately

### 4. Framework
#### Laravel 5.4 (PHP v5.6)
**Q:** Why Laravel?

**A:** Choices! Everybody is using it and it works well. I just like the brand, though some online resources ought to be free, as is most community support

### 5. Usage
#### 5.1 Basic Setup:
1. Install Laravel 5.4
2. Run the following command inside this app's root directory

        composer install

3. Create/acess the destination server database
Note: Change this app's '.env' file so it matches the destination's server environment:

    DB_CONNECTION='destination DBMS'    
    DB_HOST='destination IP address'    
    DB_PORT='destination DBMS connection port'    
    DB_DATABASE='destination DBMS db name'    
    DB_USERNAME='destination DBMS user name'    
    DB_PASSWORD='destination DBMS user password'

4. Migrate the tables by running:

       php artisan migrate:refresh --seed

Note: The command above installs Laravel's default migrations with timestamps fields

### 6. Assumptions
Given the spec, the assumptions follow:
###### Routes:
'receive' and 'create'

###### The config.XML File:
Because it is a configuration file, I assumed that the structure will not change often ('from time to time').
So the code is strongly coupled around the given config file, and will choke with a different XML file structure.

### 6. Plugins and 3rd Party Libraries:
All functionality required to fulfill most of this project's requirements was implemented with the Laravel ecosystem and PHP native functions.

### 7. Coding Standards:
PSR-1/2/3/4

### 8. Scaling Considerations
* This app design is Decoupled with separate concerns for Presentation and Business logic, allowing for scalability of this package
* Decoupling also increases the lifetime since it is not tied to any technology or concrete implementations
* This Package folder structure enables future growth, such as Models, Assets and other sub-folder structures

### 9. Performance Considerations
* Data is posted asynchronously so the UI (User Interface) is not blocked or stalled, improving performance
* Laravel's cache design is optimal as well as the management of pool resources such as database connections and termination
* No Form here means no need to store flashed old input Session Data in the event of errors
* For PHPUnit testing performance this app does not access the model directly. So it is possible to bypass database, otherwise, would be expensive to make database calls
