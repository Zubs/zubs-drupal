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

/* core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig */
class __TwigTemplate_cc36c5bb7282d3632da63ca8e24385a6 extends Template
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
        // line 29
        echo "
";
        // line 30
        $this->loadTemplate("core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig", "core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig", 30, "40898244")->display(twig_to_array(["attributes" =>         // line 31
($context["attributes"] ?? null), "content" =>         // line 32
($context["content"] ?? null), "label" =>         // line 33
($context["label"] ?? null), "title_attributes" =>         // line 34
($context["title_attributes"] ?? null), "title_prefix" =>         // line 35
($context["title_prefix"] ?? null), "title_suffix" =>         // line 36
($context["title_suffix"] ?? null)]));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "content", "label", "title_attributes", "title_prefix", "title_suffix"]);    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig";
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
        return array (  48 => 36,  47 => 35,  46 => 34,  45 => 33,  44 => 32,  43 => 31,  42 => 30,  39 => 29,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig", "/Users/zubair/Desktop/drupal/web/core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("embed" => 30);
        static $filters = array();
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['embed'],
                [],
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


/* core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig */
class __TwigTemplate_cc36c5bb7282d3632da63ca8e24385a6___40898244 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'image' => [$this, 'block_image'],
            'content' => [$this, 'block_content'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doGetParent(array $context)
    {
        // line 30
        return "umami:footer-block";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        $this->parent = $this->loadTemplate("umami:footer-block", "core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig", 30);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["content", "title_attributes", "label", "title_prefix", "title_suffix"]);    }

    // line 38
    public function block_image($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 39
        echo "    ";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_media_image", [], "any", false, false, true, 39), 39, $this->source), "html", null, true);
        echo "
  ";
    }

    // line 41
    public function block_content($context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 42
        echo "    ";
        $this->loadTemplate("umami:title", "core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig", 42)->display(twig_to_array(["attributes" => twig_get_attribute($this->env, $this->source,         // line 43
($context["title_attributes"] ?? null), "addClass", ["footer-block__title"], "method", false, false, true, 43), "label" => ((        // line 44
($context["label"] ?? null)) ? (($context["label"] ?? null)) : (twig_get_attribute($this->env, $this->source, ($context["content"] ?? null), "field_title", [], "any", false, false, true, 44))), "title_prefix" =>         // line 45
($context["title_prefix"] ?? null), "title_suffix" =>         // line 46
($context["title_suffix"] ?? null)]));
        // line 48
        echo "    ";
        if ( !($context["label"] ?? null)) {
            // line 49
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 49, $this->source), "field_title"), "field_media_image"), "html", null, true);
            echo "
    ";
        } else {
            // line 51
            echo "      ";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->extensions['Drupal\Core\Template\TwigExtension']->withoutFilter($this->sandbox->ensureToStringAllowed(($context["content"] ?? null), 51, $this->source), "field_media_image"), "html", null, true);
            echo "
    ";
        }
        // line 53
        echo "  ";
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig";
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
        return array (  183 => 53,  177 => 51,  171 => 49,  168 => 48,  166 => 46,  165 => 45,  164 => 44,  163 => 43,  161 => 42,  157 => 41,  150 => 39,  146 => 38,  134 => 30,  48 => 36,  47 => 35,  46 => 34,  45 => 33,  44 => 32,  43 => 31,  42 => 30,  39 => 29,);
    }

    public function getSourceContext()
    {
        return new Source("", "core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig", "/Users/zubair/Desktop/drupal/web/core/profiles/demo_umami/themes/umami/templates/components/footer-promo-block/block--bundle--footer-promo-block.html.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("include" => 42, "if" => 48);
        static $filters = array("escape" => 39, "without" => 49);
        static $functions = array();

        try {
            $this->sandbox->checkSecurity(
                ['include', 'if'],
                ['escape', 'without'],
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
