<?php

declare(strict_types=1);

namespace Jaddek\Bitgo\Http\Client;

trait SetterTrait
{
    protected function setCollectionByKeyword(array $data, string $keyword, string $class): void
    {
        $collection = $data[$keyword] ?? null;

        if (is_array($collection)) {
            foreach ($collection as $entry) {
                $this->$keyword[] = new $class($entry);
            }
        }
    }

    protected function setAttribute(array $data, string $key, \Closure $closure = null): void
    {
        if (is_null($closure)) {
            $closure = $this->toStringModifier();
        }

        $value = $data[$key] ?? null;

        $this->$key = $closure($value);
    }

    protected function setAttributes(array $data, array $keys, \Closure $closure = null): void
    {
        foreach ($keys as $key) {
            $this->setAttribute($data, $key, $closure);
        }
    }

    protected function toStringModifier(): \Closure
    {
        return static function ($value): ?string {
            if (!is_null($value)) {
                $value = (string)$value;
            }

            return $value;
        };
    }

    protected function toIntModifier(): \Closure
    {
        return static function ($value): ?int {
            if (!is_null($value)) {
                $value = (int)$value;
            }

            return $value;
        };
    }

    protected function toArrayModifier(): \Closure
    {
        return static function ($value): array {
            if (is_null($value)) {
                $value = [];
            }

            if (!is_array($value)) {
                $value = (array)$value;
            }

            return $value;
        };
    }

    protected function camelize($input, $separator = '_')
    {
        return str_replace($separator, '', ucwords($input, $separator));
    }
}
