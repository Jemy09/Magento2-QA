# Magento2-QA

This Project will answer some questions and explore topics related to Magento 2.

Any code related to the topics will be added to the project and referred to in the Readme.md while answering the questions.
Please note that file structure might not be accurate in these examples as we are more looking at the code.

<br>

***
<br>

## Injectable vs. non-injectable Objects in Magento 2
(see examples in folder **injectable-non-injectable**)

External information: 
- https://developer.adobe.com/commerce/php/development/components/dependency-injection/

<br>

### Injectable Objects

**Injectable objects** are singleton service objects obtained through dependency injection. The object manager uses the configuration in the di.xml file to create these objects and inject them into constructors.

Injectable objects can depend on other injectable objects in their constructor as long as the dependency chain does not circle back to the original injectable object.

<br>

### Non-injectable / Newable Objects

**Newable, or non-injectable**, objects are objects that cannot be injected. They are obtained by creating a new class instance every time they are needed.

Transient objects, such as those that require external input from the user or database, fall into this category. If you attempt to inject these objects, you will either receive an incomplete, incorrect object or an error that the object could not be created.

For example, you cannot depend on a model object, such as Product, because you need to provide a product id or explicitly request a new, empty instance to get a Product object. Since you cannot specify this data in the constructor signature, the application cannot inject this object.

<br>

Simply put you can say that "stateless" objects can be used as injectables whereas "stateful" objects should be used as non-injectable/newable objects.

### Usage
In the folder **injectable-non-injectable** you will find an example class MyClass making use of both the injectable and non-injectable objects.

The **di.xml** tells Magento that if an *InjectableInterface* is added to the constructor the implementor class *InjectableClass* should be used. The same is done for the *NonInjectableInterface* referring to the *NonInjectableClass1*.

However, another non-injectable Object is used in the MyClass this time as a newable directly inside the class function *doSomething*


## Why is it said that "you shouldn't try to avoid using the ObjectManager in your classes"

