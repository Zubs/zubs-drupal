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

/* umami:badge */
class __TwigTemplate_71fadba75de3de339189f6c7b689a8d5 extends Template
{
    private $source;
    private $macros = [];

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->parent = false;

        $this->blocks = [
            'text' => [$this, 'block_text'],
        ];
        $this->sandbox = $this->env->getExtension('\Twig\Extension\SandboxExtension');
        $this->checkSecurity();
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $macros = $this->macros;
        // line 1
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\Core\Template\TwigExtension']->attachLibrary("sdc/umami--badge"));
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\sdc\Twig\TwigExtension']->addAdditionalContext($context, "umami:badge"));
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar($this->extensions['Drupal\sdc\Twig\TwigExtension']->validateProps($context, "umami:badge"));
        echo "<div";
        echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["attributes"] ?? null), "addClass", ["umami-badge"], "method", false, false, true, 1), 1, $this->source), "html", null, true);
        echo ">
  <div class=\"umami-badge__container\">
    ";
        // line 3
        if (($context["icon"] ?? null)) {
            // line 4
            echo "      <div class=\"umami-badge__icon\">
        ";
            // line 5
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->renderVar(twig_source($this->env, ((($this->sandbox->ensureToStringAllowed(twig_get_attribute($this->env, $this->source, ($context["componentMetadata"] ?? null), "path", [], "any", false, false, true, 5), 5, $this->source) . "/icons/") . ((array_key_exists("icon", $context)) ? (_twig_default_filter($this->sandbox->ensureToStringAllowed(($context["icon"] ?? null), 5, $this->source), "knife")) : ("knife"))) . ".svg")));
            echo "
      </div>
    ";
        }
        // line 8
        echo "    ";
        if (($context["label"] ?? null)) {
            // line 9
            echo "      <div class=\"umami-badge__label\">";
            echo $this->extensions['Drupal\Core\Template\TwigExtension']->escapeFilter($this->env, $this->sandbox->ensureToStringAllowed(($context["label"] ?? null), 9, $this->source), "html", null, true);
            echo "</div>
    ";
        }
        // line 11
        echo "    ";
        $this->displayBlock('text', $context, $blocks);
        // line 12
        echo "  </div>
</div>
";
        $this->env->getExtension('\Drupal\Core\Template\TwigExtension')
            ->checkDeprecations($context, ["attributes", "icon", "componentMetadata", "label"]);    }

    // line 11
    public function block_text($context, array $blocks = [])
    {
        $macros = $this->macros;
    }

    /**
     * @codeCoverageIgnore
     */
    public function getTemplateName()
    {
        return "umami:badge";
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
        return array (  79 => 11,  72 => 12,  69 => 11,  63 => 9,  60 => 8,  54 => 5,  51 => 4,  49 => 3,  40 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("", "umami:badge", "core/profiles/demo_umami/themes/umami/components/badge/badge.twig");
    }
    
    public function checkSecurity()
    {
        static $tags = array("if" => 3, "block" => 11);
        static $filters = array("escape" => 1, "default" => 5);
        static $functions = array("source" => 5);

        try {
            $this->sandbox->checkSecurity(
                ['if', 'block'],
                ['escape', 'default'],
                ['source']
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
