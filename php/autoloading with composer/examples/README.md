# Autoloading with composer

Here the file will only be loaded (required) if it’s used and won’t be loaded otherwise.

## Without Namespace
Just specify the directory in which all the php classes have been defined in composer.json file as shown below:
```javascript
"autoload": {
		"psr-4": {
			"": "src/"
		}
}
```
Then run the following command at the project root to generate the required composer autoloader `(vendor/autoload.php)` file.
```
composer dump-autoload -o
```
Just require the composer autoloader file and initialize any required class defined inside the directory mentioned in composer.json as shown above.  
No need to write the use statement in the file where the class is used.

### Test
**examples/without_namespace**  
Run `php test.php`
- If the file C1.php is required, it will print the following line to console:
```
# required C1.php
```
- If an object of class C1 is initialized then it will print the following line to the console:
```
-> initialized C1
```
- Here only the files C1.php and C3.php have been required, and not C2.php since only the objects of C1 and C3 have been initialized and none of class C2.

## With Namespace
Specify the namespace with the required directory as shown below:
```javascript
"autoload": {
		"psr-4": {
			"Namespace": "src/"
		}
}
```
Then run the following command at the project root to generate the required composer autoloader `(vendor/autoload.php)` file.
```
composer dump-autoload -o
```
Just write the use statement with fully qualified class name in the file where the class is used.

### Test
**examples/with_namespace**  
Run `php test.php`
- If the file C1.php is required, it will print the following line to console:
```
# required C1.php
```
- If an object of class C1 is initialized then it will print the following line to the console:
```
-> initialized C1
```
- Here only the files C1.php and C3.php have been required, and not C2.php since only the objects of C1 and C3 have been initialized and none of class C2.
