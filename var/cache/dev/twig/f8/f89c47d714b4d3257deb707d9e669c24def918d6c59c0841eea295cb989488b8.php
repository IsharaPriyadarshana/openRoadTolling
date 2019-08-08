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

/* main/home.html.twig */
class __TwigTemplate_ca306a61c2973e74e59285f8eaf32ea3cf5a4345380c94965957deeb6d810f9e extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
        ];
    }

    protected function doGetParent(array $context)
    {
        // line 1
        return "base.html.twig";
    }

    protected function doDisplay(array $context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/home.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "main/home.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "main/home.html.twig", 1);
        $this->parent->display($context, array_merge($this->blocks, $blocks));
        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

    }

    // line 2
    public function block_title($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "title"));

        echo "Welcome- Open Rpoad Tolling!";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 4
    public function block_stylesheets($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 5
        echo "    <style>
        body{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }
        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .profile-edit-btn:hover{
                     color: #FFF;
                     background: rgb(240, 173, 78, 0.75);
                     /*border: 2px solid rgba(240, 173, 78, 0.75);*/
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }
    </style>


 ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 112
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 113
        echo "    <div class=\"container emp-profile\">
        <form action=\"";
        // line 114
        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("changeImage");
        echo "\" name=\"changeProfilePhoto\" id=\"changeImageForm\" method=\"post\" enctype=\"multipart/form-data\" >
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"profile-img\">
                        <img src=\"";
        // line 118
        echo twig_escape_filter($this->env, (isset($context["photoSrc"]) || array_key_exists("photoSrc", $context) ? $context["photoSrc"] : (function () { throw new RuntimeError('Variable "photoSrc" does not exist.', 118, $this->source); })()), "html", null, true);
        echo "\" alt=\"\"/>
                        <div class=\"file btn btn-lg btn-primary\" id=\"fileUploadButton\">
                            Change Photo
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"profile-head\">
                        <h5>
                            ";
        // line 127
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 127, $this->source); })()), "firstName", [], "any", false, false, false, 127), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 127, $this->source); })()), "lastName", [], "any", false, false, false, 127), "html", null, true);
        echo "
                        </h5>
                        <h6>
                            Expressway Driver
                        </h6>
                        <p class=\"proile-rating\">RANKINGS : <span>4.5</span></p>
                        <ul class=\"nav nav-tabs\" id=\"myTab\" role=\"tablist\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link active\" id=\"home-tab\" data-toggle=\"tab\" href=\"#home\" role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">About</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#vehicles\" role=\"tab\" aria-controls=\"profile\" aria-selected=\"false\">Vehicles</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#account\" role=\"tab\" aria-controls=\"profile\" aria-selected=\"false\">Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=\"col-md-2\">
                    <button type=\"button\" onclick=\"window.location.href = '";
        // line 147
        echo twig_escape_filter($this->env, (isset($context["editProfile"]) || array_key_exists("editProfile", $context) ? $context["editProfile"] : (function () { throw new RuntimeError('Variable "editProfile" does not exist.', 147, $this->source); })()), "html", null, true);
        echo "';\" class=\"profile-edit-btn\" name=\"btnAddMore\" >Edit Profile</button>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"profile-work\">
                        <p>EXTERNAL LINKS</p>
                        <a href=\"\">Download Mobile App</a><br/>
                        <a href=\"\">RDA Homepage</a><br/>
                        <p>INTERNAL LINKS</p>
                        <a href=\"\">How does ETC work</a><br/>
                        <a href=\"\">ETC Rules & Regulations</a><br/>
                        <a href=\"\">How to Pay</a><br/>
                    </div>
                </div>
                <div class=\"col-md-8\">
                    <div class=\"tab-content profile-tab\" id=\"myTabContent\">
                        <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>User Name</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p> ";
        // line 170
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 170, $this->source); })()), "firstName", [], "any", false, false, false, 170), "html", null, true);
        echo " ";
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 170, $this->source); })()), "lastName", [], "any", false, false, false, 170), "html", null, true);
        echo "</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Email</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>";
        // line 178
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 178, $this->source); })()), "email", [], "any", false, false, false, 178), "html", null, true);
        echo "</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>NIC Number</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>";
        // line 186
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 186, $this->source); })()), "idNumber", [], "any", false, false, false, 186), "html", null, true);
        echo "</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Phone</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>";
        // line 194
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 194, $this->source); })()), "phoneNumber", [], "any", false, false, false, 194), "html", null, true);
        echo "</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Address</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>";
        // line 202
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 202, $this->source); })()), "address", [], "any", false, false, false, 202), "html", null, true);
        echo "</p>
                                </div>
                            </div>
                        </div>
                        <div class=\"tab-pane fade\" id=\"vehicles\" role=\"tabpanel\" aria-labelledby=\"profile-tab\">
                            ";
        // line 207
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 207, $this->source); })()), "vehicle", [], "any", false, false, false, 207)) > 0)) {
            // line 208
            echo "                            ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 208, $this->source); })()), "vehicle", [], "any", false, false, false, 208));
            foreach ($context['_seq'] as $context["_key"] => $context["vehicle"]) {
                // line 209
                echo "                                <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <label>Vehicle Number</label>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <p>";
                // line 214
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "vehicleNo", [], "any", false, false, false, 214), "html", null, true);
                echo "</p>
                                    </div>
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <label>Vehicle Class</label>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <p>";
                // line 222
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["vehicle"], "class", [], "any", false, false, false, 222), "className", [], "any", false, false, false, 222), "html", null, true);
                echo "</p>
                                    </div>
                                </div>
                                <div style=\"margin-top: 1cm;\"></div>
                            ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vehicle'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 227
            echo "                            ";
        }
        // line 228
        echo "                        </div>
                        <div class=\"tab-pane fade\" id=\"account\" role=\"tabpanel\" aria-labelledby=\"profile-tab\">
                            ";
        // line 230
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 230, $this->source); })()), "account", [], "any", false, false, false, 230)) > 0)) {
            // line 231
            echo "                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Account Number</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>";
            // line 236
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 236, $this->source); })()), "account", [], "any", false, false, false, 236), "accountNo", [], "any", false, false, false, 236), "html", null, true);
            echo "</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Owner Name</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>";
            // line 244
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 244, $this->source); })()), "account", [], "any", false, false, false, 244), "ownerName", [], "any", false, false, false, 244), "html", null, true);
            echo "</p>
                                </div>
                            </div>
                            ";
        }
        // line 248
        echo "                        </div>
                    </div>
                </div>
            </div>
            <input type=\"file\" id=\"changeImageButton\" name=\"file\" hidden/>
        </form>
    </div>



    <script>
        const changeImgButton = document.getElementById('changeImageButton');
        const fileUploadButton = document.getElementById('fileUploadButton');
        const formHome = document.getElementById('changeImageForm');
        changeImgButton.addEventListener(\"change\",function () {

                formHome.submit();


        });fileUploadButton.addEventListener(\"click\",function () {

            changeImgButton.click();


        });


    </script>
";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "main/home.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  405 => 248,  398 => 244,  387 => 236,  380 => 231,  378 => 230,  374 => 228,  371 => 227,  360 => 222,  349 => 214,  342 => 209,  337 => 208,  335 => 207,  327 => 202,  316 => 194,  305 => 186,  294 => 178,  281 => 170,  255 => 147,  230 => 127,  218 => 118,  211 => 114,  208 => 113,  199 => 112,  85 => 5,  76 => 4,  58 => 2,  36 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends('base.html.twig') %}
{% block title %}Welcome- Open Rpoad Tolling!{% endblock %}

 {% block stylesheets %}
    <style>
        body{
            background: -webkit-linear-gradient(left, #3931af, #00c6ff);
        }
        .emp-profile{
            padding: 3%;
            margin-top: 3%;
            margin-bottom: 3%;
            border-radius: 0.5rem;
            background: #fff;
        }
        .profile-img{
            text-align: center;
        }
        .profile-img img{
            width: 70%;
            height: 100%;
        }
        .profile-img .file {
            position: relative;
            overflow: hidden;
            margin-top: -20%;
            width: 70%;
            border: none;
            border-radius: 0;
            font-size: 15px;
            background: #212529b8;
        }
        .profile-img .file input {
            position: absolute;
            opacity: 0;
            right: 0;
            top: 0;
        }
        .profile-head h5{
            color: #333;
        }
        .profile-head h6{
            color: #0062cc;
        }
        .profile-edit-btn{
            border: none;
            border-radius: 1.5rem;
            width: 70%;
            padding: 2%;
            font-weight: 600;
            color: #6c757d;
            cursor: pointer;
        }
        .profile-edit-btn:hover{
                     color: #FFF;
                     background: rgb(240, 173, 78, 0.75);
                     /*border: 2px solid rgba(240, 173, 78, 0.75);*/
        }
        .proile-rating{
            font-size: 12px;
            color: #818182;
            margin-top: 5%;
        }
        .proile-rating span{
            color: #495057;
            font-size: 15px;
            font-weight: 600;
        }
        .profile-head .nav-tabs{
            margin-bottom:5%;
        }
        .profile-head .nav-tabs .nav-link{
            font-weight:600;
            border: none;
        }
        .profile-head .nav-tabs .nav-link.active{
            border: none;
            border-bottom:2px solid #0062cc;
        }
        .profile-work{
            padding: 14%;
            margin-top: -15%;
        }
        .profile-work p{
            font-size: 12px;
            color: #818182;
            font-weight: 600;
            margin-top: 10%;
        }
        .profile-work a{
            text-decoration: none;
            color: #495057;
            font-weight: 600;
            font-size: 14px;
        }
        .profile-work ul{
            list-style: none;
        }
        .profile-tab label{
            font-weight: 600;
        }
        .profile-tab p{
            font-weight: 600;
            color: #0062cc;
        }
    </style>


 {% endblock %}


{% block body %}
    <div class=\"container emp-profile\">
        <form action=\"{{ path('changeImage') }}\" name=\"changeProfilePhoto\" id=\"changeImageForm\" method=\"post\" enctype=\"multipart/form-data\" >
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"profile-img\">
                        <img src=\"{{ photoSrc }}\" alt=\"\"/>
                        <div class=\"file btn btn-lg btn-primary\" id=\"fileUploadButton\">
                            Change Photo
                        </div>
                    </div>
                </div>
                <div class=\"col-md-6\">
                    <div class=\"profile-head\">
                        <h5>
                            {{ user.firstName }} {{ user.lastName }}
                        </h5>
                        <h6>
                            Expressway Driver
                        </h6>
                        <p class=\"proile-rating\">RANKINGS : <span>4.5</span></p>
                        <ul class=\"nav nav-tabs\" id=\"myTab\" role=\"tablist\">
                            <li class=\"nav-item\">
                                <a class=\"nav-link active\" id=\"home-tab\" data-toggle=\"tab\" href=\"#home\" role=\"tab\" aria-controls=\"home\" aria-selected=\"true\">About</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#vehicles\" role=\"tab\" aria-controls=\"profile\" aria-selected=\"false\">Vehicles</a>
                            </li>
                            <li class=\"nav-item\">
                                <a class=\"nav-link\" id=\"profile-tab\" data-toggle=\"tab\" href=\"#account\" role=\"tab\" aria-controls=\"profile\" aria-selected=\"false\">Account</a>
                            </li>
                        </ul>
                    </div>
                </div>
                <div class=\"col-md-2\">
                    <button type=\"button\" onclick=\"window.location.href = '{{ editProfile }}';\" class=\"profile-edit-btn\" name=\"btnAddMore\" >Edit Profile</button>
                </div>
            </div>
            <div class=\"row\">
                <div class=\"col-md-4\">
                    <div class=\"profile-work\">
                        <p>EXTERNAL LINKS</p>
                        <a href=\"\">Download Mobile App</a><br/>
                        <a href=\"\">RDA Homepage</a><br/>
                        <p>INTERNAL LINKS</p>
                        <a href=\"\">How does ETC work</a><br/>
                        <a href=\"\">ETC Rules & Regulations</a><br/>
                        <a href=\"\">How to Pay</a><br/>
                    </div>
                </div>
                <div class=\"col-md-8\">
                    <div class=\"tab-content profile-tab\" id=\"myTabContent\">
                        <div class=\"tab-pane fade show active\" id=\"home\" role=\"tabpanel\" aria-labelledby=\"home-tab\">
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>User Name</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p> {{ user.firstName }} {{ user.lastName }}</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Email</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>{{ user.email }}</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>NIC Number</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>{{ user.idNumber }}</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Phone</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>{{ user.phoneNumber }}</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Address</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>{{ user.address }}</p>
                                </div>
                            </div>
                        </div>
                        <div class=\"tab-pane fade\" id=\"vehicles\" role=\"tabpanel\" aria-labelledby=\"profile-tab\">
                            {% if(user.vehicle|length >0) %}
                            {% for vehicle in user.vehicle %}
                                <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <label>Vehicle Number</label>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <p>{{ vehicle.vehicleNo}}</p>
                                    </div>
                                </div>
                                <div class=\"row\">
                                    <div class=\"col-md-6\">
                                        <label>Vehicle Class</label>
                                    </div>
                                    <div class=\"col-md-6\">
                                        <p>{{ vehicle.class.className }}</p>
                                    </div>
                                </div>
                                <div style=\"margin-top: 1cm;\"></div>
                            {% endfor %}
                            {% endif %}
                        </div>
                        <div class=\"tab-pane fade\" id=\"account\" role=\"tabpanel\" aria-labelledby=\"profile-tab\">
                            {% if(user.account|length >0) %}
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Account Number</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>{{ user.account.accountNo }}</p>
                                </div>
                            </div>
                            <div class=\"row\">
                                <div class=\"col-md-6\">
                                    <label>Owner Name</label>
                                </div>
                                <div class=\"col-md-6\">
                                    <p>{{ user.account.ownerName }}</p>
                                </div>
                            </div>
                            {% endif %}
                        </div>
                    </div>
                </div>
            </div>
            <input type=\"file\" id=\"changeImageButton\" name=\"file\" hidden/>
        </form>
    </div>



    <script>
        const changeImgButton = document.getElementById('changeImageButton');
        const fileUploadButton = document.getElementById('fileUploadButton');
        const formHome = document.getElementById('changeImageForm');
        changeImgButton.addEventListener(\"change\",function () {

                formHome.submit();


        });fileUploadButton.addEventListener(\"click\",function () {

            changeImgButton.click();


        });


    </script>
{% endblock %}", "main/home.html.twig", "/home/ishara/lampstack-7.1.29-0/apache2/htdocs/openRoadTolling/templates/main/home.html.twig");
    }
}
