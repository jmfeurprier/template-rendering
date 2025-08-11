<?php

declare(strict_types=1);

namespace Jmf\TemplateRendering;

use Jmf\TemplateRendering\Exception\TemplateRenderingException;
use Override;
use Throwable;
use Twig\Environment;

readonly class StringTemplate implements TemplateInterface
{
    public function __construct(
        private string $string,
    ) {
    }

    #[Override]
    public function render(
        Environment $twigEnvironment,
        array $context = [],
    ): string {
        try {
            return $twigEnvironment->createTemplate($this->string)->render($context);
        } catch (Throwable $e) {
            throw new TemplateRenderingException(
                message:  'Failed rendering template from string.',
                previous: $e,
            );
        }
    }
}
