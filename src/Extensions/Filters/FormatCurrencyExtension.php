<?php declare(strict_types=1);

namespace OxidEsales\Twig\Extensions\Filters;

use OxidEsales\EshopCommunity\Internal\Transition\Adapter\TemplateLogic\FormatCurrencyLogic;
use Twig\Extension\AbstractExtension;
use Twig\TwigFilter;
use Twig\TwigFunction;

/**
 * Class FormatCurrencyExtension
 */
class FormatCurrencyExtension extends AbstractExtension
{
    /**
     * @var FormatCurrencyLogic
     */
    private $formatCurrencyLogic;

    /**
     * FormatCurrencyExtension constructor.
     *
     * @param FormatCurrencyLogic $formatCurrencyLogic
     */
    public function __construct(FormatCurrencyLogic $formatCurrencyLogic)
    {
        $this->formatCurrencyLogic = $formatCurrencyLogic;
    }

    /**
     * Returns a list of filters to add to the existing list.
     *
     * @return TwigFunction[]
     */
    public function getFilters(): array
    {
        return [
            new TwigFilter('format_currency', [$this, 'formatCurrency'], ['is_safe' => ['html']]),
        ];
    }

    /**
     * @param string     $format
     * @param string|int $value
     *
     * @return string
     */
    public function formatCurrency($format, $value): string
    {
        return $this->formatCurrencyLogic->numberFormat($format, $value);
    }
}
