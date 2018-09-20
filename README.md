# Typed Collections

> ## TL;DR
>
> typed-collections is a project aiming to sensibilise developers to write good code and documentation when it comes to manipulating arrays in PHP.
>
> Jump to the [installation](#installation) or [documentation](#documentation)

PHP's dynamically typed nature can lead bad developers to write abominable code. This is especially true for collections (arrays) of items, where one can only rely on the PHPDoc (if any, up-to-date and accurate) or on a variable's name to guess what the array actually contains:

**Absolute worst case:**
```php
public function ($elements); // Too vague
```

**Bad - and unfortunately, too common:**
```php
/**
* @param array $ips
*/
public function (array $ips); // Still too vague (can be associative, contain objects, etc.)
```

**Common practice**
```php
/**
* @param MyObject[] $objects
*/
public function (array $objects); // Best practice
```

# Installation

Install it via [Composer](https://getcomposer.org):
```
composer require aziule/typed-collections
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

Here is the list of available primitive collection classes:
```php
Aziule\TypedCollections\ArrayCollection;
Aziule\TypedCollections\BooleanCollection;
Aziule\TypedCollections\DoubleCollection;
Aziule\TypedCollections\IntCollection;
Aziule\TypedCollections\StringCollection;
```

**Empty collection**
```php
use Aziule\TypedCollections\IntCollection;

$collection = new IntCollection(); // Empty at that stage
$collection[] = 42;

foreach ($collection as $item) {
    // ...
}
```

**Pre-filled collection**
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
Two different methods exist for creating and passing user-defined objects collections:
- [Using `ObjectCollection`](#using-objectcollection)
- [Creating a custom collection extending `ObjectCollection`](#creating-a-custom-collection)

#### Using `ObjectCollection`
**Example**
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

#### Creating a custom collection
If you want to pass an even more strongly-typed collection, you can create a custom collection for each type of object you need.

**Example:**
```php
use \Aziule\TypedCollections\ObjectCollection;

class Item
{
    private $value;

    public function __construct($value)
    {
        $this->value = $value;
    }
}

class ItemCollection extends ObjectCollection
{
    public function __construct(array $items = [])
    {
        parent::__construct(Item::class, $items);
    }
}

$collection = new ItemCollection();
$collection[] = new Item('Foo');
$collection[] = new Item('Bar');

// And then use this collection
public function doSomething(ItemCollection $itemCollection)
{
    // ...
}
```

## Test
```sh
./vendor/bin/phpunit
```
