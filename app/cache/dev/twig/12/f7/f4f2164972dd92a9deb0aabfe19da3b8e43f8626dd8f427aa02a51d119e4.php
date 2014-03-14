<?php

/* SonataUserBundle:Admin/Core:user_block.html.twig */
class __TwigTemplate_12f7f4f2164972dd92a9deb0aabfe19da3b8e43f8626dd8f427aa02a51d119e4 extends Twig_Template
{
    public function __construct(Twig_Environment $env)
    {
        parent::__construct($env);

        $this->parent = false;

        $this->blocks = array(
            'user_block' => array($this, 'block_user_block'),
        );
    }

    protected function doDisplay(array $context, array $blocks = array())
    {
        // line 1
        $this->displayBlock('user_block', $context, $blocks);
    }

    public function block_user_block($context, array $blocks = array())
    {
        // line 2
        echo "    ";
        if ($this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user")) {
            // line 3
            echo "        ";
            echo twig_escape_filter($this->env, $this->getAttribute((isset($context["app"]) ? $context["app"] : $this->getContext($context, "app")), "user"), "html", null, true);
            echo "

        ";
            // line 5
            if (($this->env->getExtension('security')->isGranted("ROLE_PREVIOUS_ADMIN") && $this->getAttribute((isset($context["sonata_user"]) ? $context["sonata_user"] : $this->getContext($context, "sonata_user")), "impersonating"))) {
                // line 6
                echo "            <a href=\"";
                echo twig_escape_filter($this->env, $this->env->getExtension('routing')->getUrl($this->getAttribute($this->getAttribute((isset($context["sonata_user"]) ? $context["sonata_user"] : $this->getContext($context, "sonata_user")), "impersonating"), "route"), twig_array_merge($this->getAttribute($this->getAttribute((isset($context["sonata_user"]) ? $context["sonata_user"] : $this->getContext($context, "sonata_user")), "impersonating"), "parameters"), array("_switch_user" => "_exit"))), "html", null, true);
                echo "\">(exit)</a>
        ";
            }
            // line 8
            echo "
        - <a href=\"";
            // line 9
            echo $this->env->getExtension('routing')->getUrl("sonata_user_admin_security_logout");
            echo "\">";
            echo twig_escape_filter($this->env, $this->env->getExtension('translator')->trans("user_block_logout", array(), "SonataUserBundle"), "html", null, true);
            echo "</a>
    ";
        }
    }

    public function getTemplateName()
    {
        return "SonataUserBundle:Admin/Core:user_block.html.twig";
    }

    public function getDebugInfo()
    {
        return array (  46 => 9,  35 => 5,  32 => 12,  27 => 13,  25 => 12,  20 => 1,  179 => 72,  173 => 71,  169 => 69,  151 => 61,  145 => 59,  142 => 58,  139 => 57,  124 => 52,  121 => 51,  117 => 50,  110 => 46,  106 => 44,  102 => 42,  100 => 41,  94 => 39,  89 => 37,  82 => 33,  78 => 31,  75 => 30,  65 => 26,  62 => 25,  50 => 22,  38 => 19,  29 => 3,  26 => 2,  857 => 274,  854 => 273,  849 => 268,  845 => 266,  839 => 263,  836 => 262,  834 => 261,  829 => 259,  821 => 258,  818 => 257,  816 => 256,  813 => 255,  807 => 253,  805 => 252,  802 => 251,  796 => 249,  794 => 248,  791 => 247,  785 => 245,  783 => 244,  780 => 243,  774 => 241,  772 => 240,  769 => 239,  766 => 238,  762 => 221,  757 => 218,  751 => 216,  748 => 215,  745 => 214,  731 => 213,  725 => 211,  720 => 208,  714 => 206,  706 => 204,  704 => 203,  701 => 202,  698 => 201,  680 => 200,  677 => 199,  675 => 198,  671 => 196,  668 => 195,  665 => 194,  661 => 191,  658 => 190,  655 => 189,  651 => 280,  649 => 273,  644 => 270,  642 => 238,  638 => 237,  635 => 236,  629 => 233,  626 => 232,  624 => 231,  619 => 228,  613 => 225,  610 => 224,  608 => 223,  605 => 222,  603 => 194,  599 => 192,  596 => 189,  593 => 188,  588 => 179,  584 => 174,  575 => 170,  569 => 168,  566 => 167,  563 => 166,  557 => 163,  553 => 162,  550 => 161,  544 => 160,  539 => 157,  533 => 156,  521 => 154,  518 => 153,  514 => 152,  509 => 150,  506 => 149,  504 => 148,  501 => 147,  498 => 146,  491 => 145,  488 => 144,  485 => 143,  482 => 142,  476 => 141,  473 => 140,  470 => 139,  467 => 137,  460 => 136,  457 => 135,  451 => 134,  448 => 133,  443 => 132,  440 => 131,  437 => 130,  431 => 129,  425 => 175,  423 => 166,  419 => 164,  416 => 163,  413 => 130,  411 => 129,  407 => 127,  404 => 126,  399 => 124,  392 => 120,  386 => 119,  381 => 118,  378 => 117,  371 => 182,  367 => 180,  365 => 179,  362 => 178,  360 => 126,  357 => 125,  355 => 124,  352 => 123,  350 => 117,  343 => 115,  341 => 114,  330 => 105,  327 => 104,  317 => 101,  310 => 80,  304 => 79,  300 => 78,  297 => 77,  291 => 75,  289 => 74,  284 => 72,  279 => 70,  274 => 68,  270 => 67,  266 => 66,  260 => 63,  256 => 61,  250 => 60,  242 => 59,  238 => 57,  235 => 56,  228 => 52,  224 => 51,  220 => 49,  205 => 38,  203 => 37,  198 => 35,  193 => 33,  189 => 32,  184 => 30,  181 => 29,  178 => 28,  172 => 22,  163 => 68,  157 => 64,  154 => 103,  143 => 98,  140 => 97,  123 => 95,  99 => 91,  96 => 90,  93 => 89,  87 => 87,  85 => 86,  80 => 84,  74 => 56,  71 => 29,  69 => 28,  60 => 24,  57 => 23,  55 => 20,  49 => 17,  47 => 21,  43 => 8,  41 => 20,  37 => 6,  170 => 55,  165 => 281,  159 => 186,  153 => 62,  150 => 101,  146 => 99,  138 => 46,  135 => 55,  131 => 43,  125 => 42,  119 => 93,  116 => 92,  112 => 47,  109 => 37,  107 => 36,  103 => 34,  97 => 33,  91 => 38,  88 => 30,  84 => 29,  76 => 82,  73 => 27,  67 => 26,  64 => 25,  61 => 24,  58 => 23,  53 => 19,  51 => 18,  45 => 15,  42 => 17,  39 => 12,  34 => 18,  28 => 14,);
    }
}