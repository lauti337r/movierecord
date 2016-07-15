<?php

/* main/index.html.twig */
class __TwigTemplate_0ade4daa758afc2a7ddc12c68cdda33f9d61c85f5dcded32e7b903caedb4b84b extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        // line 1
        $this->parent = $this->loadTemplate("base.html.twig", "main/index.html.twig", 1);
        $this->blocks = array(
            'menu' => array($this, 'block_menu'),
        );
    }

    protected function doGetParent(array $context)
    {
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_8d632ffc879ba3aa47e560f726e4d7f0c08d326b77596d0730054c8cacfb4e90 = $this->env->getExtension("native_profiler");
        $__internal_8d632ffc879ba3aa47e560f726e4d7f0c08d326b77596d0730054c8cacfb4e90->enter($__internal_8d632ffc879ba3aa47e560f726e4d7f0c08d326b77596d0730054c8cacfb4e90_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "main/index.html.twig"));

        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_8d632ffc879ba3aa47e560f726e4d7f0c08d326b77596d0730054c8cacfb4e90->leave($__internal_8d632ffc879ba3aa47e560f726e4d7f0c08d326b77596d0730054c8cacfb4e90_prof);

    }

    // line 3
    public function block_menu($context, array $blocks = array())
    {
        $__internal_5140b9a7702dcb9ebfb8d3291d6f03db415647265ba501cd803e04da32ad8761 = $this->env->getExtension("native_profiler");
        $__internal_5140b9a7702dcb9ebfb8d3291d6f03db415647265ba501cd803e04da32ad8761->enter($__internal_5140b9a7702dcb9ebfb8d3291d6f03db415647265ba501cd803e04da32ad8761_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "menu"));

        // line 4
        echo "
";
        
        $__internal_5140b9a7702dcb9ebfb8d3291d6f03db415647265ba501cd803e04da32ad8761->leave($__internal_5140b9a7702dcb9ebfb8d3291d6f03db415647265ba501cd803e04da32ad8761_prof);

    }

    public function getTemplateName()
    {
        return "main/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  40 => 4,  34 => 3,  11 => 1,);
    }
}
/* {% extends 'base.html.twig' %}*/
/* */
/* {% block menu %}*/
/* */
/* {% endblock %}*/
/* */
