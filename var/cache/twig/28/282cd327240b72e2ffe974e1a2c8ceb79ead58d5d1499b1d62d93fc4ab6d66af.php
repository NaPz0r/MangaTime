<?php

/* index.html.twig */
class __TwigTemplate_b1a22566bd974a545a7bb4964f7184e963d170cc0d21c20f1c0d4e735077996d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("layout.html.twig", "index.html.twig", 1);
        $this->blocks = array(
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "layout.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $this->parent->display($context, array_merge($this->blocks, $blocks));
    }

    public function block_content($context, array $blocks = array())
    {
        // line 2
        echo "<div class=\"container\">
    <nav class=\"navbar navbar-default navbar-fixed-top navbar-inverse\" role=\"navigation\">
        <div class=\"container\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse-target\">
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                <a class=\"navbar-brand\" href=\"\">MangaTime</a>
            </div>
            <div class=\"collapse navbar-collapse\" id=\"navbar-collapse-target\">
            </div>
        </div>
        <!-- /.container -->
    </nav>
    ";
        // line 18
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(($context["mangas"] ?? $this->getContext($context, "mangas")));
        foreach ($context['_seq'] as $context["_key"] => $context["manga"]) {
            // line 19
            echo "    <article>
        <h2>";
            // line 20
            echo twig_escape_filter($this->env, $this->getAttribute($context["manga"], "nameManga", array()), "html", null, true);
            echo "</h2>
        <p>";
            // line 21
            echo twig_escape_filter($this->env, twig_date_format_filter($this->env, $this->getAttribute($context["manga"], "datePublicationManga", array()), "Y"), "html", null, true);
            echo "</p>
        <p>";
            // line 22
            echo twig_escape_filter($this->env, $this->getAttribute($context["manga"], "descriptionManga", array()), "html", null, true);
            echo "</p>
    </article>
    ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['manga'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 24
        echo " ";
    }

    public function block_footer($context, array $blocks = array())
    {
        echo " ";
    }

    public function getTemplateName()
    {
        return "index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  73 => 24,  64 => 22,  60 => 21,  56 => 20,  53 => 19,  49 => 18,  31 => 2,  11 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("{% extends \"layout.html.twig\" %} {% block content %}
<div class=\"container\">
    <nav class=\"navbar navbar-default navbar-fixed-top navbar-inverse\" role=\"navigation\">
        <div class=\"container\">
            <div class=\"navbar-header\">
                <button type=\"button\" class=\"navbar-toggle\" data-toggle=\"collapse\" data-target=\"#navbar-collapse-target\">
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                        <span class=\"icon-bar\"></span>
                    </button>
                <a class=\"navbar-brand\" href=\"\">MangaTime</a>
            </div>
            <div class=\"collapse navbar-collapse\" id=\"navbar-collapse-target\">
            </div>
        </div>
        <!-- /.container -->
    </nav>
    {% for manga in mangas %}
    <article>
        <h2>{{ manga.nameManga }}</h2>
        <p>{{ manga.datePublicationManga|date(\"Y\") }}</p>
        <p>{{ manga.descriptionManga }}</p>
    </article>
    {% endfor %} {% endblock content %} {% block footer %} {% endblock footer %}", "index.html.twig", "C:\\xampp\\htdocs\\MangaTime\\views\\index.html.twig");
    }
}
