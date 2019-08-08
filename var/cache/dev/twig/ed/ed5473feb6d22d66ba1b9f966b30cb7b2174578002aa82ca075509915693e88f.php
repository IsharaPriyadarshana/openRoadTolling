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

/* main/index.html.twig */
class __TwigTemplate_a03a85dce2b66abec65201d2288bb7e828c06bd47db1179160cc0d43a69bbaf7 extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "main.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/index.html.twig"));

        $this->parent = $this->loadTemplate("main.html.twig", "main/index.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 3
    public function block_title($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome to Open Road Tolling Web Platform";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 5
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 6
        echo "

    <!-- Header -->
    <header>
        <div class=\"header-content\">
            <div class=\"header-content-inner\">
                <h1>Open Road Tolling</h1>
                <p>Drive Freely on Your Way, Pay at Your Fingertips</p>
                <a href=\"";
        // line 14
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("register");
        echo "\" class=\"btn btn-success btn-lg\">Signup Now</a>
            </div>
        </div>
    </header>

    <!-- Intro Section -->
    <section class=\"intro\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-8 col-lg-offset-2\">
                    <span class=\"glyphicon glyphicon-road\" style=\"font-size: 60px\"></span>
                    <h2 class=\"section-heading\">Save your time. Extract maximum from technology</h2>
                    <p class=\"text-light\">Now you can simply signup to our open road tolling system and enjoy the benefit of electronic tolling through your mobile phone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content 1 -->
    <section class=\"content\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-6\">
                    <img class=\"img-responsive img-circle center-block\" src=\"images/microphone.jpg\" alt=\"\">
                </div>
                <div class=\"col-sm-6\">
                    <h2 class=\"section-header\">No Long Queues</h2>
                    <p class=\"lead text-muted\">Our novel Open Road Tolling System is designed to drive you through the toll plaza without stopping by. Now you don't want to get headaches rotting in the queues.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Content 2 -->
    <section class=\"content content-2\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-6\">
                    <h2 class=\"section-header\">Easy Use</h2>
                    <p class=\"lead text-light\">All you need is your smartphone to register and use the system. Then download the mobile app to pay and drive through freely like a bird.</p>
                </div>
                <div class=\"col-sm-6\">
                    <img class=\"img-responsive img-circle center-block\" src=\"images/iphone.jpg\" alt=\"\">
                </div>

            </div>
        </div>
    </section>

    <!-- Promos -->
    <div class=\"container-fluid\">
        <div class=\"row promo\">
            <a >
                <div class=\"col-md-4 promo-item item-1\">
                    <h3>
                        Register
                    </h3>
                </div>
            </a>
            <a >
                <div class=\"col-md-4 promo-item item-2\">
                    <h3>
                        Download
                    </h3>
                </div>
            </a>

            <a >
                <div class=\"col-md-4 promo-item item-3\">
                    <h3>
                        Enjoy
                    </h3>
                </div>
            </a>
        </div>
    </div><!-- /.container-fluid -->

    <!-- Content 3 -->
    <section class=\"content content-3\">
        <div class=\"container\">
            <h2 class=\"section-header\"><span class=\"glyphicon glyphicon-download-alt text-primary\"></span><br> Download Mobile App</h2>
            <p class=\"lead text-muted\">Download our moblie application now and make your driving more comfortable </p>
            <a href=\"#\" class=\"btn btn-primary btn-lg\">Download</a>
        </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class=\"page-footer\">

        <!-- Contact Us -->
        <div class=\"contact\">
            <div class=\"container\">
                <h2 class=\"section-heading\">Contact Us</h2>
                <p><span class=\"glyphicon glyphicon-earphone\"></span><br> +94 (71) 385 8264</p>
                <p><span class=\"glyphicon glyphicon-envelope\"></span><br> textishara@gmail.com</p>
            </div>
        </div>

        <!-- Copyright etc -->
        <div class=\"small-print\">
            <div class=\"container\">
                <p>Copyright &copy; etc.com 2019</p>
            </div>
        </div>

    </footer>

    <!-- jQuery -->
    <script src=\"js/jquery-1.11.3.min.js\"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=\"js/bootstrap.min.js\"></script>

    <!-- Plugin JavaScript -->
    <script src=\"js/jquery.easing.min.js\"></script>

    <!-- Custom Javascript -->
    <script src=\"js/custom.js\"></script>

";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

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
        return array (  94 => 14,  84 => 6,  75 => 5,  57 => 3,  35 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'main.html.twig' %}

{% block title %}Welcome to Open Road Tolling Web Platform{% endblock %}

{% block body %}


    <!-- Header -->
    <header>
        <div class=\"header-content\">
            <div class=\"header-content-inner\">
                <h1>Open Road Tolling</h1>
                <p>Drive Freely on Your Way, Pay at Your Fingertips</p>
                <a href=\"{{ path('register') }}\" class=\"btn btn-success btn-lg\">Signup Now</a>
            </div>
        </div>
    </header>

    <!-- Intro Section -->
    <section class=\"intro\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-lg-8 col-lg-offset-2\">
                    <span class=\"glyphicon glyphicon-road\" style=\"font-size: 60px\"></span>
                    <h2 class=\"section-heading\">Save your time. Extract maximum from technology</h2>
                    <p class=\"text-light\">Now you can simply signup to our open road tolling system and enjoy the benefit of electronic tolling through your mobile phone.</p>
                </div>
            </div>
        </div>
    </section>

    <!-- Content 1 -->
    <section class=\"content\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-6\">
                    <img class=\"img-responsive img-circle center-block\" src=\"images/microphone.jpg\" alt=\"\">
                </div>
                <div class=\"col-sm-6\">
                    <h2 class=\"section-header\">No Long Queues</h2>
                    <p class=\"lead text-muted\">Our novel Open Road Tolling System is designed to drive you through the toll plaza without stopping by. Now you don't want to get headaches rotting in the queues.</p>
                </div>

            </div>
        </div>
    </section>

    <!-- Content 2 -->
    <section class=\"content content-2\">
        <div class=\"container\">
            <div class=\"row\">
                <div class=\"col-sm-6\">
                    <h2 class=\"section-header\">Easy Use</h2>
                    <p class=\"lead text-light\">All you need is your smartphone to register and use the system. Then download the mobile app to pay and drive through freely like a bird.</p>
                </div>
                <div class=\"col-sm-6\">
                    <img class=\"img-responsive img-circle center-block\" src=\"images/iphone.jpg\" alt=\"\">
                </div>

            </div>
        </div>
    </section>

    <!-- Promos -->
    <div class=\"container-fluid\">
        <div class=\"row promo\">
            <a >
                <div class=\"col-md-4 promo-item item-1\">
                    <h3>
                        Register
                    </h3>
                </div>
            </a>
            <a >
                <div class=\"col-md-4 promo-item item-2\">
                    <h3>
                        Download
                    </h3>
                </div>
            </a>

            <a >
                <div class=\"col-md-4 promo-item item-3\">
                    <h3>
                        Enjoy
                    </h3>
                </div>
            </a>
        </div>
    </div><!-- /.container-fluid -->

    <!-- Content 3 -->
    <section class=\"content content-3\">
        <div class=\"container\">
            <h2 class=\"section-header\"><span class=\"glyphicon glyphicon-download-alt text-primary\"></span><br> Download Mobile App</h2>
            <p class=\"lead text-muted\">Download our moblie application now and make your driving more comfortable </p>
            <a href=\"#\" class=\"btn btn-primary btn-lg\">Download</a>
        </div>
        </div>
    </section>

    <!-- Footer -->
    <footer class=\"page-footer\">

        <!-- Contact Us -->
        <div class=\"contact\">
            <div class=\"container\">
                <h2 class=\"section-heading\">Contact Us</h2>
                <p><span class=\"glyphicon glyphicon-earphone\"></span><br> +94 (71) 385 8264</p>
                <p><span class=\"glyphicon glyphicon-envelope\"></span><br> textishara@gmail.com</p>
            </div>
        </div>

        <!-- Copyright etc -->
        <div class=\"small-print\">
            <div class=\"container\">
                <p>Copyright &copy; etc.com 2019</p>
            </div>
        </div>

    </footer>

    <!-- jQuery -->
    <script src=\"js/jquery-1.11.3.min.js\"></script>

    <!-- Bootstrap Core JavaScript -->
    <script src=\"js/bootstrap.min.js\"></script>

    <!-- Plugin JavaScript -->
    <script src=\"js/jquery.easing.min.js\"></script>

    <!-- Custom Javascript -->
    <script src=\"js/custom.js\"></script>

{% endblock %}
", "main/index.html.twig", "/home/ishara/lampstack-7.1.29-0/apache2/htdocs/openRoadTolling/templates/main/index.html.twig");
    }
}
