<?php

declare(strict_types=1);

namespace Jmf\TemplateRendering\Tests;

use Jmf\TemplateRendering\FileTemplate;
use Jmf\TemplateRendering\StringTemplate;
use Jmf\TemplateRendering\TemplateRenderer;
use Override;
use PHPUnit\Framework\TestCase;
use Twig\Environment;
use Twig\Loader\FilesystemLoader;

final class TemplateRendererTest extends TestCase
{
    private TemplateRenderer $templateRenderer;

    #[Override]
    protected function setUp(): void
    {
        $twigEnvironment = new Environment(
            new FilesystemLoader(
                __DIR__ . '/Fixtures/templates',
            ),
        );

        $this->templateRenderer = new TemplateRenderer($twigEnvironment);
    }

    public function testRenderFromString(): void
    {
        $result = $this->templateRenderer->renderFromString(
            'foo {{ bar }}',
            [
                'bar' => 'baz',
            ],
        );

        self::assertSame('foo baz', $result);
    }

    public function testRenderFromFile(): void
    {
        $result = $this->templateRenderer->renderFromFile(
            'template.html.twig',
            [
                'bar' => 'baz',
            ],
        );

        self::assertStringStartsWith('foo baz', $result);
    }

    public function testRenderWithStringTemplate(): void
    {
        $template = new StringTemplate('foo {{ bar }}');

        $result = $this->templateRenderer->render(
            $template,
            [
                'bar' => 'baz',
            ],
        );

        self::assertSame('foo baz', $result);
    }

    public function testRenderWithFileTemplate(): void
    {
        $template = new FileTemplate('template.html.twig');

        $result = $this->templateRenderer->render(
            $template,
            [
                'bar' => 'baz',
            ],
        );

        self::assertStringStartsWith('foo baz', $result);
    }
}
