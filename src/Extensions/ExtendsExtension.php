<?php

declare(strict_types=1);

namespace OxidEsales\Twig\Extensions;

use OxidEsales\Twig\Resolver\TemplateChain\TemplateChainValidatorInterface;
use OxidEsales\Twig\Resolver\TemplateChain\TemplateChainResolverInterface;
use OxidEsales\Twig\TokenParser\ExtendsChainTokenParser;
use Twig\Extension\AbstractExtension;

class ExtendsExtension extends AbstractExtension
{
    /** @var TemplateChainResolverInterface */
    private $templateChainResolver;
    /** @var TemplateChainValidatorInterface */
    private $templateChainValidator;

    public function __construct(
        TemplateChainResolverInterface $templateChainResolver,
        TemplateChainValidatorInterface $templateChainValidator
    ) {
        $this->templateChainResolver = $templateChainResolver;
        $this->templateChainValidator = $templateChainValidator;
    }

    public function getTokenParsers(): array
    {
        return [
            new ExtendsChainTokenParser(
                $this->templateChainResolver,
                $this->templateChainValidator
            )
        ];
    }
}