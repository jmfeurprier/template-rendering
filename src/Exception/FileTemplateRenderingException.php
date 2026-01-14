<?php

declare(strict_types=1);

namespace Jmf\TemplateRendering\Exception;

use Throwable;

class FileTemplateRenderingException extends TemplateRenderingException
{
    /**
     * @param array<string, mixed> $context
     */
    public function __construct(
        private readonly string $path,
        private readonly array $context = [],
        ?Throwable $previous = null,
    ) {
        parent::__construct(
            message:  sprintf(
                          'Failed rendering template from file at %s',
                          $this->path,
                      ),
            previous: $previous,
        );
    }

    public function getPath(): string
    {
        return $this->path;
    }

    /**
     * @return array<string, mixed>
     */
    public function getContext(): array
    {
        return $this->context;
    }
}
