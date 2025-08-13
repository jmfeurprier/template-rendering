<?php

declare(strict_types=1);

namespace Jmf\TemplateRendering;

use Jmf\TemplateRendering\Exception\FileTemplateRenderingException;
use Override;
use Throwable;
use Twig\Environment;

readonly class FileTemplate implements TemplateInterface
{
    public function __construct(
        private string $path,
    ) {
    }

    #[Override]
    public function render(
        Environment $twigEnvironment,
        array $context = [],
    ): string {
        try {
            return $twigEnvironment->render($this->path, $context);
        } catch (Throwable $e) {
            throw new FileTemplateRenderingException(
                path:     $this->path,
                context:  $context,
                previous: $e,
            );
        }
    }
}
