<?php

declare(strict_types=1);

namespace Jmf\TemplateRendering;

use Jmf\TemplateRendering\Exception\TemplateRenderingException;

interface TemplateRendererInterface
{
    /**
     * @param array<string, mixed> $context
     *
     * @throws TemplateRenderingException
     */
    public function render(
        TemplateInterface $template,
        array $context = [],
    ): string;

    /**
     * @param array<string, mixed> $context
     *
     * @throws TemplateRenderingException
     */
    public function renderFromString(
        string $string,
        array $context = [],
    ): string;

    /**
     * @param array<string, mixed> $context
     *
     * @throws TemplateRenderingException
     */
    public function renderFromFile(
        string $file,
        array $context = [],
    ): string;
}
