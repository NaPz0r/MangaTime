<?php

/* layout.html.twig */
class __TwigTemplate_179c8e4c84f00785f61976738bcb00239c8a7f907f82405cda8e226ee3570ef1 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'head' => array($this, 'block_head'),
            'content' => array($this, 'block_content'),
            'footer' => array($this, 'block_footer'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        echo "<!doctype html>

<html>
";
        // line 4
        $this->displayBlock('head', $context, $blocks);
        // line 15
        echo "
<body>
    ";
        // line 17
        $this->displayBlock('content', $context, $blocks);
        // line 18
        echo "</body>

";
        // line 20
        $this->displayBlock('footer', $context, $blocks);
        // line 26
        echo "
</html>";
    }

    // line 4
    public function block_head($context, array $blocks = array())
    {
        // line 5
        echo "
<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link href=\"";
        // line 10
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("/lib/bootstrap/css/bootstrap.min.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <link href=\"";
        // line 11
        echo twig_escape_filter($this->env, $this->env->getExtension('Symfony\Bridge\Twig\Extension\AssetExtension')->getAssetUrl("/css/mangatime.css"), "html", null, true);
        echo "\" rel=\"stylesheet\">
    <title>MangaTime</title>
</head>
";
    }

    // line 17
    public function block_content($context, array $blocks = array())
    {
        echo " ";
    }

    // line 20
    public function block_footer($context, array $blocks = array())
    {
        // line 21
        echo "<footer class=\"footer\">
    <a href=\"<a href=\" <a href=\"https://github.com/bpesquet/OC-MicroCMS\">https://github.com/bpesquet/OC-MicroCMS</a>\"><a href=\"https://github.com/bpesquet/OC-MicroCMS\">https://github.com/bpesquet/OC-MicroCMS</a></a>\">MicroCMS</a> is a minimalistic CMS
    built as a showcase for modern PHP development.
</footer>
";
    }

    public function getTemplateName()
    {
        return "layout.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  77 => 21,  74 => 20,  68 => 17,  60 => 11,  56 => 10,  49 => 5,  46 => 4,  41 => 26,  39 => 20,  35 => 18,  33 => 17,  29 => 15,  27 => 4,  22 => 1,);
    }

    /** @deprecated since 1.27 (to be removed in 2.0). Use getSourceContext() instead */
    public function getSource()
    {
        @trigger_error('The '.__METHOD__.' method is deprecated since version 1.27 and will be removed in 2.0. Use getSourceContext() instead.', E_USER_DEPRECATED);

        return $this->getSourceContext()->getCode();
    }

    public function getSourceContext()
    {
        return new Twig_Source("<!doctype html>

<html>
{% block head %}

<head>
    <meta charset=\"utf-8\">
    <meta http-equiv=\"X-UA-Compatible\" content=\"IE=edge\">
    <meta name=\"viewport\" content=\"width=device-width, initial-scale=1\">
    <link href=\"{{ asset('/lib/bootstrap/css/bootstrap.min.css') }}\" rel=\"stylesheet\">
    <link href=\"{{ asset('/css/mangatime.css') }}\" rel=\"stylesheet\">
    <title>MangaTime</title>
</head>
{% endblock %}

<body>
    {% block content %} {% endblock %}
</body>

{% block footer %}
<footer class=\"footer\">
    <a href=\"<a href=\" <a href=\"https://github.com/bpesquet/OC-MicroCMS\">https://github.com/bpesquet/OC-MicroCMS</a>\"><a href=\"https://github.com/bpesquet/OC-MicroCMS\">https://github.com/bpesquet/OC-MicroCMS</a></a>\">MicroCMS</a> is a minimalistic CMS
    built as a showcase for modern PHP development.
</footer>
{% endblock footer %}

</html>", "layout.html.twig", "C:\\xampp\\htdocs\\MangaTime\\views\\layout.html.twig");
    }
}
