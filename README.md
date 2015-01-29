JulLib
======
A set of frequently used PHP classes.

Collection
----------
- [Buffer](https://github.com/youlweb/JulLib/blob/master/src/Lib/Collection/Buffer/BufferInterface.php)  
A fixed size, iterable F.I.F.O object buffer.
- [Collection](https://github.com/youlweb/JulLib/blob/master/src/Lib/Collection/CollectionInterface.php)  
An iterable set of objects, complete with filter, sort, etc.

Entity
------
- [Entity](https://github.com/youlweb/JulLib/blob/master/src/Lib/Entity/EntityInterface.php)  
Definition of a persistent object.
- [Handler](https://github.com/youlweb/JulLib/blob/master/src/Lib/Entity/Handler/HandlerInterface.php)  
Set of operations handling the persistence and retrieval of entities.

Math
----
- [Function](https://github.com/youlweb/JulLib/blob/master/src/Lib/Math/Functions/FunctionInterface.php)  
An object-oriented container for mathematical functions.
The goal of this architecture is to stack functions in composite objects.
    - [Log](https://github.com/youlweb/JulLib/blob/master/src/Lib/Math/Functions/Log.php)
    Natural logarithm and log(`base`).
- [Vector](https://github.com/youlweb/JulLib/blob/master/src/Lib/Math/Vector/VectorInterface.php)  
Perform common arithmetic operations on a vector of floats.

String
------
- [Property](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Property/PropertyInterface.php)  
A property quantifies a particular aspect of a string.
Intended to create vector representations, such as word vectors.
    - [Shannon entropy](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Property/ShannonEntropy.php)
    Estimate the average minimum number of bits needed to encode a string.
    One of the many aspects to consider to create strong passwords, or measure randomness in a string.

Sys
---
- [PhpInfo](https://github.com/youlweb/JulLib/blob/master/src/Lib/Sys/PhpInfo.php)  
Wrapper for the classic phpinfo() function.
