
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

Constructor Methods
Automatically executed when an object of the class is instantiated.

$this Keyword
Used to access properties and methods within the class.

Method Chaining
Achieved by returning $this at the end of methods:
php
return $this;

Destructor Methods
Runs when an object is no longer referenced or the script ends.

Constructor Property Promotion
Simplifies property declarations by combining them with constructor parameters:
php
private ?string $desc = null;

Null Safe Operator
Syntax: ?->, prevents errors when accessing properties or methods of potentially null objects:
php
$username = $user?->getUsername();

Namespace
Prevents name clashes, acts like a virtual directory for classes:
Use \ for fully qualified class names, e.g., new \DateTime().
Local namespaces limit to the project's file structure.
Prepending namespace to class name avoids use statements:
php
$transaction = new PaymentGateway\Paddle\Transaction;
Aliasing for long or conflicting names:
php
use PaymentGateway\Stripe\Transaction as StripeTransaction;
Importing all classes from a namespace:
php
use PaymentGateway\Paddle;

Autoloading
Automatically loads classes, interfaces, and traits not defined in the current file.

Autoloading with Composer
Ensure Composer is installed:
Install packages with composer require.
composer.json for project configuration.
composer.lock for dependency management.

Class Constants
Defined with const, accessed via class name:
php
Transaction::CONSTANT_NAME;

Static Properties and Methods
Accessed directly from class:
php
Transaction::staticMethod();
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
