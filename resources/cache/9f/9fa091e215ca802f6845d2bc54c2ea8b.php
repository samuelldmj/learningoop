<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\CoreExtension;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;
use Twig\TemplateWrapper;

/* /invoices/invoice.twig */
class __TwigTemplate_e2ba3b87845224f2b521298d87a601aa extends Template
{
    private Source $source;
    /**
     * @var array<string, Template>
     */
    private array $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
    }

    protected function doDisplay(array $context, array $blocks = []): iterable
    {
        $macros = $this->macros;
        // line 1
        yield "<!DOCTYPE html>
<html lang=\"en\">
<head>
    <meta charset=\"UTF-8\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1.0\">
    <title>Invoices</title>
</head>
<body>
    <h1>Invoices Receipt</h1>
    <table class=\"table\">
        <thead>
            <tr>
                <th scope=\"col\">Invoice-Number #</th>
                <th scope=\"col\">Amount</th>
                <th scope=\"col\">Status</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 19
        if ( !Twig\Extension\CoreExtension::testEmpty(($context["invoices"] ?? null))) {
            // line 20
            yield "                ";
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["invoices"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["invoice"]) {
                // line 21
                yield "                    <tr>
                        <td>";
                // line 22
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["invoice"], "invoice_number", [], "any", false, false, false, 22));
                yield "</td>
                        <td>\$";
                // line 23
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["invoice"], "amount", [], "any", false, false, false, 23), 2), "html", null, true);
                yield "</td>
                        <td>";
                // line 24
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["invoice"], "invoice_status", [], "any", false, false, false, 24));
                yield "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['invoice'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 27
            yield "            ";
        } else {
            // line 28
            yield "                <tr>
                    <td colspan=\"3\">No invoices found.</td>
                </tr>
            ";
        }
        // line 32
        yield "        </tbody>
    </table>
</body>
</html>
";
        yield from [];
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName(): string
    {
        return "/invoices/invoice.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable(): bool
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo(): array
    {
        return array (  98 => 32,  92 => 28,  89 => 27,  80 => 24,  76 => 23,  72 => 22,  69 => 21,  64 => 20,  62 => 19,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("", "/invoices/invoice.twig", "C:\\laragon\\www\\learningoop\\resources\\views\\invoices\\invoice.twig");
    }
}
