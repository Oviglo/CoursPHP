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

/* Article/edit.html.twig */
class __TwigTemplate_682440fa7a1bd5b4753b531b2ff74f8201ff961fa58bb43c7663c14ec9099451 extends Template
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
        $this->parent = $this->loadTemplate("layout.html.twig", "Article/edit.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<form method=\"POST\" action=\"\" >
    <div class=\"card\">
        <div class=\"card-header\"><span class=\"lead\">Modifier un article</span></div>
        <div class=\"card-body\">
            ";
        // line 7
        $this->loadTemplate("Article/_form.html.twig", "Article/edit.html.twig", 7)->display($context);
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
        return "Article/edit.html.twig";
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
        <div class=\"card-header\"><span class=\"lead\">Modifier un article</span></div>
        <div class=\"card-body\">
            {% include ('Article/_form.html.twig') %}
        </div>
        <div class=\"card-footer\">
            <button type=\"submit\" class=\"btn btn-primary\"><i class=\"fa fa-save\"></i> Enregistrer</button>
        </div>
    </div>
</form>
{% endblock %}", "Article/edit.html.twig", "D:\\Professionnel\\Formation\\PHP\\MVCExemple-master\\src\\View\\Article\\edit.html.twig");
    }
}
