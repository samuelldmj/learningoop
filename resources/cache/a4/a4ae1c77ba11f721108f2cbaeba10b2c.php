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
class __TwigTemplate_a40de6e67d4c6d9396eb808fd63d36f0 extends Template
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
            yield "            <pre>
            ";
            // line 21
            yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(Twig\Extension\DebugExtension::dump($this->env, $context, ...[($context["invoices"] ?? null)]), "html", null, true);
            yield "
            </pre>

            xdebug_info()
                ";
            // line 25
            $context['_parent'] = $context;
            $context['_seq'] = CoreExtension::ensureTraversable(($context["invoices"] ?? null));
            foreach ($context['_seq'] as $context["_key"] => $context["invoice"]) {
                // line 26
                yield "                    <tr>
                        <td>";
                // line 27
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["invoice"], "invoice_number", [], "any", false, false, false, 27));
                yield "</td>
                        <td>\$";
                // line 28
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape($this->extensions['Twig\Extension\CoreExtension']->formatNumber(CoreExtension::getAttribute($this->env, $this->source, $context["invoice"], "amount", [], "any", false, false, false, 28), 2), "html", null, true);
                yield "</td>
                        <td>";
                // line 29
                yield $this->env->getRuntime('Twig\Runtime\EscaperRuntime')->escape(CoreExtension::getAttribute($this->env, $this->source, $context["invoice"], "invoice_status", [], "any", false, false, false, 29));
                yield "</td>
                    </tr>
                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_key'], $context['invoice'], $context['_parent']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 32
            yield "            ";
        } else {
            // line 33
            yield "                <tr>
                    <td colspan=\"3\">No invoices found.</td>
                </tr>
            ";
        }
        // line 37
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
        return array (  107 => 37,  101 => 33,  98 => 32,  89 => 29,  85 => 28,  81 => 27,  78 => 26,  74 => 25,  67 => 21,  64 => 20,  62 => 19,  42 => 1,);
    }

    public function getSourceContext(): Source
    {
        return new Source("<!DOCTYPE html>
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
            {% if invoices is not empty %}
            <pre>
            {{ dump(invoices) }}
            </pre>

            xdebug_info()
                {% for invoice in invoices %}
                    <tr>
                        <td>{{ invoice.invoice_number|e }}</td>
                        <td>\${{ invoice.amount|number_format(2) }}</td>
                        <td>{{ invoice.invoice_status|e }}</td>
                    </tr>
                {% endfor %}
            {% else %}
                <tr>
                    <td colspan=\"3\">No invoices found.</td>
                </tr>
            {% endif %}
        </tbody>
    </table>
</body>
</html>
", "/invoices/invoice.twig", "C:\\laragon\\www\\learningoop\\resources\\views\\invoices\\invoice.twig");
    }
}
