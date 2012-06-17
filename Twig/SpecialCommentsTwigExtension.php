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
    private $environment2;
    private $blocks;
    
    public function getName(){
        return 'special_comments';
    }
    
    
    
    
    /** 
     * Aca deberias setear la function pero asegurarte de que tellegue el compiler
     * 
     * @return array
     */
    public function getFunctions() {
        $r = [];
        
        
        return $r;
    }
    
    function setEnvironment($environment){
        
        $this->environment2;
    }
    
    /**
     * Aca deberias setear un bloque si es posible
     * Pero no la funcion porque eso no anda ni por puta
     * Todas las funciones ya se crearon a esta altura.
     * 
     * @param \Twig_Environment $environment
     */
    public function initRuntime(\Twig_Environment $environment){
        
        $compiled = $environment->loadTemplate('MatubaumGenerateTemplateHelpersBundle::macros.html.twig');
        
    }
        
}