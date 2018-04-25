<?php
namespace App\Twig;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;

use App\Utils\Markdown;

class AppExtension extends AbstractExtension
{
    private $parser;

    public function __construct(Markdown $parser)
    {
        $this->parser = $parser;
    }

    public function getFilters()
    {
        return array(
            new TwigFilter('md2html', [$this, 'markdownToHtml'], ['is_safe' => ['html']]),
        );
    }

    /**
     * Transforms the given Markdown content into HTML content.
     */
    public function markdownToHtml(string $content): string
    {
        return $this->parser->toHtml($content);
    }
}