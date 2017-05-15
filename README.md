# ReverseIndent
PHP application to reverse the indentation of a file.

## Prerequisite
`PHP 7.0+`

## Usage
You can use Reverse Indent from the command line or as part of a website.

### CLI usage

To reverse the indentation of a file through the command line interface:

`<filepath>/bin/reverseIndent.php <input filepath> <output filepath>`

Obviously this might break your code. I take no responsibility for your stupidity if you fuck up.

### Web usage
If you wish to display the results on a webpage you might want to show the output within `<pre>` tags.
`<pre>` tags will preserve the newline characters, so you don't have to process the output more than necessary.

```php
/* Requires the ReverseIndent.php file. Path may vary based on install directory */
require_once 'src/ReverseIndent.php';

/* Creating new object from the required file. */
$revIn = new \Freeman\ReverseIndent\ReverseIndent\ReverseIndent();

/* Call to run reverses the indentation of $input and stores it in $output */
$output = $revIn->run($input);
```

## Version History
v1.0.0: Github release