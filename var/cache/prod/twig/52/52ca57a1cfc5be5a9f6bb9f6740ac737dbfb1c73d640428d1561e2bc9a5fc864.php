<?php

/* base.html.twig */
class __TwigTemplate_98b0af9310ac564e9cc4e9a6ee2e9a6330087091a98b59c572c9eea90ed5393d extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'title' => array($this, 'block_title'),
            'stylesheets' => array($this, 'block_stylesheets'),
            'bod' => array($this, 'block_bod'),
            'javascripts' => array($this, 'block_javascripts'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        $__internal_1dc892b7d270fc71fa289338b60d08845ae7a4cae6705dd2c5e72e8f5238bb2e = $this->env->getExtension("native_profiler");
        $__internal_1dc892b7d270fc71fa289338b60d08845ae7a4cae6705dd2c5e72e8f5238bb2e->enter($__internal_1dc892b7d270fc71fa289338b60d08845ae7a4cae6705dd2c5e72e8f5238bb2e_prof = new Twig_Profiler_Profile($this->getTemplateName(), "template", "base.html.twig"));

        // line 1
        echo "<!DOCTYPE html>
<html>
    <head>
        <meta charset=\"UTF-8\" />
        <title>";
        // line 5
        $this->displayBlock('title', $context, $blocks);
        echo "</title>
        ";
        // line 6
        $this->displayBlock('stylesheets', $context, $blocks);
        // line 85
        echo "        <div class=\"header\">
            <div class=\"title\">
                HEADER
            </div>
        </div>
        <link rel=\"icon\" type=\"image/x-icon\" href=\"";
        // line 90
        echo twig_escape_filter($this->env, $this->env->getExtension('asset')->getAssetUrl("favicon.ico"), "html", null, true);
        echo "\" />
        <ul id=\"menu\">
            <li><a href=\"\">Main</a></li>
            <li><a href=\"movies\">Movies</a></li>
            <li><a href=\"series\">Series</a></li>
            <li><a href=\"contact\">Contacto</a></li>
        </ul>
    </head>
    ";
        // line 98
        $this->displayBlock('bod', $context, $blocks);
        // line 99
        echo "    ";
        $this->displayBlock('javascripts', $context, $blocks);
        // line 100
        echo "    </body>
</html>
";
        
        $__internal_1dc892b7d270fc71fa289338b60d08845ae7a4cae6705dd2c5e72e8f5238bb2e->leave($__internal_1dc892b7d270fc71fa289338b60d08845ae7a4cae6705dd2c5e72e8f5238bb2e_prof);

    }

    // line 5
    public function block_title($context, array $blocks = array())
    {
        $__internal_5446fc98519a3339329d35a1acdfda94bb56f1a451a9d108d43e41dc53fe92fe = $this->env->getExtension("native_profiler");
        $__internal_5446fc98519a3339329d35a1acdfda94bb56f1a451a9d108d43e41dc53fe92fe->enter($__internal_5446fc98519a3339329d35a1acdfda94bb56f1a451a9d108d43e41dc53fe92fe_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome!";
        
        $__internal_5446fc98519a3339329d35a1acdfda94bb56f1a451a9d108d43e41dc53fe92fe->leave($__internal_5446fc98519a3339329d35a1acdfda94bb56f1a451a9d108d43e41dc53fe92fe_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = array())
    {
        $__internal_11923ab8706bfeb89ef955b1f0e5a5accc7d8d46a7d59f7b009796411ac7ce89 = $this->env->getExtension("native_profiler");
        $__internal_11923ab8706bfeb89ef955b1f0e5a5accc7d8d46a7d59f7b009796411ac7ce89->enter($__internal_11923ab8706bfeb89ef955b1f0e5a5accc7d8d46a7d59f7b009796411ac7ce89_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        echo "            <link href=\"https://fonts.googleapis.com/css?family=David+Libre\" rel=\"stylesheet\">
            <style>
                div.header{
                    background-image: url(header.png);
                }
                div.title{
                    margin: 20px;
                    opacity: 0.8;
                    background-color: #ffffff;
                    border: 1px solid black;
                    font-size: 100px;
                }
                div.title p {
                    margin: 5%;
                    font-weight: bold;
                    color: #000000;
                }
                .clearfix{
                    overflow: auto;
                    width:80%;
                }
                .data{
                    width: 65%;
                    text-align: left;
                    font-size: large;
                    font-weight: normal;
                }
                .poster{
                    width: 35%;
                }
                body{
                    text-align: center;
                    font-family: David Libre, sans-serif;
                }
                ul#menu {
                    padding: 0;
                }

                ul#menu li {
                    display: inline;
                }

                ul#menu li a {
                    background-color: black;
                    color: white;
                    padding: 10px 20px;
                    text-decoration: none;
                    border-radius: 4px 4px 0 0;
                }

                ul#menu li a:hover {
                    background-color: green;
                body { background: #F5F5F5; font: 18px/1.5 sans-serif; }
                h1, h2 { line-height: 1.2; margin: 0 0 .5em; }
                h1 { font-size: 36px; }
                h2 { font-size: 21px; margin-bottom: 1em; }
                p { margin: 0 0 1em 0; }
                a { color: #0000F0; }
                a:hover { text-decoration: none; }
                code { background: #F5F5F5; max-width: 100px; padding: 2px 6px; word-wrap: break-word; }
                #wrapper { background: #FFF; margin: 1em auto; max-width: 800px; width: 95%; }
                #container { padding: 2em; }
                #welcome, #status { margin-bottom: 2em; }
                #welcome h1 span { display: block; font-size: 75%; }
                #icon-status, #icon-book { float: left; height: 64px; margin-right: 1em; margin-top: -4px; width: 64px; }
                #icon-book { display: none; }

                @media (min-width: 768px) {
                    #wrapper { width: 80%; margin: 2em auto; }
                    #icon-book { display: inline-block; }
                    #status a, #next a { display: block; }

                    @-webkit-keyframes fade-in { 0% { opacity: 0; } 100% { opacity: 1; } }
                    @keyframes fade-in { 0% { opacity: 0; } 100% { opacity: 1; } }
                    .sf-toolbar { opacity: 0; -webkit-animation: fade-in 1s .2s forwards; animation: fade-in 1s .2s forwards;}
                }
            </style>
        ";
        
        $__internal_11923ab8706bfeb89ef955b1f0e5a5accc7d8d46a7d59f7b009796411ac7ce89->leave($__internal_11923ab8706bfeb89ef955b1f0e5a5accc7d8d46a7d59f7b009796411ac7ce89_prof);

    }

    // line 98
    public function block_bod($context, array $blocks = array())
    {
        $__internal_496123f256ac6cb0db090a2bc43a9ab468fd6d35b5b4a73126dbce1e2fa3224c = $this->env->getExtension("native_profiler");
        $__internal_496123f256ac6cb0db090a2bc43a9ab468fd6d35b5b4a73126dbce1e2fa3224c->enter($__internal_496123f256ac6cb0db090a2bc43a9ab468fd6d35b5b4a73126dbce1e2fa3224c_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "bod"));

        
        $__internal_496123f256ac6cb0db090a2bc43a9ab468fd6d35b5b4a73126dbce1e2fa3224c->leave($__internal_496123f256ac6cb0db090a2bc43a9ab468fd6d35b5b4a73126dbce1e2fa3224c_prof);

    }

    // line 99
    public function block_javascripts($context, array $blocks = array())
    {
        $__internal_f066a79a8f886ca5d389814ea1e520b0a117682a3693b57fc452a3b8b853e16b = $this->env->getExtension("native_profiler");
        $__internal_f066a79a8f886ca5d389814ea1e520b0a117682a3693b57fc452a3b8b853e16b->enter($__internal_f066a79a8f886ca5d389814ea1e520b0a117682a3693b57fc452a3b8b853e16b_prof = new Twig_Profiler_Profile($this->getTemplateName(), "block", "javascripts"));

        
        $__internal_f066a79a8f886ca5d389814ea1e520b0a117682a3693b57fc452a3b8b853e16b->leave($__internal_f066a79a8f886ca5d389814ea1e520b0a117682a3693b57fc452a3b8b853e16b_prof);

    }

    public function getTemplateName()
    {
        return "base.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  183 => 99,  172 => 98,  88 => 7,  82 => 6,  70 => 5,  61 => 100,  58 => 99,  56 => 98,  45 => 90,  38 => 85,  36 => 6,  32 => 5,  26 => 1,);
    }
}
/* <!DOCTYPE html>*/
/* <html>*/
/*     <head>*/
/*         <meta charset="UTF-8" />*/
/*         <title>{% block title %}Welcome!{% endblock %}</title>*/
/*         {% block stylesheets %}*/
/*             <link href="https://fonts.googleapis.com/css?family=David+Libre" rel="stylesheet">*/
/*             <style>*/
/*                 div.header{*/
/*                     background-image: url(header.png);*/
/*                 }*/
/*                 div.title{*/
/*                     margin: 20px;*/
/*                     opacity: 0.8;*/
/*                     background-color: #ffffff;*/
/*                     border: 1px solid black;*/
/*                     font-size: 100px;*/
/*                 }*/
/*                 div.title p {*/
/*                     margin: 5%;*/
/*                     font-weight: bold;*/
/*                     color: #000000;*/
/*                 }*/
/*                 .clearfix{*/
/*                     overflow: auto;*/
/*                     width:80%;*/
/*                 }*/
/*                 .data{*/
/*                     width: 65%;*/
/*                     text-align: left;*/
/*                     font-size: large;*/
/*                     font-weight: normal;*/
/*                 }*/
/*                 .poster{*/
/*                     width: 35%;*/
/*                 }*/
/*                 body{*/
/*                     text-align: center;*/
/*                     font-family: David Libre, sans-serif;*/
/*                 }*/
/*                 ul#menu {*/
/*                     padding: 0;*/
/*                 }*/
/* */
/*                 ul#menu li {*/
/*                     display: inline;*/
/*                 }*/
/* */
/*                 ul#menu li a {*/
/*                     background-color: black;*/
/*                     color: white;*/
/*                     padding: 10px 20px;*/
/*                     text-decoration: none;*/
/*                     border-radius: 4px 4px 0 0;*/
/*                 }*/
/* */
/*                 ul#menu li a:hover {*/
/*                     background-color: green;*/
/*                 body { background: #F5F5F5; font: 18px/1.5 sans-serif; }*/
/*                 h1, h2 { line-height: 1.2; margin: 0 0 .5em; }*/
/*                 h1 { font-size: 36px; }*/
/*                 h2 { font-size: 21px; margin-bottom: 1em; }*/
/*                 p { margin: 0 0 1em 0; }*/
/*                 a { color: #0000F0; }*/
/*                 a:hover { text-decoration: none; }*/
/*                 code { background: #F5F5F5; max-width: 100px; padding: 2px 6px; word-wrap: break-word; }*/
/*                 #wrapper { background: #FFF; margin: 1em auto; max-width: 800px; width: 95%; }*/
/*                 #container { padding: 2em; }*/
/*                 #welcome, #status { margin-bottom: 2em; }*/
/*                 #welcome h1 span { display: block; font-size: 75%; }*/
/*                 #icon-status, #icon-book { float: left; height: 64px; margin-right: 1em; margin-top: -4px; width: 64px; }*/
/*                 #icon-book { display: none; }*/
/* */
/*                 @media (min-width: 768px) {*/
/*                     #wrapper { width: 80%; margin: 2em auto; }*/
/*                     #icon-book { display: inline-block; }*/
/*                     #status a, #next a { display: block; }*/
/* */
/*                     @-webkit-keyframes fade-in { 0% { opacity: 0; } 100% { opacity: 1; } }*/
/*                     @keyframes fade-in { 0% { opacity: 0; } 100% { opacity: 1; } }*/
/*                     .sf-toolbar { opacity: 0; -webkit-animation: fade-in 1s .2s forwards; animation: fade-in 1s .2s forwards;}*/
/*                 }*/
/*             </style>*/
/*         {% endblock %}*/
/*         <div class="header">*/
/*             <div class="title">*/
/*                 HEADER*/
/*             </div>*/
/*         </div>*/
/*         <link rel="icon" type="image/x-icon" href="{{ asset('favicon.ico') }}" />*/
/*         <ul id="menu">*/
/*             <li><a href="">Main</a></li>*/
/*             <li><a href="movies">Movies</a></li>*/
/*             <li><a href="series">Series</a></li>*/
/*             <li><a href="contact">Contacto</a></li>*/
/*         </ul>*/
/*     </head>*/
/*     {% block bod %}{% endblock %}*/
/*     {% block javascripts %}{% endblock %}*/
/*     </body>*/
/* </html>*/
/* */
