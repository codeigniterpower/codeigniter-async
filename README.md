# Codeigniter - async


Powered emulation of asincronos call to remote url's or as a base to make API's.

Asynchronous Process means that a process operates independently of other process. 
So `codeigniter-async` it executes process in background by emulation, using a opensocks method. 
With this you can call a remote funtion and no waith for a complex response.. of course 
you must make a trick to see of was completed or not.


## FEATURES

*  Simple **call to remote function without waith to complete** the underground process.


## INSTALLING

Comes included with CodeigniterPowered, but for CI 2 or CI 3 must do:

**Requirements**

* Codeigniter 2.x or 3.x

**Manual controlled install**

`wget https://github.com/codeigniterpower/codeigniter-async/blob/master/application/libraries/libasync.php -O libraries/libasync.php


## USAGE

Then, just In controlers or in the views:

``` php
$this->load->library('libasync');
$datapost = array('inputform1'=>'value1');
$this->libasync->from_remote_do_remote_in_back($datapost, "http://localhost/something/to/get/or/do/that/make/thing/remotelly");
```

The library will open a socket, so then the control are returned inmediatelly, 
so the underground process will be managed by the opened socket and not by the current request to that url invoked, 
due the url are passed to the socket by the library..

### Initializing the Class

In your controller using the `$this->load->library()` method:

```php
$this->load->library('markdown');
```

Te library to use need two params, a remote url that wil be called as asinc and the post inputs:

```php
$datapost = array('inputform1'=>'value1');
$dataurl = "http://localhost/something/to/get/or/do/that/make/thing/remotelly"
```

Once loaded, and params configured, the library object will be available using `$this->libasync` 
and the method that makes the magic are `from_remote_do_remote_in_back` that you can invoke as:

```php
$this->libasync->from_remote_do_remote_in_back($datapost, $dataurl);
```

## TODO 

*implement access token as https://github.com/jagroop/codeigniter-artisan/commit/fea162f92ee0d36f420cf97b24712ba78fbaaa15

## Credits

This is a improvement version for Codeigniter-powered, see original project for.

- Jagroop Singh geek.jagroop@gmail.com

