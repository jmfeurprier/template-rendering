<?php

declare(strict_types=1);

namespace Jmf\TemplateRendering;

use Jmf\TemplateRendering\Exception\TemplateRenderingException;
use Override;
use Twig\Environment as TwigEnvironment;

readonly class TemplateRenderer implements TemplateRendererInterface
{
    public function __construct(
        private TwigEnvironment $twigEnvironment,
    ) {
    }

    #[Override]
    public function render(
        TemplateInterface $template,
        array $context = [],
    ): string {
        return $this->doRender($template, $context);
    }

    #[Override]
    public function renderFromString(
        string $string,
        array $context = [],
    ): string {
        return $this->doRender(
            new StringTemplate($string),
            $context,
        );
    }

    #[Override]
    public function renderFromFile(
        string $file,
        array $context = [],
    ): string {
        return $this->doRender(
            new FileTemplate($file),
            $context,
        );
    }

    /**
     * @param array<string, mixed> $context
     *
     * @throws TemplateRenderingException
     */
    private function doRender(
        TemplateInterface $template,
        array $context = [],
    ): string {
        return $template->render($this->twigEnvironment, $context);
    }
}
