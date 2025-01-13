
Here's your OOP learning documentation converted into a Markdown format suitable for a README.md file:

markdown
# My Documented Learning in OOP

## Concepts Learned from OOP

### Class Organization
- **Single Class Per File**: It is recommended to have one class per file.

### Class Components
- **Properties**: Variables within a class.
- **Methods**: Functions defined within a class.

### Instances and Objects
- An instance of a class in PHP is an object created from that class. It includes properties and methods.

### Access Modifiers
- **Public**: Accessible from anywhere.
- **Private**: Only accessible within the class.
- **Protected**: Accessible within the class and by classes that inherit from it.

#### Visibility Levels
- Public
- Protected
- Private

### Type Hinting
- Defines data types for properties and methods. Can be nullable:
  ```php
  public ?float $property = null;
  public string $desc = 'Food';
  ```

Constructor Methods
Automatically executed when an object of the class is instantiated.

$this Keyword
Used to access properties and methods within the class.

Method Chaining
Achieved by returning $this at the end of methods:
```php
return $this;
```

Destructor Methods
Runs when an object is no longer referenced or the script ends.

Constructor Property Promotion
Simplifies property declarations by combining them with constructor parameters:
```php
private ?string $desc = null;
```

Null Safe Operator
Syntax: ?->, prevents errors when accessing properties or methods of potentially null objects:
```php
$username = $user?->getUsername();
```

Namespace
Prevents name clashes, acts like a virtual directory for classes:
Use \ for fully qualified class names, e.g., new \DateTime().
Local namespaces limit to the project's file structure.
Prepending namespace to class name avoids use statements:
```php
$transaction = new PaymentGateway\Paddle\Transaction;
```

Aliasing for long or conflicting names:
```php
use PaymentGateway\Stripe\Transaction as StripeTransaction;
Importing all classes from a namespace:
```

```php
use PaymentGateway\Paddle;
```

Autoloading
Automatically loads classes, interfaces, and traits not defined in the current file.

Autoloading with Composer
Ensure Composer is installed:
Install packages with composer require.
composer.json for project configuration.
composer.lock for dependency management.

Class Constants
Defined with const, accessed via class name:
```php
Transaction::CONSTANT_NAME;
```

Static Properties and Methods
Accessed directly from class:
```php
Transaction::staticMethod();
```

Use self within class methods to refer to the class itself.

Encapsulation and Abstraction
Hides internal state, provides controlled access via methods:
Reflection API can bypass encapsulation for debugging or testing.

Inheritance
Subclasses inherit public and protected members:
Use parent::__construct() to call parent constructors when overridden.
final prevents class extension or method overriding.

Abstract Classes
Cannot be instantiated, must be extended:
Can have abstract methods needing implementation in child classes.

Interfaces
Define method signatures, all methods public:
No properties, but constants allowed. Supports multiple inheritance through interfaces.

Magic Methods
__get(), __set(), __call(), __callStatic() for dynamic property and method handling.

Overriding vs. Overloading
Overriding: Redefining parent methods in child classes.
Overloading: Multiple definitions of a function with different parameters (not supported in PHP).

Traits
Used for code reuse across classes, cannot be instantiated:
Methods in the class override trait methods if names conflict.

Anonymous Classes
Classes without a named definition, can extend, implement, or use traits.

Object Comparison
== for loose, === for strict object comparison.

Cloning Objects
Cloning creates a new object in memory, unlike assignment which references the same memory.

Serialization
Convert objects to strings for storage/transmission:
Use serialize(), unserialize(), and magic methods for custom handling.

Exception Handling
Use try and catch blocks, extend Exception for custom exceptions.

Routing
Server configuration for URL routing, often via .htaccess or server config files.

SuperGlobals
$_GET, $_POST, $_REQUEST for handling form data.

Sessions and Cookies
Sessions on server, cookies on client for maintaining state across requests.

PDO vs MySQLi
PDO for database abstraction, better for multi-database support.

SQL Injection Prevention
Use placeholders or named parameters in SQL queries.


## PHP Dependency and Mocking Example
### Mocking in PHP
Mocking is a technique used in testing where you replace real objects with mock objects. These mocks simulate the behavior of real objects but under controlled conditions, allowing you to test parts of your system in isolation.

## Dependency in PHP
Dependency in software development refers to the relationship between components where one component (the dependent) uses another (the dependency) to function. In PHP, this usually manifests through:

- **Class dependencies**: When a class uses an instance of another class or an interface within its methods.
- **Function dependencies**: When a function relies on another function or external service to execute its logic.

## Overview
This repository demonstrates the concepts of Dependency Injection and Mocking in PHP, specifically focusing on how to decouple code and use mocks for unit testing.
## Dependency Example
- logger.php
```php
// Interface for logging
interface LoggerInterface {
    public function log($message);
}

// Concrete implementation of Logger
class Logger implements LoggerInterface {
    public function log($message) {
        // Actual logging logic
    }
}
```

- UserService.php
```php
// Service class that depends on a logger
class UserService {
    private $logger;
    
    // Constructor injection of dependency
    public function __construct(LoggerInterface $logger) {
        $this->logger = $logger;
    }
    
    public function createUser($userData) {
        $this->logger->log("Creating user: " . $userData['name']);
        // User creation logic here
    }
}
```

## Mocking Example
- UserServiceTest.php
```php
// Unit test for UserService using mocking
use PHPUnit\Framework\TestCase;

class UserServiceTest extends TestCase {
    public function testCreateUser() {
        // Create a mock object for LoggerInterface
        $mockLogger = $this->createMock(LoggerInterface::class);
        
        // Define behavior: expect the log method to be called once with a specific message
        $mockLogger->expects($this->once())
                   ->method('log')
                   ->with($this->stringContains('Creating user:'));
        
        // Instantiate UserService with the mock logger
        $service = new UserService($mockLogger);
        
        // Test the method, which should interact with our mock object
        $service->createUser(['name' => 'John Doe']);
    }
}
```

## Explanation
- **Dependency Injection**: The UserService class depends on a LoggerInterface, which allows for flexibility in providing different implementations (like Logger or any other class implementing LoggerInterface) without changing UserService.
- **Mocking**: In testing, instead of using real Logger, we create a mock object that simulates the behavior of a logger. This allows us to:
Test UserService in isolation.
Verify that log was called with the correct message without actually logging anything.

## Results
- **Dependency Injection**: Ensures that UserService can work with any implementation of LoggerInterface, promoting loose coupling and testability.
- **Mocking**: 
The test testCreateUser in UserServiceTest ensures that:
log method is called once with a message containing "Creating user:".
The test passes without actual logging, allowing for faster, more focused unit tests.

## How to Use
**To run the tests:**
Ensure you have PHPUnit installed.
Run phpunit UserServiceTest.php from the command line in the project directory.

```plaintext
Check GROK AI chat for more info.
```
