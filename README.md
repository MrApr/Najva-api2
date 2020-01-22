Library for using Najva push notification API in order to send push notifications

## Installation
For install this library in your project copy and paste code below in terminal 

    composer require mr-apr/najva_push_notification
## Usage
**1**. First you have to create an object from \Najva\Src\Objects\NajvaObject() and instantiating it.

    $najva_object = new \Najva\Src\Objects\NajvaObject();

**2**. Then you have to set essential objects by calling proper methods.

|Row|Method name|method's parameter|parameter type|action| 
|:--:|:--:|:--:|:--:|:--:|
| 1 | setToken() | $token | string | Sets Najva API given token 
| 2 | setApiKey() | $api_key | string | Sets given api key
| 3 | setTitle() | $title | string | Sets title for the notification that is going to send | 
| 4 | setBody | $message | string | Sets message for the notification that is going to sent.
| 5 | setTime | $time | Carbon object | Sets sending time for notification. It will get sent on the given time.
| 6 | setUrl | $url | string | Sets url for sending notification

**Example**
For sending notifications to all users we have to set all explained methods :

    $najva_object->setToken("TOKEN")
    ->setApiKey("API_KEY")
    ->setTitle("Test Title")
    ->setBody("Test body")
    ->setTime(\Carbon\Carbon::now()->addMinute(280)
    ->toDateTimeString())
    ->setUrl("https://test.test");

**Note 1**
> In order to know what are these method and properties for go to najva push notifcation api documentation : [https://doc.najva.com/docs/1.2.0/web/api](https://doc.najva.com/docs/1.2.0/web/api)

**Note 2**

> You do not need to use all existed method to set all of these properties !
> Just set based on what API are you using. 

**Note 3**

> If there is  a property in API, that it doesn't have any method to set that property with value, you can set that property with desired value just by making a property for that object. It will use magic methods to make a property with given name and value for the object.
> Example : 
> $najva_object->property_name = proerty_value;

**3**. Next we have to Create an object from \Najva\Src\Najva() and instantiating it.
This object accepts two parameters in it's constructor. Parameter one that is required should be an najva object which has required data that is Implemented from ObjectFormatterInterface, second parameter that is optional is Driver for sending data. Default  driver is rest driver. if you put it null it will create rest driver as default too.

    $najva = new \Najva\Src\Najva($najva_object,new \Najva\Src\Drivers\RestDriver());

**4**. Now we should execute operation. For executing you have to choose one method from 4 available methods to make desirable actions due to API.

    print_r($najva->sendToAllRequest());

 **Methods**


 | Row | Method name | description | 
 | :--: | :--: | :--: |
 | 1 | sendToAllRequest | Sends Push notification to all subscribed users |
 | 2 | sendLimitedRequest | Sends Push notification to limited users with najva UUID Stored keys.
 | 3 | getSegments | Get Active segments on najva Push notification service
 | 4 | getOneSignalSegments | Gets Segments that are in one-signal website

**Test Code**

    require_once __DIR__."/vendor/autoload.php";
    
    $najva_object = new \Najva\Src\Objects\NajvaObject();
    
    $najva_object->setToken("TOKEN")  
    ->setApiKey("API_KEY")  
    ->setTitle("aaaa")  
    ->setBody("awawa")  
    ->setTime(\Carbon\Carbon::now()->addMinute(280)
    >toDateTimeString())  
    ->setUrl("https://marketingshop.ir");  
    
    $najva = new \Najva\Src\Najva($najva_object,
    new \Najva\Src\Drivers\RestDriver());
    
    print_r($najva->sendToAllRequest());

Hope you enjoy using this package. 
Laravel compatible and full support version will be out soon.