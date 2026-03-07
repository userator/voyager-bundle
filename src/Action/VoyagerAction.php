<?php

declare(strict_types=1);

namespace Userator\VoyagerBundle\Action;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;

final class VoyagerAction
{
    private Environment $twig;
    private string $endpoint;
    private string $title;

    public function __construct(
        Environment $twig,
        string $endpoint,
        string $title = ''
    ) {
        $this->twig = $twig;
        $this->endpoint = $endpoint;
        $this->title = $title;
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function __invoke(Request $request): Response
    {
        return new Response(
            $this->twig->render('@VoyagerBundle/index.html.twig', [
                'title' => $this->title,
                'endpoint' => $this->endpoint,
            ])
        );
    }
}
