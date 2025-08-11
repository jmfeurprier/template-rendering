Template Rendering
==================

Simple wrapper around Twig to renderer templates in a single method call.

## Usage

### Rendering a template from a string

```
use Jmf\TemplateRendering\TemplateRenderer;

$renderer = new TemplateRenderer();

echo $renderer->renderFromString(
    'Hello {{ who }}!',
    [
        'who' => 'World',
    ],
);
```

Will output:
```
Hello World!
```

### Rendering a template from a file

Given the following Twig template file (named `template.twig`):
```
Hello {{ who }}!
```

Then:
```
use Jmf\TemplateRendering\TemplateRenderer;

$renderer = new TemplateRenderer();

/* @var TemplateRendererInterface $renderer */
echo $renderer->renderFromFile(
    'template.twig',
    [
        'who' => 'World',
    ],
);
```

Will output:
```
Hello World!
```

### Rendering a template from a Template object

```
use Jmf\TemplateRendering\TemplateRenderer;
use Jmf\TemplateRendering\StringTemplate;

$renderer = new TemplateRenderer();

$template = new StringTemplate('Hello {{ who }}!');

echo $renderer->render(
    $template,
    [
        'who' => 'World',
    ],
);
```

Will output:
```
Hello World!
```
