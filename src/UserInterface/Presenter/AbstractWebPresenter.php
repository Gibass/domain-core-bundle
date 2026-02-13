<?php

declare(strict_types=1);

namespace Gibass\Domain\Core\UserInterface\Presenter;

use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;

abstract class AbstractWebPresenter extends AbstractPresenter
{
    public static function getSubscribedServices(): array
    {
        return array_merge(parent::getSubscribedServices(), [
            'twig' => '?'.Environment::class,
        ]);
    }

    public function render(string $view, array $parameters = []): Response
    {
        $content = $this->getService('twig')->render($view, $parameters);

        return (new Response())->setContent($content);
    }
}
