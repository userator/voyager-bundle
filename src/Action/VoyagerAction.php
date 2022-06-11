<?php

declare(strict_types=1);

namespace Action;

use Symfony\Component\HttpFoundation\Request;
use Symfony\Component\HttpFoundation\Response;
use Symfony\Component\HttpKernel\Exception\BadRequestHttpException;
use Twig\Environment;

/**
 * GraphQL Voyager entrypoint.
 */
final class VoyagerAction
{
    private Environment $twig;
    private string $entrypoint;
    private bool $enabled;
    private string $title;
    private ?string $assetPackage;

    public function __construct(
        Environment $twig,
        string      $entrypoint,
        bool        $enabled = false,
        string      $title = '',
        ?string     $assetPackage = null
    )
    {
        $this->twig = $twig;
        $this->entrypoint = $entrypoint;
        $this->enabled = $enabled;
        $this->title = $title;
        $this->assetPackage = $assetPackage;
    }

    public function __invoke(Request $request): Response
    {
        if (!$this->enabled) {
            throw new BadRequestHttpException('GraphQL Voyager is not enabled.');
        }

        return new Response(
            $this->twig->render('@VoyagerBundle/index.twig', [
                'title' => $this->title,
                'entrypoint' => $this->entrypoint,
                'assetPackage' => $this->assetPackage,
            ])
        );
    }
}
