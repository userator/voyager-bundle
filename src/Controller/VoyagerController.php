<?php

declare(strict_types=1);

namespace Userator\VoyagerBundle\Controller;

use Symfony\Bundle\FrameworkBundle\Controller\AbstractController;
use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;

final class VoyagerController extends AbstractController
{
    public function __construct(
        private string $endpoint,
    ) {
    }

    public function __invoke(Request $request): Response
    {
        return $this->render(
            'templates/index.html.twig',
            [
                'endpoint' => $this->endpoint,
            ],
        );
    }
}
