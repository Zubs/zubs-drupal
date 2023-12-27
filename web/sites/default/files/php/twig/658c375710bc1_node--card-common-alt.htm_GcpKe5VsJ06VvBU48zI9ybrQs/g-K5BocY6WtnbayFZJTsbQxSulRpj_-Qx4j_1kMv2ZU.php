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

/* core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig */
class __TwigTemplate_7b916e7cc37f795016e7a502f7f1f1a9 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 70
        $context["classes"] = ["node", ("node--type-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source,         // line 72
($context["node"] ?? null), "bundle", [], "any", false, false, true, 72), 72, $this->source))), ((twig_get_attribute($this->env, $this->source,         // line 73
($context["node"] ?? null), "isPromoted", [], "method", false, false, true, 73)) ? ("node--promoted") : ("")), ((twig_get_attribute($this->env, $this->source,         // line 74
($context["node"] ?? null), "isSticky", [], "method", false, false, true, 74)) ? ("node--sticky") : ("")), (( !twig_get_attribute($this->env, $this->source,         // line 75
($context["node"] ?? null), "isPublished", [], "method", false, false, true, 75)) ? ("node--unpublished") : ("")), ((        // line 76
($context["view_mode"] ?? null)) ? (("node--view-mode-" . \Drupal\Component\Utility\Html::getClass($this->sandbox->ensureToStringAllowed(($context["view_mode"] ?? null), 76, $this->source)))) : ("")), "umami-card--alt"];
        // line 80
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("umami/classy.node"), "html", null, true);
        echo "

";
        // line 82
        ob_start(function () { return ''; });
        // line 83
        echo t("View @node.type.entity.label", array("@node.type.entity.label" => twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, ($context["node"] ?? null), "type", [], "any", false, false, true, 83), "entity", [], "any", false, false, true, 83), "label", [], "method", false, false, true, 83), ));
        $context["read_more"] = ('' === $tmp = ob_get_clean()) ? '' : new Markup($tmp, $this->env->getCharset());
        // line 85
        echo "
";
        // line 86
        $this->loadTemplate("core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig", "core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig", 86, "1622283697")->display(twig_to_array(["attributes" => twig_get_attribute($this->env, $this->source,         // line 87
($context["attributes"] ?? null), "addClass", [($context["classes"] ?? null)], "method", false, false, true, 87), "content" =>         // line 88
($context["content"] ?? null), "content_attributes" =>         // line 89
($context["content_attributes"] ?? null), "label" =>         // line 90
($context["label"] ?? null), "title_attributes" =>         // line 91
($context["title_attributes"] ?? null), "title_prefix" =>         // line 92
($context["title_prefix"] ?? null), "title_suffix" =>         // line 93
($context["title_suffix"] ?? null), "read_more" =>         // line 94
($context["read_more"] ?? null), "url" =>         // line 95
($context["url"] ?? null)]));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["node", "view_mode", "attributes", "content", "content_attributes", "label", "title_attributes", "title_prefix", "title_suffix", "url"]);    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  68 => 95,  67 => 94,  66 => 93,  65 => 92,  64 => 91,  63 => 90,  62 => 89,  61 => 88,  60 => 87,  59 => 86,  56 => 85,  53 => 83,  51 => 82,  46 => 80,  44 => 76,  43 => 75,  42 => 74,  41 => 73,  40 => 72,  39 => 70,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig", "/Users/zubair/Library/Mobile Documents/com~apple~CloudDocs/Desktop/drupal/web/core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("set" => 70, "trans" => 83, "embed" => 86);
        static $filters = array("clean_class" => 72, "escape" => 80);
        static $functions = array("attach_library" => 80);

        try {
            $this->sandbox->checkSecurity(
                ['set', 'trans', 'embed'],
                ['clean_class', 'escape'],
                ['attach_library']
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}


/* core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig */
class __TwigTemplate_7b916e7cc37f795016e7a502f7f1f1a9___1622283697 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 86
        return "umami:card";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("umami:card", "core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig", 86);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content_attributes", "content", "title_attributes", "label", "title_prefix", "title_suffix", "url", "read_more"]);    }

    // line 97
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 98
        echo "    <div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content_attributes"] ?? null), "addClass", ["umami-card__content"], "method", false, false, true, 98), 98, $this->source), "html", null, true);
        echo ">
      ";
        // line 99
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 99, $this->source), "html", null, true);
        echo "
    </div>
    ";
        // line 101
        $this->loadTemplate("umami:title", "core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig", 101)->display(twig_to_array(["attributes" => twig_get_attribute($this->env, $this->source,         // line 102
($context["title_attributes"] ?? null), "addClass", ["umami-card__title"], "method", false, false, true, 102), "label" =>         // line 103
($context["label"] ?? null), "title_prefix" =>         // line 104
($context["title_prefix"] ?? null), "title_suffix" =>         // line 105
($context["title_suffix"] ?? null)]));
        // line 107
        echo "    ";
        $this->loadTemplate("umami:read-more", "core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig", 107)->display(twig_to_array(["url" =>         // line 108
($context["url"] ?? null), "text" =>         // line 109
($context["read_more"] ?? null), "a11y" =>         // line 110
($context["label"] ?? null), "extra_classes" => "umami-card__read-more"]));
        // line 113
        echo "  ";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig";
    }

    /**
     * @codeCoverageIgnore
     */
    public function isTraitable()
    {
        return false;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getDebugInfo()
    {
        return array (  191 => 113,  189 => 110,  188 => 109,  187 => 108,  185 => 107,  183 => 105,  182 => 104,  181 => 103,  180 => 102,  179 => 101,  174 => 99,  169 => 98,  165 => 97,  153 => 86,  68 => 95,  67 => 94,  66 => 93,  65 => 92,  64 => 91,  63 => 90,  62 => 89,  61 => 88,  60 => 87,  59 => 86,  56 => 85,  53 => 83,  51 => 82,  46 => 80,  44 => 76,  43 => 75,  42 => 74,  41 => 73,  40 => 72,  39 => 70,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig", "/Users/zubair/Library/Mobile Documents/com~apple~CloudDocs/Desktop/drupal/web/core/profiles/demo_umami/themes/umami/templates/content/node--card-common-alt.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 101);
        static $filters = array("escape" => 98);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include'],
                ['escape'],
                []
            );
        } catch (SecurityError $e) {
            $e->setSourceContext($this->source);

            if ($e instanceof SecurityNotAllowedTagError && isset($tags[$e->getTagName()])) {
                $e->setTemplateLine($tags[$e->getTagName()]);
            } elseif ($e instanceof SecurityNotAllowedFilterError && isset($filters[$e->getFilterName()])) {
                $e->setTemplateLine($filters[$e->getFilterName()]);
            } elseif ($e instanceof SecurityNotAllowedFunctionError && isset($functions[$e->getFunctionName()])) {
                $e->setTemplateLine($functions[$e->getFunctionName()]);
            }

            throw $e;
        }

    }
}
