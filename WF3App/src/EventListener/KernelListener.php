<?php

namespace App\EventListener;

use Symfony\Component\EventDispatcher\EventSubscriberInterface;
use Symfony\Component\HttpFoundation\RedirectResponse;
use Symfony\Component\HttpKernel\Event\ResponseEvent;
use Symfony\Component\HttpKernel\KernelEvents;
use Symfony\Component\Routing\RouterInterface;

class KernelListener implements EventSubscriberInterface
{
    private $router;

    public function __construct(RouterInterface $router)
    {
        $this->router = $router;
    }

    public static function getSubscribedEvents()
    {
        // Retourne quelle méthode appeller en fonction de l'événement
        return [
            KernelEvents::RESPONSE => 'onKernelResponse',
        ];
    }

    public function onKernelResponse(ResponseEvent $event)
    {
        $request = $event->getRequest();
        $route = $request->get('_route');
        $locale = $request->get('_locale');

        //var_dump($route);
        //var_dump($locale);
        if (null == $route && null == $locale) {
            $event->setResponse(new RedirectResponse($this->router->generate('app_app_home', ['_locale' => 'fr'])));
        }
    }
}
