<?php

namespace Userator\VoyagerBundle\Tests\Action;

use PHPUnit\Framework\MockObject\MockObject;
use PHPUnit\Framework\TestCase;
use Symfony\Component\HttpFoundation\Request;
use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Error\SyntaxError;
use Userator\VoyagerBundle\Action\VoyagerAction;

class VoyagerActionTest extends TestCase
{
    private MockObject&Environment $twig;
    private VoyagerAction $sut;

    protected function setUp(): void
    {
        parent::setUp();

        $this->twig = $this->createMock(Environment::class);
        $this->sut = new VoyagerAction(
            $this->twig,
            '/graphql',
            'Test Voyager'
        );
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function testInvokeReturnsResponseWhenEnabled(): void
    {
        $this->twig
            ->expects(self::once())
            ->method('render')
            ->with('@VoyagerBundle/index.html.twig', [
                'title' => 'Test Voyager',
                'endpoint' => '/graphql',
            ])
            ->willReturn('<html lang="ru">Voyager</html>');

        $response = $this->sut->__invoke(new Request());

        self::assertSame(200, $response->getStatusCode());
        self::assertSame('<html lang="ru">Voyager</html>', $response->getContent());
    }

    /**
     * @throws SyntaxError
     * @throws RuntimeError
     * @throws LoaderError
     */
    public function testInvokeWithCustomEndpoint(): void
    {
        $action = new VoyagerAction(
            $this->twig,
            '/api/graphql',
            'Test Voyager'
        );

        $this->twig
            ->expects(self::once())
            ->method('render')
            ->with('@VoyagerBundle/index.html.twig', [
                'title' => 'Test Voyager',
                'endpoint' => '/api/graphql',
            ])
            ->willReturn('<html lang="ru">Voyager</html>');

        $response = $action->__invoke(new Request());

        self::assertSame(200, $response->getStatusCode());
    }
}
