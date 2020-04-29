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

/* Article/index.html.twig */
class __TwigTemplate_94728e1443baa2226a71c66a43203c5b4baaec64fd9759b2cc5a7996ff3c9f64 extends Template
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
        $this->parent = $this->loadTemplate("layout.html.twig", "Article/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    // line 2
    public function block_body($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 3
        echo "<div class=\"card\">
    <div class=\"card-header\"><span class=\"lead\"><i class=\"fa fa-newspaper\"></i> Liste des articles</span></div>
    <div class=\"card-body\">
        <div class=\"float-right\">
            <a class=\"btn btn-success\" href=\"/";
        // line 7
        echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
        echo "/article/new\"><i class=\"fa fa-plus\"></i> Ajouter un article</a>
        </div>
    </div>
    <table class=\"table\">
        <thead class=\"thead-dark\">
            <tr>
                <th>Titre</th>
                <th>Date création</th>
                <th>Date modification</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            ";
        // line 20
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["entities"] ?? null));
        foreach ($context['_seq'] as $context["_key"] => $context["entity"]) {
            // line 21
            echo "            <tr>
                <td>";
            // line 22
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entity"], "title", [], "any", false, false, false, 22), "html", null, true);
            echo "</td>
                <td>";
            // line 23
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entity"], "dateCreate", [], "any", false, false, false, 23), "d/m/Y H:i"), "html", null, true);
            echo "</td>
                <td>";
            // line 24
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entity"], "dateUpdate", [], "any", false, false, false, 24), "d/m/Y H:i"), "html", null, true);
            echo "</td>
                <td>
                    <div class=\"btn-group\">
                        <a href=\"/";
            // line 27
            echo twig_escape_filter($this->env, ($context["path"] ?? null), "html", null, true);
            echo "/article/edit/";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["entity"], "id", [], "any", false, false, false, 27), "html", null, true);
            echo "\" class=\"btn btn-secondary\"><i class=\"fa fa-pencil-alt\"></i></a>
                        <a href=\"#\" class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i></a>
                    </div>
                </td>
            </tr>
            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['entity'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 33
        echo "        </tbody>
    </table>
    <div class=\"card-footer\">
     ";
        // line 36
        echo twig_escape_filter($this->env, ($context["count"] ?? null), "html", null, true);
        echo " article(s)
    </div>
</div>
";
    }

    public function getTemplateName()
    {
        return "Article/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  112 => 36,  107 => 33,  93 => 27,  87 => 24,  83 => 23,  79 => 22,  76 => 21,  72 => 20,  56 => 7,  50 => 3,  46 => 2,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends ('layout.html.twig') %}
{% block body %}
<div class=\"card\">
    <div class=\"card-header\"><span class=\"lead\"><i class=\"fa fa-newspaper\"></i> Liste des articles</span></div>
    <div class=\"card-body\">
        <div class=\"float-right\">
            <a class=\"btn btn-success\" href=\"/{{ path }}/article/new\"><i class=\"fa fa-plus\"></i> Ajouter un article</a>
        </div>
    </div>
    <table class=\"table\">
        <thead class=\"thead-dark\">
            <tr>
                <th>Titre</th>
                <th>Date création</th>
                <th>Date modification</th>
                <th>Action</th>
            </tr>
        </thead>
        <tbody>
            {% for entity in entities %}
            <tr>
                <td>{{ entity.title }}</td>
                <td>{{ entity.dateCreate|date(\"d/m/Y H:i\") }}</td>
                <td>{{ entity.dateUpdate|date(\"d/m/Y H:i\") }}</td>
                <td>
                    <div class=\"btn-group\">
                        <a href=\"/{{ path }}/article/edit/{{ entity.id }}\" class=\"btn btn-secondary\"><i class=\"fa fa-pencil-alt\"></i></a>
                        <a href=\"#\" class=\"btn btn-danger\"><i class=\"fa fa-trash\"></i></a>
                    </div>
                </td>
            </tr>
            {% endfor %}
        </tbody>
    </table>
    <div class=\"card-footer\">
     {{ count }} article(s)
    </div>
</div>
{% endblock %}", "Article/index.html.twig", "D:\\Professionnel\\Formation\\PHP\\MVCExemple-master\\src\\View\\Article\\index.html.twig");
    }
}
