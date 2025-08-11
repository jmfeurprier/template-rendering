<?php

declare(strict_types=1);

namespace Jmf\TemplateRendering;

use Jmf\TemplateRendering\Exception\TemplateRenderingException;
use Twig\Environment;

interface TemplateInterface
{
    /**
     * @param array<string, mixed> $context
     *
     * @throws TemplateRenderingException
     */
    public function render(
        Environment $twigEnvironment,
        array $context = [],
    ): string;
}
