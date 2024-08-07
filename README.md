## My Documented Learning in OOP.

## This is a Documentation of concept i learnt from oop:
## =>it is recommended you should have single class per file.


## Class can have:
## =>variable called properties
## =>function called methods

Instances and objects:
In object-oriented programming, particularly in PHP, the term "instance of a class" typically refers to an object created from a class. When we talk about the components of a class, we usually refer to properties (instance variables) and methods (functions). However, an instance of a class (i.e., an object) can encompass more than just properties and methods.

==Access modifier==
works on properties and methods.
=>private or protected properties and methods indicate that the properties are to be implemented within the class.
Public: can be interacted with or used outside the class. The value can be modified.
private: can not be intercated with outside the class.
protected:
===visibility levels
->Public
->Protected
->Private

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

=> self keyword can also be used to access properties and methods within the class. it point to the class itself,  used within the class.

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
=========================================================================================================================
Inheritance:
=>This occurs when a subclass inherit public and protected properties and methods of its parent class.

=>private class can not be overridden by the subclass.

===visibility levels
->Public
->Protected
->Private

=>The subclass does not automatically call the constructor methods of the parent class by default when overriden,
you will need to use the parent keyword e.g parent::__construct.

=>final keyword used on a class makes it impossible to extend or inherit a class.
=>if final keywaord is used on methods it shows that the method can not be overridden.

==============self n $this ============================
In PHP, you use the self keyword to access static properties and methods.

The problem is that you can replace $this->method() with self::method() anywhere, regardless if method() is declared static or not. So which one should you use?

Consider this code:

class ParentClass {
    function test() {
        self::who();    // will output 'parent'
        $this->who();    // will output 'child'
    }

    function who() {
        echo 'parent';
    }
}

class ChildClass extends ParentClass {
    function who() {
        echo 'child';
    }
}

$obj = new ChildClass();
$obj->test();
In this example, self::who() will always output ‘parent’, while $this->who() will depend on what class the object has.

Now we can see that self refers to the class in which it is called, while $this refers to the class of the current object.

So, you should use self only when $this is not available, or when you don’t want to allow descendant classes to overwrite the current method.


Abstract class:
=>it cannot be instantiated
=>methods and properties must be implemented in the child classes extending the base class
=>can contain abstract methods in addition to regular methods and properties
=>abstract methods cannot be private.

Interface class:
=>all methods must be declared public.
=>methods must be implemented in the child classes extending the base class
=>You can not have properties in interfaces, but constant is accepted.
=>interfaced classes can extend or inherit multiple interfaces

Magic Method:
__get():is utilized for reading data from inaccessible (protected or private) or non-existing properties. 
__set(): is run when writing data to inaccessible (protected or private) or non-existing properties. 
 __call() is triggered when invoking inaccessible methods in an object context.
__callStatic() is triggered when invoking inaccessible methods in a static context. 

===========================================================================================================================================
overriding vs overloading
Small vocabulary note: This is *not* "overloading", this is "overriding".
Overloading: Declaring a function multiple times with a different set of parameters like this:
<?php

function foo($a) {
    return $a;
}

function foo($a, $b) {
    return $a + $b;
}

echo foo(5); // Prints "5"
echo foo(5, 2); // Prints "7"

?>

Overriding: Replacing the parent class's method(s) with a new method by redeclaring it like this:
<?php

class foo {
    function new($args) {
        // Do something.
    }
}

class bar extends foo {
    function new($args) {
        // Do something different.
    }
}

?>
================================================================================================================================
Trait:
=>This arises as a need to inherit mulitple classes
=>You can not instantiate an object of a trait.
e.g $trait = new CappucinoTrait this is not allowed. You have to import the trait into the classes you need them with use keyword.
=====>Working with Traits
->Methods precedence-->Methods in the class in which the traits is used/imported will be used instead of that in the trait if they have similar methods.
The above will only take effect in the class in which the methods is modified. To make it a global effect we need to target the trait class, because any class that use the imported traited class get to follow what the traited class holds.
#--------------------------------------------------------------------------------------------------------------------------------------------------
-->conflict resolution: when 2 class have similar methods, there could be a conflict for php to know which one to run, hence it could throw fatal error.
--->Modifying the visibilty from private to public is possible. since the methods in which the traited class is used/imported has higher precedence we can use aliasing to change the visiblity modifier.
--->the properties of trait must have similar signature(data types, value, visibility) anywhere it used, it may not be overridden.
e.g 
--->Abstract methods can be used inside traits
#========================================================================================================================================================
Anonymous class: class with no actual name.
==>it can extend other clases, implement interfaces, trait can also be used in it.
#=====================================================================================================================================================================
object comparison: (==), loose comparison between objects, (===) strict comparison between objects.
#===========================================================================================================================================
cloning an object is not the same as setting one object to each other.
e.g $obj = $obj2 points to similar thing in the memory, while clone just copy the object, but are separate entity in the memory
#==============================================================================================================================
Serialization: In PHP, serialization is the process of converting a data structure or object into a string representation that can be stored or transmitted. This allows you to save the state of an object or data structure to a database, cache, or send it over a network connection, and then later recreate the object or data structure from the serialized string.
-->when using the magic methods, you have to call the methods serialize and unserialize on the objects.
#=================================================================================================================================
Exception:
=>Exception is the base class for all user exceptions. 
=>You can create your own custom exception by extending the exception class.
=>You can use the try and catch block to catch errors
#=============================================================================================================
Routing: 
->Configure your server (Apache or what have you).
->use htaccess or other file available or
->copy to your httpd-virtualhost conf file the configurations in your htaccess, delete htacess when copied.
->build your custom route
SuperGlobals:
$_GET retrieve the data sent via url  and make it available in the body of the page
$_POST this update users data but not available in the url only on the body of the page.
$_REQUEST when used gives $_GET precedence over $_POST.
#===============================================================================================================
Sessions and Cookies
Sessions are used to store infomation that persist across request.
cookies are stored on the clients side(users side) while session on the server side.


#PDO VS MYSQLI
PDO provides a layer to access data from the db
SQL INJECTION:
To prevent SQL injection use placeholders or named parameters
placeholder are positional, the positions matter.
named parameters are not.
