<?php

namespace Jmf\TemplateRendering;

use Jmf\TemplateRendering\Exception\TemplateRenderingException;

interface TemplateRendererInterface
{
    /**
     * @param array<string, mixed> $parameters
     *
     * @throws TemplateRenderingException
     */
    public function renderFromString(
        string $template,
        array $parameters = [],
    ): string;

    /**
     * @param array<string, mixed> $parameters
     *
     * @throws TemplateRenderingException
     */
    public function renderFromFile(
        string $file,
        array $parameters = [],
    ): string;
}
