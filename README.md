# learningoop

##This is a Documentation of concept i learnt from oop:

=>it ias recommended you should have single class per file.

Class can have:
=>variable called properties
=>function called methods

==Access modifier==
works on properties and methods
=>private or protected properties and methods indicate that the properties are to be implemented within the class.
Public: can be interacted with or used outside the class. The value can be modified.
private: can not be intercated with outside the class.
protected:

Type Hinting: 
This means defining various data types on your properties and methods.
data type can also be nullabe, that is, if the specified data type is not met, it will switch to null data type.
e.g public ?float = null; passing the value when the code is strictly typed is important or an error would thrown, this is applicable to other data types. e.g public string $desc = 'Food';

Constructor Methods:
This run when an instance or when a new object is created.

$this keyword:
to access a property or methods inside a class we use it.
similar to when you create an object outside the class, you have to access it using the object name, connected to the properties or methods.

method chaining:
useful to chan methods together. 
use 'return $this' in the methods

Destructor Methods:
it runs when an instance or when a new object is created.
it runs when the script ends.
it is also called when there is no more reference to the objects. so some times it could display first and other things runs after it.

Constructor property:
Create a cleaner way to declare properties, which is passed as argument to the constructor.
if want to state the default value to null, make sure you add a nullable datatype to the other datatype
e.g private ?string $desc = null; 

null safe operator:
The syntax of the null safe operator is ?-> . It is placed between the object or
variable and the property or method being accessed. Here's an example that
demonstrates its usage:
$username = $user?->getUsername();
In the above code snippet, if $user is null, the null safe operator will return null
without throwing an error. If $user is not null, the getUsername() method will be
called as expected.

namespace:
=>it helps prevent "name coalition" for classes(Abstract, Trait), functions, Const etc,  that is without it, it can cause conflict making it difficult to know which file, script, classes etc to run.
=>it is a virtual directory structure for your classes. 
=> to access builtin classes use a backward slash behind the name indicating a full qualified name. e.g new \DateTime()
=>the qualified name is limited to the local namespace or file created in our project.
=> You can prepend the namespace behind your class name, so that means you will not need to use the "use keyword" to import the class
e.g $transaction = new PaymentGateway\Paddle\Transaction;
=>aliasing is useful in renaming long class names when namespacing.
e.g use PaymentGateway\Stripe\Transaction as StripeTransaction;
=>aliasing is also useful in resoving conflicts in name after importing classes which have similar names, function etc...
e.g use  namespace<"PaymentGateway\Paddle\Transaction">;
e.g use PaymentGateway\Stripe\Transaction as StripeTransaction;
They both have similar class names but, i can distinguish by using alias
=> all class, function etc using a particular namespace can also be imported using the namespace path without adding the class name.
e.g use PaymentGateway\Paddle this will import all classes and make them available. see below
new namespace\Class or function name. e.g Paddle\Transaction.

Autoloading:
it automatically loads your classes, interface, trait etc that are not included or udefined in the current working file.
=========================================================
Autoloading with composer:
=>make sure composer is globally installed.
=>use composer require packageName to install your need packages.
=============================================================
composer.json: is a JSON file placed in the root folder of PHP project. Its purpose is to specify a common project properties, meta data and dependencies, and it is a part of vast array of existing projects.
======================================================================
composer.lock file allows you to control when and how to update these dependencies. Besides, composer. json lists your project's direct dependencies, but each dependency might have its own dependencies and composer.lock tracks these indirect dependencies as well, ensuring the entire dependency tree is consistent.
============================================================
Class Constant:
=>names can not be redeclared in the script
=>it is accessed using the class name with two semi colon e.g Transaction::properties/methods
=>when the access modifier is set to private, it can only be accessed from within the class.
=> self keyword can also be used to access properties and methods within the class. it point to the class itself,  used within the class
=========================================================================
Class static:
=> just like Constant, it is accessed using the class name with two semi colon e.g Transaction::properties/methods
=> self keyword can also be used to access properties and methods within the class. it point to the class itself,  used within the class
=>when an instance is created you can use arrow operator to access methods and properties
e.g $object = new Trans; getAmount() is a static method
so: $object->getAmount() it is not advisable to use this.
=>it is not advisible  to use static methods except micro task
==============================================================================================================
Encapsulation and abstraction:
=>By bundling attributes and methods within a class, you encapsulate the data and provide specific ways to interact with that data through the class's methods.
=> This encapsulation ensures that the data cannot be directly accessed or modified from outside the class, but only through the defined methods.
=>Encapsulation is not just about using private and protected access modifiers, although they are fundamental to the concept. It also involves providing a well-defined public interface for interacting with the data, ensuring that the internal state of the object is accessed and modified in a controlled and predictable manner. This combination of data hiding and controlled access is what makes encapsulation a powerful principle in object-oriented programming.
=>You can use reflection api to break the principles of encapsulation
$reflectionProperty = new ReflectionProperty(Transaction::class, 'amount');
$reflectionProperty->setAccessible(true);
var_dump($reflectionProperty->getValue($paddletransaction));
=>private or protected properties and methods indicate that the properties are to be implemented within the class.
=>Object of the same type can access the private and protected property and methods. see line 






