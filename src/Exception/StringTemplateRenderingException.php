<?php

declare(strict_types=1);

namespace Jmf\TemplateRendering\Exception;

use Throwable;

class StringTemplateRenderingException extends TemplateRenderingException
{
    /**
     * @param array<string, mixed> $context
     */
    public function __construct(
        private readonly string $string,
        private readonly array $context = [],
        ?Throwable $previous = null,
    ) {
        parent::__construct(
            message:  'Failed rendering template from string.',
            previous: $previous,
        );
    }

    public function getString(): string
    {
        return $this->string;
    }

    /**
     * @return array<string, mixed>
     */
    public function getContext(): array
    {
        return $this->context;
    }
}
