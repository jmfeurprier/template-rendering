<?php

namespace Jmf\TemplateRendering;

use Jmf\TemplateRendering\Exception\TemplateRenderingException;
use Override;
use Throwable;
use Twig\Environment as TwigEnvironment;

readonly class TemplateRenderer implements TemplateRendererInterface
{
    public function __construct(
        private TwigEnvironment $twigEnvironment,
    ) {
    }

    #[Override]
    public function renderFromString(
        string $template,
        array $parameters = [],
    ): string {
        try {
            return $this->twigEnvironment->createTemplate($template)->render($parameters);
        } catch (Throwable $e) {
            throw new TemplateRenderingException('Failed rendering template from string.', 0, $e);
        }
    }

    #[Override]
    public function renderFromFile(
        string $file,
        array $parameters = [],
    ): string {
        try {
            return $this->twigEnvironment->render($file, $parameters);
        } catch (Throwable $e) {
            throw new TemplateRenderingException('Failed rendering template from file.', 0, $e);
        }
    }
}
