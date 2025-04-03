Template Rendering
==================

Simple wrapper around Twig to renderer templates in a single method call.

## Usage

### Rendering a template from a string

```
use Jmf\TemplateRendering\TemplateRendererInterface;

/* @var TemplateRendererInterface $renderer */
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
use Jmf\TemplateRendering\TemplateRendererInterface;

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
