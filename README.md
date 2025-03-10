
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
Mocking is a technique used in testing where you replace real objects with mock objects.
 These mocks simulate the behavior of real objects but under controlled conditions,
  allowing you to test parts of your system in isolation.

## Dependency in PHP
Dependency in software development refers to the relationship between components where one component
 (the dependent) uses another (the dependency) to function. In PHP, this usually manifests through:

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
- **Dependency Injection**: The UserService class depends on a LoggerInterface,
 which allows for flexibility in providing different implementations (like Logger or any other class implementing LoggerInterface) without changing UserService.
- **Mocking**: In testing, instead of using real Logger, i create a mock object that simulates the behavior of a logger. This allows us to:
Test UserService in isolation.
Verify that log was called with the correct message without actually logging anything.

## Results
- **Dependency Injection**: Ensures that UserService can work with any implementation of LoggerInterface,
 promoting loose coupling and testability.
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

## **Dependency Injection (DI) in PHP and Reflection API**
```plaintext
Overview
Dependency Injection (DI) is a design pattern where an object's dependencies
 (i.e., collaborators or services) are injected from the outside rather
  than being created inside the object. This leads to cleaner, modular, and testable code.

In this README, i'll explain how DI works using a realistic example where a
 Component object has name and value properties,
  and i'll explore both manual DI and Reflection API-based DI to inject dependencies.
```

```php
// Logger Interface
interface Logger {
    public function log($message);
}

// DatabaseConnection Class
class DatabaseConnection {
    public function save(Component $component) {
        // In a real case, save data to the database
        echo "Saving component data (name: {$component->name}, value: {$component->value}) to the database...";
    }
}

// Component Class
class Component {
    public $name;
    public $value;
    private $logger;
    private $databaseConnection;

    // Constructor injection: Inject DatabaseConnection
    public function __construct(DatabaseConnection $databaseConnection) {
        $this->databaseConnection = $databaseConnection;
    }

    // Setter for Logger
    public function setLogger(Logger $logger) {
        $this->logger = $logger;
    }

    // Core method: Log and save the component
    public function core() {
        $this->logSave();
        return $this->databaseConnection->save($this);
    }

    // Log the saving action
    public function logSave() {
        if ($this->logger) {
            $this->logger->log("Saving {$this->name} with value {$this->value}");
        }
    }
}

// Example Logger implementation
class ConsoleLogger implements Logger {
    public function log($message) {
        echo "Log: {$message}\n";
    }
}

```

```plaintext
Explanation of the Code:
Logger Interface: The Logger interface defines the log() method that is used for logging messages.
DatabaseConnection Class: This class represents the connection to the database and has a save()
method that takes a Component object and saves it to the database.

Component Class:
The Component class has name and value properties.
Constructor Injection: The DatabaseConnection is injected through the constructor.
Setter Injection: The Logger is injected using the setLogger() method.
The core() method logs the "saving" action and then calls save() on the DatabaseConnection to save the component.
```

```plaintext
Using Dependency Injection
Manual Injection
In manual Dependency Injection, you explicitly pass dependencies (like DatabaseConnection and Logger)
to the Component class either through the constructor or setter methods.

Here’s how to use DI manually with the example:
```

```php
// Instantiate dependencies
$databaseConnection = new DatabaseConnection();
$logger = new ConsoleLogger(); // Implements the Logger interface

// Create the Component object and inject dependencies
$component = new Component($databaseConnection); 
$component->name = "Sample Component";
$component->value = 100;
$component->setLogger($logger);

// Call the core method
$component->core();
```

```plaintext
Explanation:
Constructor Injection: The Component is created with a DatabaseConnection object passed through the constructor.
Setter Injection: The Logger is set using the setLogger() method.
Calling core(): The core() method logs the saving process and then saves the component's data.
```

```output
Log: Saving Sample Component with value 100
Saving component data (name: Sample Component, value: 100) to the database...
```


## **Reflection API Injection**
In Reflection API Injection, i use PHP's Reflection API to inspect the Component
class at runtime and automatically inject the required dependencies.
The Reflection API allows us to dynamically instantiate and inject dependencies into the class without manually calling the constructor or setter methods.

Here’s how to use DI with the Reflection API:

```php
class DIContainer {
    public function inject($object) {
        $reflectionClass = new ReflectionClass($object);
        $constructor = $reflectionClass->getConstructor();

        // Check if the class has a constructor
        if ($constructor) {
            $parameters = $constructor->getParameters();

            // Iterate over each constructor parameter
            foreach ($parameters as $parameter) {
                // Get the type hint of the parameter
                $type = $parameter->getType();

                // If the parameter has a class type, instantiate it using Reflection
                if ($type && class_exists($type->getName())) {
                    $dependency = new $type->getName();
                    $object->{$parameter->getName()} = $dependency; // Inject the dependency
                }
            }
        }
    }
}

// Example usage of Reflection for Dependency Injection:
$component = new Component(null); // Initializing with null for DatabaseConnection
$diContainer = new DIContainer();
$diContainer->inject($component); // Automatically injects DatabaseConnection using Reflection

// Manually setting other properties and logger
$component->name = "Sample Component";
$component->value = 100;
$component->setLogger(new ConsoleLogger());

// Call the core method
$component->core();

```

```plaintext
Explanation:
ReflectionClass: The DIContainer class uses PHP's Reflection API to inspect the Component class.
It checks for the constructor and its parameters.
If a class dependency is found (like DatabaseConnection),
 Reflection creates an instance of that class and injects it into the Component object.
Manual Property Setting: After injection, i manually set the name and value properties and inject a ConsoleLogger.
```

```output
Log: Saving Sample Component with value 100
Saving component data (name: Sample Component, value: 100) to the database...
```

```plaintext
How the Reflection API Works:
ReflectionClass inspects the Component class to get its constructor and the parameters it requires.
For each dependency, Reflection dynamically creates the necessary
 objects (like DatabaseConnection) and injects them into the class instance.
The rest of the dependencies (like Logger) can be injected manually or via Reflection as well.
Advantages of Dependency Injection
Loose Coupling: Dependencies are injected into the class, reducing the tight coupling between components.
Improved Testability: By injecting mock or fake dependencies, unit tests become easier to write.
Flexibility: Dependencies can be easily swapped without changing the class code, providing flexibility.
Cleaner Code: The class does not handle the creation of dependencies, leading to cleaner and more maintainable code.
Automatic Injection: With the Reflection API, dependencies can be injected dynamically, simplifying the setup process for complex classes.
Conclusion
In this README, i explored Dependency Injection (DI) using two methods:

Manual Injection: Where you explicitly pass dependencies to the class constructor or setter methods.
Reflection API Injection: Where PHP’s Reflection API dynamically inspects the class and injects dependencies at runtime.
Both approaches provide the core benefits of DI:

Loose Coupling: Making components easier to test, extend, and modify.
Flexibility and Testability: Easily replace dependencies and mock them for unit testing.
While manual injection provides clarity and control,
Reflection API-based DI offers more automation and dynamic flexibility,
ideal for use in DI containers or frameworks that manage dependencies.

By applying Dependency Injection, your code becomes more modular, easier to test, and more maintainable as it scales.
```

## GENERATORS
Generators are useful when you need to generate a large collection to later iterate over.
They're a simpler alternative to creating a class that implements an Iterator,
which is often overkill.