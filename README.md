# Breadcrumb
Breadcrumbs component for Nette Framework (2.x and 3.x branch)

Inspired by [Geniv/nette-breadcrumb](https://github.com/geniv/nette-breadcrumb)

Installation
------------
```sh
$ composer require sasule/breadcrumb
```

Usage
----------------------
First activate extension in your config.neon or common.neon (based on version of Nette framework)
```neon
extensions:
    breadcrumb:		Sasule\Breadcrumb\DI\BreadcrumbExtension
```

Then inject into your presenter and create component:
```php

/**
 * @var Sasule\Breadcrumb\Breadcrumb
 */
private $breadcrumb;

/**
 * @param Sasule\Breadcrumb\Breadcrumb $breadcrumb
 */
public function injectBreadcrumb(Sasule\Breadcrumb\Breadcrumb $breadcrumb)
{
    $this->breadcrumb = $breadcrumb;
}


...

/**
 * @return Sasule\Breadcrumb\Breadcrumb
 */
protected function createComponentBreadcrumb()
{
    $bc = $this->breadcrumb;
    //$bc->addLink('Domů', ':Default:Homepage:default');  //You can add default links so this will be shown everytime (if uncommented).
    return $bc;
}
```

Then in your template:
```latte
{control breadcrumb}
```
...and you are done.



Methods
----------------------

| Method       | Description   |
|-------------|-----------|
| `setTemplateFile(string $templateFile)`         | Sets another template. Use full path to template file. |
| `addLink(string $title, string $target, array $parameters = [])`         | Ads new link. `$title` Title which will be shown.  `$target` Target of link. Expected in Nette format. `$parameters` Link parameters as usual. |
| `addLinkLocalised(string $title, string $target, array $parameters = [])`         | Ads new localised link. Parameter `$title` is translated. Meaning of parameters is same as above.|

