JulLib
======
####A set of frequently used PHP classes.  
Most links point to interfaces for clarity,
but abstract classes and concrete implementations can be found in the same folder where relevant.  
All tests are located in the [Tests](https://github.com/youlweb/JulLib/blob/master/src/Lib/Tests) folder.

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
The goal of this architecture is to build function stacks.
    - [Closure function](https://github.com/youlweb/JulLib/blob/master/src/Lib/Math/Functions/ClosureFunction.php)
    A user-defined function is used to calculate the function output.
    - [Log](https://github.com/youlweb/JulLib/blob/master/src/Lib/Math/Functions/Log.php)
    Natural logarithm and log(`base`).
- [Vector](https://github.com/youlweb/JulLib/blob/master/src/Lib/Math/Vector/VectorInterface.php)  
Perform common arithmetic operations on a vector of floats.

String
------
- [Filter](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Filter/FilterInterface.php)  
A filter transforms a string.
This object-oriented approach allows to build filter stacks.
    - [Lowercase](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Filter/Lowercase.php)
    Convert all alphabetical characters to lowercase.
    - [Uppercase](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Filter/Uppercase.php)
    Convert all alphabetical characters to uppercase.
    - [Whitespace](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Filter/Whitespace.php)
    Trim consecutive whitespaces down to a single whitespace.
    New lines and tabs are also converted to a single whitespace.
- [Property](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Property/PropertyInterface.php)  
A property quantifies a particular aspect of a string.
Useful to create vector representations, such as word vectors.
    - [Closure property](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Property/ClosureProperty.php)
    A user-defined function is used to calculate the property value.
    - [Shannon entropy](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Property/ShannonEntropy.php)
    Estimate the average minimum number of bits needed to encode a string.
    One of the many aspects to consider to create strong passwords, or measure randomness in a string.
- [Tokenizer](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Tokenizer/TokenizerInterface.php)  
Break a string down into an array of terms.
    - [Delimiter](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Tokenizer/Delimiter.php)
    Similar to PHP's native explode() function, with additional checks.
    - [Repeated substring](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Tokenizer/RepeatedSubstring.php)
    Find all repeated substrings in a string.
    Used in full text indices, data compression, semantic analysis, spam filtering,
    and within the field of bioinformatics.
    - [Suffix array](https://github.com/youlweb/JulLib/blob/master/src/Lib/String/Tokenizer/SuffixArray.php)
    A sorted array of all suffixes of a string. An efficient alternative to a suffix tree.

Sys
---
- [PhpInfo](https://github.com/youlweb/JulLib/blob/master/src/Lib/Sys/PhpInfo.php)  
Wrapper for the classic phpinfo() function.
