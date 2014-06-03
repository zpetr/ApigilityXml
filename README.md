ApigilityXml
============

Necessary infrastructure to handle XML with ZF Apigility.

**NB!** This is just a pre-alpha POC kind of module, here to share code with other people solving the same problem. Please open issues and pull requests or fork and improve on your own.

Important:

- HAL is not taken into account yet.
- Testing has been done by sending requests via Postman, no unit tests exist so far.

###Installation

Look it up on https://packagist.org, add the package as a dependency to your composer.json


    "require": {
        "cloud-solutions/apigility-xml": "dev-master"
    }

Run `composer update` and add the module to your main module configuration as `ApigilityXml`.

###Example of what works

- You can chose `Xml` as a Content Negotiation Selector in your service configuration
- You can have your Resource return a nested PHP array and it will be rendered as Xml
- You can prefix array keys with `@` if you want them to be rendered as attributes of the parent element
