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

/* register/update.html.twig */
class __TwigTemplate_64ed9c22960cc7d305453bd3f732bd830c1b1ebfdd1c8f8b78f408d398c9eada extends \Twig\Template
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
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "register/update.html.twig"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "template", "register/update.html.twig"));

        $this->parent = $this->loadTemplate("base.html.twig", "register/update.html.twig", 1);
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

        echo "Edit Info";
        
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

        echo $this->extensions['Symfony\Bridge\Twig\Extension\RoutingExtension']->getPath("home");
        
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
        echo "


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

 ";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 30
    public function block_body($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "body"));

        // line 31
        echo "
    <div class=\"container\" style=\" margin-left: auto;margin-right: auto;margin-top: 1cm;\" >
        <div class=\"row\">
            ";
        // line 35
        echo "            <div class=\"col-lg-10\">
                <div class=\"card\" style=\"width: 50rem;text-align: center;\">
                    <div class=\"card-body\">
                        <h3 class=\"card-title float-left\">Edit Info</h3>
                        <div style=\"margin-top: 2cm;\">
                            <p class=\"card-text\">




                            <form name=\"update\"  method=\"post\">
                                <div id=\"update\">
                                    <div class=\"container\">
                                        <div class=\"row\">
                                            <div class=\"col-sm-5\">
                                                ";
        // line 50
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 50, $this->source); })()), "firstName", [], "any", false, false, false, 50), 'errors');
        echo "
                                                ";
        // line 51
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 51, $this->source); })()), "firstName", [], "any", false, false, false, 51), 'widget');
        echo "
                                            </div>
                                            <div class=\"col-sm-2\"></div>
                                            <div class=\"col-sm-5\">
                                                ";
        // line 55
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 55, $this->source); })()), "lastName", [], "any", false, false, false, 55), 'errors');
        echo "
                                                ";
        // line 56
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 56, $this->source); })()), "lastName", [], "any", false, false, false, 56), 'widget');
        echo "
                                            </div>
                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>

                                        <div class=\"row\">
                                            <div class=\"col-sm-6\">
                                                ";
        // line 64
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 64, $this->source); })()), "email", [], "any", false, false, false, 64), 'errors');
        echo "
                                                ";
        // line 65
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 65, $this->source); })()), "email", [], "any", false, false, false, 65), 'widget', ["attr" => ["disabled" => "disabled"]]);
        echo "
                                            </div>
                                            <div class=\"col-sm-1\"></div>
                                            <div class=\"col-sm-5\">

                                                ";
        // line 70
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 70, $this->source); })()), "idNumber", [], "any", false, false, false, 70), 'errors');
        echo "
                                                <input type=\"text\"  id=\"update_idNumber\" placeholder=\"NIC Number\" onkeypress=\"isInputNumber(event)\" pattern=\"^[0-9]{9}[a-zA-Z]\$\" value=\"";
        // line 71
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 71, $this->source); })()), "idNumber", [], "any", false, false, false, 71), "vars", [], "any", false, false, false, 71), "value", [], "any", false, false, false, 71), "html", null, true);
        echo "\" name=\"update[idNumber]\" required=\"required\" class=\"form-control\" \" />                                                    <div class=\"input-group-append\">

                                                </div>
                                            </div>
                                        </div>


                                        <div style=\"margin-top: 0.5cm;\"></div>

                                        <div class=\"row\">
                                            <div class=\"col-sm-5\">
                                                <div style=\"margin-top: 0.5cm;\"></div>
                                                ";
        // line 83
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 83, $this->source); })()), "phoneNumber", [], "any", false, false, false, 83), 'errors');
        echo "
                                                <input type=\"tel\" id=\"update_phoneNumber\" value=\"";
        // line 84
        echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 84, $this->source); })()), "phoneNumber", [], "any", false, false, false, 84), "vars", [], "any", false, false, false, 84), "value", [], "any", false, false, false, 84), "html", null, true);
        echo "\" name=\"update[phoneNumber]\" onkeypress=\"isPhone(event)\" required=\"required\" placeholder=\"Phone Number\" class=\"form-control\" pattern=\"^[0-9]{10}\$\" />
                                            </div>
                                            <div class=\"col-sm-2\"></div>


                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div class=\"row\" >
                                            <div class=\"col-sm-7\">
                                                ";
        // line 94
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 94, $this->source); })()), "address", [], "any", false, false, false, 94), 'errors');
        echo "
                                                ";
        // line 95
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 95, $this->source); })()), "address", [], "any", false, false, false, 95), 'widget');
        echo "
                                            </div>
                                            <div class=\"col-sm-1\" hidden=\"hidden\">
                                            </div>

                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div class=\"form-group row\">
                                            <div class=\"col-sm-7\">
                                                <div class=\"custom-control custom-checkbox\">
                                                    <input type=\"checkbox\" class=\"custom-control-input\" id=\"defaultUnchecked\" style=\"float: left\">
                                                    <label class=\"custom-control-label\" for=\"defaultUnchecked\">Change Password</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div style=\"margin-top: 0.5cm;\"></div>

                                        <div id=\"register_password\" >
                                            <div class=\"form-group row\">
                                                ";
        // line 116
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 116, $this->source); })()), "password", [], "any", false, false, false, 116));
        foreach ($context['_seq'] as $context["_key"] => $context["passwordField"]) {
            // line 117
            echo "                                                    <div class=\"col-sm-5\">
                                                        ";
            // line 118
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["passwordField"], 'errors');
            echo "
                                                        ";
            // line 119
            echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock($context["passwordField"], 'widget');
            echo "
                                                    </div>
                                                    <div class=\"col-sm-2\"></div>
                                                ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['passwordField'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 123
        echo "
                                            </div>
                                            <div style=\"margin-top: 0.5cm;\"></div>
                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div class=\"row\">
                                            <div class=\"col-sm-10\">
                            <p>
                                <a class=\"btn btn-primary\" data-toggle=\"collapse\" href=\"#collapseVehicle\" style=\"float: left\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                    Edit Vehicles
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
        // line 152
        $context['_parent'] = $context;
        $context['_seq'] = twig_ensure_traversable((isset($context["vehicleClasses"]) || array_key_exists("vehicleClasses", $context) ? $context["vehicleClasses"] : (function () { throw new RuntimeError('Variable "vehicleClasses" does not exist.', 152, $this->source); })()));
        foreach ($context['_seq'] as $context["_key"] => $context["vehicleClass"]) {
            // line 153
            echo "                                                <option>";
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicleClass"], "className", [], "any", false, false, false, 153), "html", null, true);
            echo "</option>
                                            ";
        }
        $_parent = $context['_parent'];
        unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vehicleClass'], $context['_parent'], $context['loop']);
        $context = array_intersect_key($context, $_parent) + $_parent;
        // line 155
        echo "                                        </select>
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
                                                ";
        // line 170
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 170, $this->source); })()), "vehicle", [], "any", false, false, false, 170)) > 0)) {
            // line 171
            echo "                                                ";
            $context["i"] = 1;
            // line 172
            echo "                                                ";
            $context['_parent'] = $context;
            $context['_seq'] = twig_ensure_traversable(twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 172, $this->source); })()), "vehicle", [], "any", false, false, false, 172));
            foreach ($context['_seq'] as $context["_key"] => $context["vehicle"]) {
                // line 173
                echo "                                                    <option> ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "vehicleNo", [], "any", false, false, false, 173), "html", null, true);
                echo "        |        ";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["vehicle"], "class", [], "any", false, false, false, 173), "className", [], "any", false, false, false, 173), "html", null, true);
                echo "</option>
                                                    <script>
                                                        var input = document.createElement(\"input\");

                                                        input.setAttribute(\"type\", \"hidden\");

                                                        input.setAttribute(\"name\", \"vehicles[\"+\"";
                // line 179
                echo twig_escape_filter($this->env, (isset($context["i"]) || array_key_exists("i", $context) ? $context["i"] : (function () { throw new RuntimeError('Variable "i" does not exist.', 179, $this->source); })()), "html", null, true);
                echo "\" +\"]\");
                                                        input.setAttribute(\"id\", \"vehicles[\"+\"";
                // line 180
                echo twig_escape_filter($this->env, (isset($context["i"]) || array_key_exists("i", $context) ? $context["i"] : (function () { throw new RuntimeError('Variable "i" does not exist.', 180, $this->source); })()), "html", null, true);
                echo "\" +\"]\");

                                                        input.setAttribute(\"value\", \"";
                // line 182
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, $context["vehicle"], "vehicleNo", [], "any", false, false, false, 182), "html", null, true);
                echo "\" + \"        |        \" + \"";
                echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, $context["vehicle"], "class", [], "any", false, false, false, 182), "className", [], "any", false, false, false, 182), "html", null, true);
                echo "\");
                                                        document.getElementById('registeredVehicles').appendChild(input);
                                                    </script>
                                                    ";
                // line 185
                $context["i"] = ((isset($context["i"]) || array_key_exists("i", $context) ? $context["i"] : (function () { throw new RuntimeError('Variable "i" does not exist.', 185, $this->source); })()) + 1);
                // line 186
                echo "                                                ";
            }
            $_parent = $context['_parent'];
            unset($context['_seq'], $context['_iterated'], $context['_key'], $context['vehicle'], $context['_parent'], $context['loop']);
            $context = array_intersect_key($context, $_parent) + $_parent;
            // line 187
            echo "                                                ";
        }
        // line 188
        echo "                                            </select>
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
                                    Edit Account
                                </a>

                            </p>

                        </div>
                    </div>
                    <div class=\"row\">

                        <div class=\"collapse\" style=\"float: left\" id=\"collapseAccount\">
                            <div class=\"card card-body\">
                                <div class=\"row\">
                                    <div class=\"col-lg-5\">
                                        <input type=\"text\" class=\"form-control\" id=\"register_accountNo\" aria-describedby=\"emailHelp\" placeholder=\"Account No\" name=\"account[accountNo]\" value=\"";
        // line 221
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 221, $this->source); })()), "account", [], "any", false, false, false, 221)) > 0)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 221, $this->source); })()), "account", [], "any", false, false, false, 221), "accountNo", [], "any", false, false, false, 221), "html", null, true);
        }
        echo "\" >
                                    </div>
                                    <div class=\"col-lg-5\">
                                        <input type=\"text\" class=\"form-control\" id=\"register_ownerName\" aria-describedby=\"emailHelp\" placeholder=\"Owner Name\" name=\"account[ownerName]\"  value=\"";
        // line 224
        if ((twig_length_filter($this->env, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 224, $this->source); })()), "account", [], "any", false, false, false, 224)) > 0)) {
            echo twig_escape_filter($this->env, twig_get_attribute($this->env, $this->source, twig_get_attribute($this->env, $this->source, (isset($context["user"]) || array_key_exists("user", $context) ? $context["user"] : (function () { throw new RuntimeError('Variable "user" does not exist.', 224, $this->source); })()), "account", [], "any", false, false, false, 224), "ownerName", [], "any", false, false, false, 224), "html", null, true);
        }
        echo "\" >
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>



                                    </div>


                                    ";
        // line 240
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 240, $this->source); })()), "save", [], "any", false, false, false, 240), 'widget', ["label" => "Update"]);
        echo "

                                    ";
        // line 242
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock(twig_get_attribute($this->env, $this->source, (isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 242, $this->source); })()), "_token", [], "any", false, false, false, 242), 'widget');
        echo "
                                    ";
        // line 243
        echo $this->env->getRuntime('Symfony\Component\Form\FormRenderer')->searchAndRenderBlock((isset($context["form"]) || array_key_exists("form", $context) ? $context["form"] : (function () { throw new RuntimeError('Variable "form" does not exist.', 243, $this->source); })()), 'errors');
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

    <style>
        html, body {
            background: url(\"../pattern.png\");
        }
    </style>


";
        
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->leave($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof);

        
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->leave($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof);

    }

    // line 268
    public function block_javascripts($context, array $blocks = [])
    {
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e = $this->extensions["Symfony\\Bundle\\WebProfilerBundle\\Twig\\WebProfilerExtension"];
        $__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e->enter($__internal_085b0142806202599c7fe3b329164a92397d8978207a37e79d70b8c52599e33e_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02 = $this->extensions["Symfony\\Bridge\\Twig\\Extension\\ProfilerExtension"];
        $__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02->enter($__internal_319393461309892924ff6e74d6d6e64287df64b63545b994e100d4ab223aed02_prof = new \Twig\Profiler\Profile($this->getTemplateName(), "block", "javascripts"));

        // line 269
        echo "
      <script>
          const checkBoxPwd = document.getElementById('defaultUnchecked');
          const pwdDiv = document.getElementById('register_password');
          pwdDiv.style.visibility = \"hidden\";
          checkBoxPwd.addEventListener(\"change\",function () {
              if (checkBoxPwd.checked == true){
                  pwdDiv.style.visibility = \"visible\";
              }else{
                  pwdDiv.style.visibility = \"hidden\";

              }
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
        return "register/update.html.twig";
    }

    public function isTraitable()
    {
        return false;
    }

    public function getDebugInfo()
    {
        return array (  515 => 269,  506 => 268,  472 => 243,  468 => 242,  463 => 240,  442 => 224,  434 => 221,  399 => 188,  396 => 187,  390 => 186,  388 => 185,  380 => 182,  375 => 180,  371 => 179,  359 => 173,  354 => 172,  351 => 171,  349 => 170,  332 => 155,  323 => 153,  319 => 152,  288 => 123,  278 => 119,  274 => 118,  271 => 117,  267 => 116,  243 => 95,  239 => 94,  226 => 84,  222 => 83,  207 => 71,  203 => 70,  195 => 65,  191 => 64,  180 => 56,  176 => 55,  169 => 51,  165 => 50,  148 => 35,  143 => 31,  134 => 30,  105 => 7,  96 => 6,  78 => 4,  60 => 3,  38 => 1,);
    }

    public function getSourceContext()
    {
        return new Source("{% extends 'base.html.twig' %}

{% block title %}Edit Info{% endblock %}
{% block refHome %}{{ path('home') }}{% endblock %}

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
                        <h3 class=\"card-title float-left\">Edit Info</h3>
                        <div style=\"margin-top: 2cm;\">
                            <p class=\"card-text\">




                            <form name=\"update\"  method=\"post\">
                                <div id=\"update\">
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
                                                {{ form_widget(form.email, {'attr':{'disabled':\"disabled\"}}) }}
                                            </div>
                                            <div class=\"col-sm-1\"></div>
                                            <div class=\"col-sm-5\">

                                                {{ form_errors(form.idNumber) }}
                                                <input type=\"text\"  id=\"update_idNumber\" placeholder=\"NIC Number\" onkeypress=\"isInputNumber(event)\" pattern=\"^[0-9]{9}[a-zA-Z]\$\" value=\"{{ form.idNumber.vars.value }}\" name=\"update[idNumber]\" required=\"required\" class=\"form-control\" \" />                                                    <div class=\"input-group-append\">

                                                </div>
                                            </div>
                                        </div>


                                        <div style=\"margin-top: 0.5cm;\"></div>

                                        <div class=\"row\">
                                            <div class=\"col-sm-5\">
                                                <div style=\"margin-top: 0.5cm;\"></div>
                                                {{ form_errors(form.phoneNumber) }}
                                                <input type=\"tel\" id=\"update_phoneNumber\" value=\"{{ form.phoneNumber.vars.value }}\" name=\"update[phoneNumber]\" onkeypress=\"isPhone(event)\" required=\"required\" placeholder=\"Phone Number\" class=\"form-control\" pattern=\"^[0-9]{10}\$\" />
                                            </div>
                                            <div class=\"col-sm-2\"></div>


                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div class=\"row\" >
                                            <div class=\"col-sm-7\">
                                                {{ form_errors(form.address) }}
                                                {{ form_widget(form.address) }}
                                            </div>
                                            <div class=\"col-sm-1\" hidden=\"hidden\">
                                            </div>

                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div class=\"form-group row\">
                                            <div class=\"col-sm-7\">
                                                <div class=\"custom-control custom-checkbox\">
                                                    <input type=\"checkbox\" class=\"custom-control-input\" id=\"defaultUnchecked\" style=\"float: left\">
                                                    <label class=\"custom-control-label\" for=\"defaultUnchecked\">Change Password</label>
                                                </div>
                                            </div>

                                        </div>
                                        <div style=\"margin-top: 0.5cm;\"></div>

                                        <div id=\"register_password\" >
                                            <div class=\"form-group row\">
                                                {% for passwordField in form.password %}
                                                    <div class=\"col-sm-5\">
                                                        {{ form_errors(passwordField) }}
                                                        {{ form_widget(passwordField) }}
                                                    </div>
                                                    <div class=\"col-sm-2\"></div>
                                                {% endfor %}

                                            </div>
                                            <div style=\"margin-top: 0.5cm;\"></div>
                                        </div>

                                        <div style=\"margin-top: 0.5cm;\"></div>
                                        <div class=\"row\">
                                            <div class=\"col-sm-10\">
                            <p>
                                <a class=\"btn btn-primary\" data-toggle=\"collapse\" href=\"#collapseVehicle\" style=\"float: left\" role=\"button\" aria-expanded=\"false\" aria-controls=\"collapseExample\">
                                    Edit Vehicles
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
                                                {% if( user.vehicle|length >0) %}
                                                {% set i=1 %}
                                                {% for vehicle in user.vehicle %}
                                                    <option> {{ vehicle.vehicleNo }}        |        {{ vehicle.class.className }}</option>
                                                    <script>
                                                        var input = document.createElement(\"input\");

                                                        input.setAttribute(\"type\", \"hidden\");

                                                        input.setAttribute(\"name\", \"vehicles[\"+\"{{ i }}\" +\"]\");
                                                        input.setAttribute(\"id\", \"vehicles[\"+\"{{ i }}\" +\"]\");

                                                        input.setAttribute(\"value\", \"{{ vehicle.vehicleNo }}\" + \"        |        \" + \"{{ vehicle.class.className }}\");
                                                        document.getElementById('registeredVehicles').appendChild(input);
                                                    </script>
                                                    {%  set i = i+1 %}
                                                {% endfor %}
                                                {% endif %}
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
                                    Edit Account
                                </a>

                            </p>

                        </div>
                    </div>
                    <div class=\"row\">

                        <div class=\"collapse\" style=\"float: left\" id=\"collapseAccount\">
                            <div class=\"card card-body\">
                                <div class=\"row\">
                                    <div class=\"col-lg-5\">
                                        <input type=\"text\" class=\"form-control\" id=\"register_accountNo\" aria-describedby=\"emailHelp\" placeholder=\"Account No\" name=\"account[accountNo]\" value=\"{% if(user.account|length >0) %}{{ user.account.accountNo }}{% endif %}\" >
                                    </div>
                                    <div class=\"col-lg-5\">
                                        <input type=\"text\" class=\"form-control\" id=\"register_ownerName\" aria-describedby=\"emailHelp\" placeholder=\"Owner Name\" name=\"account[ownerName]\"  value=\"{% if(user.account|length >0) %}{{ user.account.ownerName }}{% endif %}\" >
                                    </div>


                                </div>

                            </div>
                        </div>

                    </div>



                                    </div>


                                    {{ form_widget(form.save,{'label':\"Update\"}) }}

                                    {{ form_widget(form._token) }}
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

    <style>
        html, body {
            background: url(\"../pattern.png\");
        }
    </style>


{% endblock %}

  {% block javascripts %}

      <script>
          const checkBoxPwd = document.getElementById('defaultUnchecked');
          const pwdDiv = document.getElementById('register_password');
          pwdDiv.style.visibility = \"hidden\";
          checkBoxPwd.addEventListener(\"change\",function () {
              if (checkBoxPwd.checked == true){
                  pwdDiv.style.visibility = \"visible\";
              }else{
                  pwdDiv.style.visibility = \"hidden\";

              }
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
", "register/update.html.twig", "/home/ishara/lampstack-7.1.29-0/apache2/htdocs/openRoadTolling/templates/register/update.html.twig");
    }
}
