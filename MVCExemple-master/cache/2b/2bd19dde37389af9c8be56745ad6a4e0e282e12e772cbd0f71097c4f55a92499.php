<?php

use Twig\Environment;
use Twig\Error\LoaderError;
use Twig\Error\RuntimeError;
use Twig\Extension\SandboxExtension;
use Twig\Markup;
use Twig\Sandbox\SecurityError;
use Twig\Sandbox\SecurityNotAllowedTagError;
use Twig\Sandbox\SecurityNotAllowedFilterError;
use Twig\Sandbox\SecurityNotAllowedFunctionError;
use Twig\Source;
use Twig\Template;

/* Article/new.html.twig */
class __TwigTemplate_9b6fb619371683f26bff7ad51de320897910db982fa18f61660764d9383b4305 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("layout.html.twig", "Article/new.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<form method=\"POST\" action=\"\" >
    <div class=\"card\">
        <div class=\"card-header\"><span class=\"lead\">Ajouter un article</span></div>
        <div class=\"card-body\">
            ";
        // line 7
        $this->loadTemplate("Article/_form.html.twig", "Article/new.html.twig", 7)->display($context);
        // line 8
        echo "        </div>
        <div class=\"card-footer\">
            <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i> Enregistrer</button>
        </div>
    </div>
</form>
";
    }

    public function getTemplateName()
    {
        return "Article/new.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  58 => 8,  56 => 7,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends ('layout.html.twig') %}
{% block body %}
<form method=\"POST\" action=\"\" >
    <div class=\"card\">
        <div class=\"card-header\"><span class=\"lead\">Ajouter un article</span></div>
        <div class=\"card-body\">
            {% include ('Article/_form.html.twig') %}
        </div>
        <div class=\"card-footer\">
            <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i> Enregistrer</button>
        </div>
    </div>
</form>
{% endblock %}", "Article/new.html.twig", "D:\\Professionnel\\Formation\\PHP\\MVCExemple-master\\src\\View\\Article\\new.html.twig");
    }
}
