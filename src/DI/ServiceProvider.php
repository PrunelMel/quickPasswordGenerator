<?php

declare(strict_types=1);

namespace Eroto\HomeHandler\DI;

interface ServiceProvider
{
    public function provide(Container $c): void;
}
?>