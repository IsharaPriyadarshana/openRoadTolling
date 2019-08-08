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

/* register/index.html.twig */
class __TwigTemplate_34f59a748ea3c9ae9205ea04aa0bfb7427ed07e3b096607c8dcb2bb94977853f extends \Twig\Template
{
    private $source;

    public function __construct(Environment $env)
    {
        parent::__construct($env);

        $this->source = $this->getSourceContext();

        $this->blocks = [
            'title' => [$this, 'block_title'],
            'refHome' => [$this, 'block_refHome'],
            'stylesheets' => [$this, 'block_stylesheets'],
            'body' => [$this, 'block_body'],
            'javascripts' => [$this, 'block_javascripts'],
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "register/index.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "register/index.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "register/index.html.twig", 1);
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

        echo "Register";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 4
    public function block_refHome($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "refHome"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "refHome"));

        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("main");
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 6
    public function block_stylesheets($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "stylesheets"));

        // line 7
        echo "     <style>

         img {
             width: 50%;
             height: auto;
             max-width: 50%;
             display: block;
             margin-left: auto;
             margin-right: auto;

         }



     </style>

 ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 27
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 28
        echo "
    <div class=\"container\" style=\" margin-left: auto;margin-right: auto;margin-top: 1cm;\" >
        <div class=\"row\">
";
        // line 32
        echo "            <div class=\"col-lg-10\">
                <div class=\"card\" style=\"width: 50rem;text-align: center;\">
                    <div class=\"card-body\">
                        <h3 class=\"card-title float-left\">Register</h3>
                        <div style=\"margin-top: 2cm;\">
                            <p class=\"card-text\">

                            ";
        // line 39
        if (((isset($context["errorCode"]) || array_key_exists("errorCode", $context) ? $context["errorCode"] : (function () { throw new RuntimeError('Variable "errorCode" does not exist.', 39, $this->source); })()) != "")) {
            // line 40
            echo "                            <div class=\"alert alert-danger\" role=\"alert\" >
                                ";
            // line 41
            echo twig_escape_filter($this->env, (isset($context["errorCode"]) || array_key_exists("errorCode", $context) ? $context["errorCode"] : (function () { throw new RuntimeError('Variable "errorCode" does not exist.', 41, $this->source); })()), "html", null, true);
            echo "
                            </div>
                            ";
        }
        // line 44
        echo "

                            ";
        // line 46
        echo         $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->renderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 46, $this->source); })()), 'form_start');
        echo "
                                <div id=\"register\">
                                    <div class=\"container\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-5\">
                                                ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "firstName", [], "any", false, false, false, 51), 'errors');
        echo "
                                                ";
        // line 52
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 52, $this->source); })()), "firstName", [], "any", false, false, false, 52), 'widget');
        echo "
                                            </div>
                                            <div class=\"col-sm-2\"></div>
                                            <div class=\"col-sm-5\">
                                                ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "lastName", [], "any", false, false, false, 56), 'errors');
        echo "
                                                ";
        // line 57
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 57, $this->source); })()), "lastName", [], "any", false, false, false, 57), 'widget');
        echo "
                                            </div>
                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>

                                        <div class=\"row\">
                                            <div class=\"col-sm-6\">
                                                ";
        // line 65
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 65, $this->source); })()), "email", [], "any", false, false, false, 65), 'errors');
        echo "
                                                ";
        // line 66
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 66, $this->source); })()), "email", [], "any", false, false, false, 66), 'widget', ["required" => true]);
        echo "
                                            </div>
                                            <div class=\"col-sm-1\"></div>
                                            <div class=\"col-sm-5\">

                                                    ";
        // line 71
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "idNumber", [], "any", false, false, false, 71), 'errors');
        echo "
                                                    <input type=\"text\"  id=\"register_idNumber\" placeholder=\"NIC Number\" onkeypress=\"isInputNumber(event)\" pattern=\"^[0-9]{9}[a-zA-Z]\$\" value=\"";
        // line 72
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 72, $this->source); })()), "idNumber", [], "any", false, false, false, 72), "vars", [], "any", false, false, false, 72), "value", [], "any", false, false, false, 72), "html", null, true);
        echo "\" name=\"register[idNumber]\" required=\"required\" class=\"form-control\" \" />                                                    <div class=\"input-group-append\">

                                                </div>
                                            </div>
                                        </div>


                                        <div style=\"margin-top: 0.5cm;\"></div>

                                        <div class=\"row\">
                                            <div class=\"col-sm-5\">
                                                <div style=\"margin-top: 0.5cm;\"></div>
                                                ";
        // line 84
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), "phoneNumber", [], "any", false, false, false, 84), 'errors');
        echo "
                                                <input type=\"tel\" id=\"register_phoneNumber\" value=\"";
        // line 85
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 85, $this->source); })()), "phoneNumber", [], "any", false, false, false, 85), "vars", [], "any", false, false, false, 85), "value", [], "any", false, false, false, 85), "html", null, true);
        echo "\" name=\"register[phoneNumber]\" onkeypress=\"isPhone(event)\" required=\"required\" placeholder=\"Phone Number\" class=\"form-control\" pattern=\"^[0-9]{10}\$\" />
                                            </div>
                                            <div class=\"col-sm-2\"></div>
                                            <div class=\"co-sm-3\" >
                                                <img src=\"/images/uploadPhoto.png\" id=\"imageUploaded\" class=\"card-img-top\" alt=\"login\" style=\"height: 50px;width: 120px;float: right;float: bottom\">
                                            </div>
                                            <div class=\"col-sm-1\">
                                                <button type=\"button\" id=\"customUploadButton\" class=\"btn btn-outline-primary\" style=\"float: bottom;margin-top: 0.25cm\">Photo</button>
                                            </div>

                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div class=\"row\" >
                                            <div class=\"col-sm-7\">
                                                ";
        // line 100
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 100, $this->source); })()), "address", [], "any", false, false, false, 100), 'errors');
        echo "
                                                ";
        // line 101
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 101, $this->source); })()), "address", [], "any", false, false, false, 101), 'widget');
        echo "
                                            </div>
                                            <div class=\"col-sm-1\" hidden=\"hidden\">
                                                ";
        // line 104
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 104, $this->source); })()), "image", [], "any", false, false, false, 104), 'widget');
        echo "
                                            </div>

                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div id=\"register_password\">
                                            <div class=\"form-group row\">
                                                ";
        // line 112
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 112, $this->source); })()), "password", [], "any", false, false, false, 112));
        foreach ($context['_seq'] as $context["_key"] => $context["passwordField"]) {
            // line 113
            echo "                                                <div class=\"col-sm-5\">
                                                    ";
            // line 114
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["passwordField"], 'errors', ["required" => true]);
            echo "
                                                    ";
            // line 115
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["passwordField"], 'widget', ["required" => true]);
            echo "
                                                </div>
                                                <div class=\"col-sm-2\"></div>
                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['passwordField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 119
        echo "
                                        </div>
                                            <div style=\"margin-top: 0.5cm;\"></div>
                                            <div class=\"row\">
                                                <div class=\"col-sm-10\">
                                                    <p>
                                                        <a class=\"btn btn-primary\" data-toggle=\"collapse\" href=\"#collapseVehicle\" style=\"float: left\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                                            Add Vehicles
                                                        </a>

                                                    </p>

                                                </div>
                                            </div>
                                            <div class=\"row\">

                                                    <div class=\"collapse\" style=\"float: left\" id=\"collapseVehicle\">
                                                        <div class=\"card card-body\">
                                                            <div class=\"row\">
                                                                <div class=\"col-lg-5\">
                                                                    <input type=\"text\" class=\"form-control\" id=\"register_vehicleNo\" aria-describedby=\"emailHelp\" placeholder=\"Vehicle No\" >
                                                                </div>

                                                                <div class=\"col-lg-4\">
                                                                    <select class=\"custom-select\" id=\"vehicleClassSelect\">
                                                                        <option selected>Vehicle Class</option>
                                                                        ";
        // line 145
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["vehicleClasses"]) || array_key_exists("vehicleClasses", $context) ? $context["vehicleClasses"] : (function () { throw new RuntimeError('Variable "vehicleClasses" does not exist.', 145, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["vehicleClass"]) {
            // line 146
            echo "                                                                        <option>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicleClass"], "className", [], "any", false, false, false, 146), "html", null, true);
            echo "</option>
                                                                        ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vehicleClass'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 148
        echo "                                                                    </select>
                                                                </div>
                                                                <div class=\"col-lg-2\" style=\"float: left;\">
                                                                    <button type=\"button\" id=\"addVehicleButton\" class=\"btn btn-primary\">Add</button>
                                                                </div>



                                                            </div>
                                                            <div style=\"margin-top: 0.5cm;\"></div>
                                                            <div class=\"row\">
                                                                <div class=\"col-lg-8\">
                                                                    <div class=\"form-group\">
                                                                        <label for=\"registeredVehicles\">Vehicles Registered on the System</label>
                                                                        <select multiple class=\"form-control\" id=\"registeredVehicles\" name=\"vehicles[]\">

                                                                        </select>
                                                                    </div>
                                                                    <div class=\"col-lg-2\" style=\"float: right;\">
                                                                        <button type=\"button\" id=\"removeVehicleButton\" class=\"btn btn-primary\">Remove</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>




                                            <div style=\"margin-top: 0.5cm;\"></div>
                                            <div class=\"row\">
                                                <div class=\"col-sm-10\">
                                                    <p>
                                                        <a class=\"btn btn-primary\" data-toggle=\"collapse\" href=\"#collapseAccount\" style=\"float: left\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                                            Add Account
                                                        </a>

                                                    </p>

                                                </div>
                                            </div>
                                            <div class=\"row\">

                                                <div class=\"collapse\" style=\"float: left\" id=\"collapseAccount\">
                                                    <div class=\"card card-body\">
                                                        <div class=\"row\">
                                                            <div class=\"col-lg-5\">
                                                                <input type=\"text\" class=\"form-control\" id=\"register_accountNo\" aria-describedby=\"emailHelp\" placeholder=\"Account No\" name=\"account[accountNo]\" >
                                                            </div>
                                                            <div class=\"col-lg-5\">
                                                                <input type=\"text\" class=\"form-control\" id=\"register_ownerName\" aria-describedby=\"emailHelp\" placeholder=\"Owner Name\" name=\"account[ownerName]\" >
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>

                                            </div>




                                    </div>
                                    </div>


                                ";
        // line 218
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 218, $this->source); })()), "save", [], "any", false, false, false, 218), 'widget');
        echo "

                                ";
        // line 220
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 220, $this->source); })()), "_token", [], "any", false, false, false, 220), 'row');
        echo "
                                    ";
        // line 221
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 221, $this->source); })()), 'errors');
        echo "

                            </form>



                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-lg-1\"></div>
        </div>

    </div>




";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 242
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 243
        echo "  <script>
    const fileUpload = document.getElementById('register_image');
    const uploadButton = document.getElementById('customUploadButton');
    const imageBox = document.getElementById('imageUploaded');
    const fname = document.getElementById(\"register_firstName\");


    uploadButton.addEventListener(\"click\",function () {
        fileUpload.click();
    });

  </script>
      <script>
          \$(function(){
              \$('#register_image').change(function(){
                  var input = this;
                  var url = \$(this).val();
                  var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                  if (input.files && input.files[0]&& (ext == \"gif\" || ext == \"png\" || ext == \"jpeg\" || ext == \"jpg\"))
                  {
                      var reader = new FileReader();

                      reader.onload = function (e) {
                          \$('#imageUploaded').attr('src', e.target.result);
                      }
                      reader.readAsDataURL(input.files[0]);
                  }
                  else
                  {
                      \$('#imageUploaded').attr('src', '/images/uploadPhoto.png');
                  }
              });

          });
      </script>

<script>
function isInputNumber(eve) {
    var ch = String.fromCharCode(eve.which);

    if (document.getElementById('register_idNumber').value.length < 9){
        if (!(/[0-9]/.test(ch))){
            eve.preventDefault();
        }
    }else {
        if (!(/[a-zA-Z]/.test(ch))){
            eve.preventDefault();
        }
    }

    if (document.getElementById('register_idNumber').value.length > 9){
        eve.preventDefault();
    }
}
function isPhone(eve) {
    var ch = String.fromCharCode(eve.which);

    if (!(/[0-9]/.test(ch))){
        eve.preventDefault();
    }
    if (document.getElementById('register_phoneNumber').value.length > 9){
        eve.preventDefault();
    }
}


</script>

      <script>
          // document.addEventListener(\"DOMContentLoaded\", function() {
          //     const modalButton = document.getElementById('modalButton');
          //     const modalButton2 = document.getElementById('modalButton2');
          //     const errorLabel = document.getElementById('errorLabel');
          //     if (errorLabel.textContent==1){
          //         modalButton.click();
          //     }
          //     if(errorLabel.textContent==2){
          //         modalButton2.click();
          //     }
          //
          // });





      </script>

      <script>
          const addVehicleButton = document.getElementById('addVehicleButton');
          const vehicleNo = document.getElementById('register_vehicleNo');
          const vehicleClass = document.getElementById('vehicleClassSelect');
          const addedVehicles = document.getElementById('registeredVehicles');
          const removeVehicleButton = document.getElementById('removeVehicleButton');
          addVehicleButton.addEventListener(\"click\", function () {
              if(vehicleClass.value != \"Vehicle Class\"){
                  var opt = document.createElement('option');
                  opt.value = vehicleNo.value + \"        |        \" + vehicleClass.value ;
                  opt.innerHTML = vehicleNo.value + \"        |        \" + vehicleClass.value;
                  var existingOptions = addedVehicles.options;
                  var isExist = false;

                  for(var i=0;i<existingOptions.length;i++){
                      if(existingOptions[i].value == opt.value){
                          isExist = true;
                      }
                  }


                if(isExist == false){
                    addedVehicles.appendChild(opt);

                    var input = document.createElement(\"input\");

                    input.setAttribute(\"type\", \"hidden\");

                    input.setAttribute(\"name\", \"vehicles[\"+addedVehicles.length +\"]\");
                    input.setAttribute(\"id\", \"vehicles[\"+addedVehicles.length +\"]\");

                    input.setAttribute(\"value\", vehicleNo.value + \"        |        \" + vehicleClass.value);
                    addedVehicles.appendChild(input);
                }
              }

          });
          removeVehicleButton.addEventListener(\"click\",function () {
             try{
                 var options = addedVehicles.getElementsByTagName('OPTION');
                 document.getElementById( \"vehicles[\"+(addedVehicles.selectedIndex+1)+\"]\").remove();
                 addedVehicles.removeChild(options[addedVehicles.selectedIndex]);

             }catch (e) {

             }
          });
      </script>

  ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    public function getTemplateName()
    {
        return "register/index.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  459 => 243,  450 => 242,  420 => 221,  416 => 220,  411 => 218,  339 => 148,  330 => 146,  326 => 145,  298 => 119,  288 => 115,  284 => 114,  281 => 113,  277 => 112,  266 => 104,  260 => 101,  256 => 100,  238 => 85,  234 => 84,  219 => 72,  215 => 71,  207 => 66,  203 => 65,  192 => 57,  188 => 56,  181 => 52,  177 => 51,  169 => 46,  165 => 44,  159 => 41,  156 => 40,  154 => 39,  145 => 32,  140 => 28,  131 => 27,  105 => 7,  96 => 6,  78 => 4,  60 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Register{% endblock %}
{% block refHome %}{{ path('main') }}{% endblock %}

 {% block stylesheets %}
     <style>

         img {
             width: 50%;
             height: auto;
             max-width: 50%;
             display: block;
             margin-left: auto;
             margin-right: auto;

         }



     </style>

 {% endblock %}



{% block body %}

    <div class=\"container\" style=\" margin-left: auto;margin-right: auto;margin-top: 1cm;\" >
        <div class=\"row\">
{#            <div class=\"col-lg-2\"></div>#}
            <div class=\"col-lg-10\">
                <div class=\"card\" style=\"width: 50rem;text-align: center;\">
                    <div class=\"card-body\">
                        <h3 class=\"card-title float-left\">Register</h3>
                        <div style=\"margin-top: 2cm;\">
                            <p class=\"card-text\">

                            {% if(errorCode !=\"\") %}
                            <div class=\"alert alert-danger\" role=\"alert\" >
                                {{ errorCode }}
                            </div>
                            {% endif %}


                            {{ form_start(form) }}
                                <div id=\"register\">
                                    <div class=\"container\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-5\">
                                                {{ form_errors(form.firstName) }}
                                                {{ form_widget(form.firstName) }}
                                            </div>
                                            <div class=\"col-sm-2\"></div>
                                            <div class=\"col-sm-5\">
                                                {{ form_errors(form.lastName) }}
                                                {{ form_widget(form.lastName) }}
                                            </div>
                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>

                                        <div class=\"row\">
                                            <div class=\"col-sm-6\">
                                                {{ form_errors(form.email) }}
                                                {{ form_widget(form.email,{'required': true}) }}
                                            </div>
                                            <div class=\"col-sm-1\"></div>
                                            <div class=\"col-sm-5\">

                                                    {{ form_errors(form.idNumber) }}
                                                    <input type=\"text\"  id=\"register_idNumber\" placeholder=\"NIC Number\" onkeypress=\"isInputNumber(event)\" pattern=\"^[0-9]{9}[a-zA-Z]\$\" value=\"{{ form.idNumber.vars.value }}\" name=\"register[idNumber]\" required=\"required\" class=\"form-control\" \" />                                                    <div class=\"input-group-append\">

                                                </div>
                                            </div>
                                        </div>


                                        <div style=\"margin-top: 0.5cm;\"></div>

                                        <div class=\"row\">
                                            <div class=\"col-sm-5\">
                                                <div style=\"margin-top: 0.5cm;\"></div>
                                                {{ form_errors(form.phoneNumber) }}
                                                <input type=\"tel\" id=\"register_phoneNumber\" value=\"{{ form.phoneNumber.vars.value }}\" name=\"register[phoneNumber]\" onkeypress=\"isPhone(event)\" required=\"required\" placeholder=\"Phone Number\" class=\"form-control\" pattern=\"^[0-9]{10}\$\" />
                                            </div>
                                            <div class=\"col-sm-2\"></div>
                                            <div class=\"co-sm-3\" >
                                                <img src=\"/images/uploadPhoto.png\" id=\"imageUploaded\" class=\"card-img-top\" alt=\"login\" style=\"height: 50px;width: 120px;float: right;float: bottom\">
                                            </div>
                                            <div class=\"col-sm-1\">
                                                <button type=\"button\" id=\"customUploadButton\" class=\"btn btn-outline-primary\" style=\"float: bottom;margin-top: 0.25cm\">Photo</button>
                                            </div>

                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div class=\"row\" >
                                            <div class=\"col-sm-7\">
                                                {{ form_errors(form.address) }}
                                                {{ form_widget(form.address) }}
                                            </div>
                                            <div class=\"col-sm-1\" hidden=\"hidden\">
                                                {{ form_widget(form.image) }}
                                            </div>

                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div id=\"register_password\">
                                            <div class=\"form-group row\">
                                                {% for passwordField in form.password %}
                                                <div class=\"col-sm-5\">
                                                    {{ form_errors(passwordField,{'required': true}) }}
                                                    {{ form_widget(passwordField,{'required': true}) }}
                                                </div>
                                                <div class=\"col-sm-2\"></div>
                                                {% endfor %}

                                        </div>
                                            <div style=\"margin-top: 0.5cm;\"></div>
                                            <div class=\"row\">
                                                <div class=\"col-sm-10\">
                                                    <p>
                                                        <a class=\"btn btn-primary\" data-toggle=\"collapse\" href=\"#collapseVehicle\" style=\"float: left\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                                            Add Vehicles
                                                        </a>

                                                    </p>

                                                </div>
                                            </div>
                                            <div class=\"row\">

                                                    <div class=\"collapse\" style=\"float: left\" id=\"collapseVehicle\">
                                                        <div class=\"card card-body\">
                                                            <div class=\"row\">
                                                                <div class=\"col-lg-5\">
                                                                    <input type=\"text\" class=\"form-control\" id=\"register_vehicleNo\" aria-describedby=\"emailHelp\" placeholder=\"Vehicle No\" >
                                                                </div>

                                                                <div class=\"col-lg-4\">
                                                                    <select class=\"custom-select\" id=\"vehicleClassSelect\">
                                                                        <option selected>Vehicle Class</option>
                                                                        {% for vehicleClass in vehicleClasses %}
                                                                        <option>{{ vehicleClass.className }}</option>
                                                                        {% endfor %}
                                                                    </select>
                                                                </div>
                                                                <div class=\"col-lg-2\" style=\"float: left;\">
                                                                    <button type=\"button\" id=\"addVehicleButton\" class=\"btn btn-primary\">Add</button>
                                                                </div>



                                                            </div>
                                                            <div style=\"margin-top: 0.5cm;\"></div>
                                                            <div class=\"row\">
                                                                <div class=\"col-lg-8\">
                                                                    <div class=\"form-group\">
                                                                        <label for=\"registeredVehicles\">Vehicles Registered on the System</label>
                                                                        <select multiple class=\"form-control\" id=\"registeredVehicles\" name=\"vehicles[]\">

                                                                        </select>
                                                                    </div>
                                                                    <div class=\"col-lg-2\" style=\"float: right;\">
                                                                        <button type=\"button\" id=\"removeVehicleButton\" class=\"btn btn-primary\">Remove</button>
                                                                    </div>
                                                                </div>
                                                            </div>
                                                        </div>
                                                    </div>

                                            </div>




                                            <div style=\"margin-top: 0.5cm;\"></div>
                                            <div class=\"row\">
                                                <div class=\"col-sm-10\">
                                                    <p>
                                                        <a class=\"btn btn-primary\" data-toggle=\"collapse\" href=\"#collapseAccount\" style=\"float: left\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                                            Add Account
                                                        </a>

                                                    </p>

                                                </div>
                                            </div>
                                            <div class=\"row\">

                                                <div class=\"collapse\" style=\"float: left\" id=\"collapseAccount\">
                                                    <div class=\"card card-body\">
                                                        <div class=\"row\">
                                                            <div class=\"col-lg-5\">
                                                                <input type=\"text\" class=\"form-control\" id=\"register_accountNo\" aria-describedby=\"emailHelp\" placeholder=\"Account No\" name=\"account[accountNo]\" >
                                                            </div>
                                                            <div class=\"col-lg-5\">
                                                                <input type=\"text\" class=\"form-control\" id=\"register_ownerName\" aria-describedby=\"emailHelp\" placeholder=\"Owner Name\" name=\"account[ownerName]\" >
                                                            </div>


                                                        </div>

                                                    </div>
                                                </div>

                                            </div>




                                    </div>
                                    </div>


                                {{ form_widget(form.save) }}

                                {{ form_row(form._token) }}
                                    {{ form_errors(form) }}

                            </form>



                            </p>
                        </div>
                    </div>
                </div>
            </div>
            <div class=\"col-lg-1\"></div>
        </div>

    </div>




{% endblock %}

  {% block javascripts %}
  <script>
    const fileUpload = document.getElementById('register_image');
    const uploadButton = document.getElementById('customUploadButton');
    const imageBox = document.getElementById('imageUploaded');
    const fname = document.getElementById(\"register_firstName\");


    uploadButton.addEventListener(\"click\",function () {
        fileUpload.click();
    });

  </script>
      <script>
          \$(function(){
              \$('#register_image').change(function(){
                  var input = this;
                  var url = \$(this).val();
                  var ext = url.substring(url.lastIndexOf('.') + 1).toLowerCase();
                  if (input.files && input.files[0]&& (ext == \"gif\" || ext == \"png\" || ext == \"jpeg\" || ext == \"jpg\"))
                  {
                      var reader = new FileReader();

                      reader.onload = function (e) {
                          \$('#imageUploaded').attr('src', e.target.result);
                      }
                      reader.readAsDataURL(input.files[0]);
                  }
                  else
                  {
                      \$('#imageUploaded').attr('src', '/images/uploadPhoto.png');
                  }
              });

          });
      </script>

<script>
function isInputNumber(eve) {
    var ch = String.fromCharCode(eve.which);

    if (document.getElementById('register_idNumber').value.length < 9){
        if (!(/[0-9]/.test(ch))){
            eve.preventDefault();
        }
    }else {
        if (!(/[a-zA-Z]/.test(ch))){
            eve.preventDefault();
        }
    }

    if (document.getElementById('register_idNumber').value.length > 9){
        eve.preventDefault();
    }
}
function isPhone(eve) {
    var ch = String.fromCharCode(eve.which);

    if (!(/[0-9]/.test(ch))){
        eve.preventDefault();
    }
    if (document.getElementById('register_phoneNumber').value.length > 9){
        eve.preventDefault();
    }
}


</script>

      <script>
          // document.addEventListener(\"DOMContentLoaded\", function() {
          //     const modalButton = document.getElementById('modalButton');
          //     const modalButton2 = document.getElementById('modalButton2');
          //     const errorLabel = document.getElementById('errorLabel');
          //     if (errorLabel.textContent==1){
          //         modalButton.click();
          //     }
          //     if(errorLabel.textContent==2){
          //         modalButton2.click();
          //     }
          //
          // });





      </script>

      <script>
          const addVehicleButton = document.getElementById('addVehicleButton');
          const vehicleNo = document.getElementById('register_vehicleNo');
          const vehicleClass = document.getElementById('vehicleClassSelect');
          const addedVehicles = document.getElementById('registeredVehicles');
          const removeVehicleButton = document.getElementById('removeVehicleButton');
          addVehicleButton.addEventListener(\"click\", function () {
              if(vehicleClass.value != \"Vehicle Class\"){
                  var opt = document.createElement('option');
                  opt.value = vehicleNo.value + \"        |        \" + vehicleClass.value ;
                  opt.innerHTML = vehicleNo.value + \"        |        \" + vehicleClass.value;
                  var existingOptions = addedVehicles.options;
                  var isExist = false;

                  for(var i=0;i<existingOptions.length;i++){
                      if(existingOptions[i].value == opt.value){
                          isExist = true;
                      }
                  }


                if(isExist == false){
                    addedVehicles.appendChild(opt);

                    var input = document.createElement(\"input\");

                    input.setAttribute(\"type\", \"hidden\");

                    input.setAttribute(\"name\", \"vehicles[\"+addedVehicles.length +\"]\");
                    input.setAttribute(\"id\", \"vehicles[\"+addedVehicles.length +\"]\");

                    input.setAttribute(\"value\", vehicleNo.value + \"        |        \" + vehicleClass.value);
                    addedVehicles.appendChild(input);
                }
              }

          });
          removeVehicleButton.addEventListener(\"click\",function () {
             try{
                 var options = addedVehicles.getElementsByTagName('OPTION');
                 document.getElementById( \"vehicles[\"+(addedVehicles.selectedIndex+1)+\"]\").remove();
                 addedVehicles.removeChild(options[addedVehicles.selectedIndex]);

             }catch (e) {

             }
          });
      </script>

  {% endblock %}
", "register/index.html.twig", "/home/ishara/lampstack-7.1.29-0/apache2/htdocs/openRoadTolling/templates/register/index.html.twig");
    }
}
