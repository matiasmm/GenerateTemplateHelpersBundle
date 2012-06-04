<?php
namespace Matubaum\GenerateTemplateHelpersBundle\Twig;

/*
 * To change this template, choose Tools | Templates
 * and open the template in the editor.
 */

/**
 * Description of TwigExtension
 *
 * @author matias
 */
class SpecialCommentsTwigExtension extends \Twig_Extension{
    
    private $environment;
    
    public function getName(){
        return 'special_comments';
    }
    
    public function initRuntime(\Twig_Environment $environment){
        $this->environment = $environment;
        $compiled = $this->environment->loadTemplate('MatubaumGenerateTemplateHelpersBundle::macros.html.twig');
        
    }
    
    public function getFilters(){
        return [
            'var_dump' => new \Twig_Filter_Function('var_dump')
        ];
    }
}