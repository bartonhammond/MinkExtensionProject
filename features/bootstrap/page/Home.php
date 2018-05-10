<?php
namespace Page;
use Wisnet\BehatPom\Utility;
use Wisnet\BehatPom\Base;

//baseUrl: https://www.google.com
//pageUrl: /
//selector: //body
//trim: true
//version: 0.0.8
//date: Thu May 10 2018 09:57:17 GMT-0500 (CDT)

/*
*  Extend class provides support for overriding all the functions
*/
if (file_exists('features/bootstrap/page/HomeExtend.php')){
    include 'features/bootstrap/page/HomeExtend.php';
}
class Home extends Base {
  protected $path = "/";
  
  protected $elements = [
  //Links
    "About" =>
    [
      "xpath" => "//a[text()='About']"
    ],
    "Store" =>
    [
      "xpath" => "//a[text()='Store']"
    ],
    "Gmail" =>
    [
      "xpath" => "//a[text()='Gmail']"
    ],
    "Images" =>
    [
      "xpath" => "//a[text()='Images']"
    ]
   ];
   /*
   * Create variable if Home exists
   */
    public function __construct($session, $factory, $parameters) {
        parent::__construct($session, $factory, $parameters);

        if (file_exists('features/bootstrap/page/HomeExtend.php')) {
            $this->extend = new \Page\HomeExtend;
             $this->extend->addToElements($this);  	    
        }
    }
}
