# Qalib
A simple lightweight PHP template engine

1 Class = 1 Function = 1 Template Engine

## Installation
    include 'path/to/Qalib.php';
    // Or
    Require 'path/to/Qalib.php';

## Usage

### Rendering
You don't have to instantiate the Class, just use this function directly:

    Qalib::render('path/to/template.php',array());

It takes 2 parameters:
- *template file* : the file you want to convert(render)
- *Array*: an array with indexes corresponding to variable names

### Templating

#### Display Variables

To display a variable just write `#$var`.

For instance, If You have this:

    Qalib::render('path/to/template.php',array('n'=>1437));

You can display `$n` in template file by writing:

    #$n

#### PHP Code

You can write normal PHP code inside a template file, like this:

    <?php if($n > 100){ echo $n; } ?>

**Note that in a php code you should use `echo $var` instead of `#$var`**

You can also use brackets( `{()}` ) instead of `<?php ?>`, so you transform the previous code to:

    {( if($n > 100) {echo $n;} )}

Another way to write this code is:

    {( if($n > 100) )}
        #$n
    {( } )}

*We used `{()}` instead of `{{}}` to avoid confilcts with Angular.js*

#### Extending

Imagine you have a template in which you have blocks that you want to change Dynamically, like this:

    <html>
    <body>
        <h1>
           <!-- Variable title -->
        </h1>
        <div>
            <!-- Variable content -->
        </div>
    </body>
    </html>

You can extend this in another template so you change this code to:

    <html>
    <body>
        <h1>
           #@section 'title'
        </h1>
        <div>
            #@section 'content'
        </div>
    </body>
    </html>

and in your other template write this:

    #@extends 'layout'

    #@section 'title'
    Qalib Test
    #@end

    #@section 'content'
    <p>
        This a paragraph
    </p>
    #@end

**Note that we extended 'layout' so our first file should be named 'layout.php'**
