# learningoop

##This is a Documentation of concept i learnt from oop:

=>it ias recommended you should have single class per file.

Class can have:
=>variable called properties
=>function called methods

==Access modifier==
works on properties and methods
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


