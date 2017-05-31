# typed-collections

> TLDR;
>
> typed-collections is a library for **enforcing the typing** of any collection (array) of items.
>
> Jump to the [installation](#installation) or [documentation](#documentation)

PHP is (somehow) good, but its dynamically typed nature can lead bad developers to write abominable code. And even more than one can think.

This is especially true for collection of items, where you can only rely on the PHPDoc (if any / if up-to-date / if accurate) 
or on a variable's name to guess what the array actually contains:

```php
public function ($elements); // WTF is inside this $elements?
```

```php
public function (array $ips); // WTF is inside this array? Strings? Ints? Objects? Is it an associative array? Jesus F*
```

```php
/**
* @param array $ips
* OK it's an array, but still: an array of WHAT?
*/
public function (array $ips);
```

```php
/**
* @param MyObject[] $objects
* WOW, we now have some "typing". But still, we can do $objects[] = 42, which will break the array typing (we will have objects AND an integer).
*/
public function (array $objects);
```

This library is a small step towards writing good code and fixing some lacks in PHP: collections typing.

Good developers should not need it as naming, doc, tests, etc. should be well done, the arrays should be well-structured,
and the code should be easily readable and understandable.

# Installation

Install it via [Composer](https://getcomposer.org):
```
composer install aziule/typed-collections
```

# Documentation

## Supported types
The library supports most of PHP's primitive types, as well as user-defined objects collections:
- Array
- Boolean
- Double
- Int
- String
- User-defined Object

## Usage

### For primitive types
Primitive type collections will allow to store only items of this type (only ints, only booleans, etc.).

Here is the list of available collection classes:
```php
Aziule\TypedCollections\ArrayCollection;
Aziule\TypedCollections\BooleanCollection;
Aziule\TypedCollections\DoubleCollection;
Aziule\TypedCollections\IntCollection;
Aziule\TypedCollections\StringCollection;
```

Example: empty collection
```php
use Aziule\TypedCollections\IntCollection;

$collection = new IntCollection(); // Empty at that stage
$collection[] = 42;

foreach ($collection as $item) {
    // ...
}
```

Example: pre-filled collection
```php
use Aziule\TypedCollections\StringCollection;

$collection = new StringCollection([
    'my',
    'collection',
    'of',
    'strings',
]);

echo count($collection); // 4
```

### For user-defined objects
User-defined objects collections will all use the `Aziule\TypedCollections\ObjectCollection`.

Example:
```php
use Aziule\TypedCollections\ObjectCollection;

class MyObject {
    // ...
}

$collection = new ObjectCollection(MyObject::class); // The collection is of type MyObject
$collection[] = new MyObject();
$collection[] = new \DateTime(); // Will throw an InvalidItemTypeException
```

Just pass an array of objects as a second argument of the `ObjectCollection` constructor to initialise it:
```php
use Aziule\TypedCollections\ObjectCollection;

class MyObject {
    // ...
}

$collection = new ObjectCollection(MyObject::class, [
    new MyObject(),
    new MyObject(),
]);

echo count($collection); // 2
```

If you need to know what kind of object are embedded in the `ObjectCollection`:
```php
use Aziule\TypedCollections\ObjectCollection;

$collection = new ObjectCollection(\stdClass::class);
echo $collection->getClass(); // 'stdClass'
```
