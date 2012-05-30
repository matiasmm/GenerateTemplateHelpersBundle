<?php
/**
 * @author Matias Montenegro <matiasmmontenegro gmail.com>
 */
namespace Matubaum\GenerateTemplateHelpersBundle;
use Symfony\Component\HttpKernel\Bundle\Bundle;
use Symfony\Component\DependencyInjection\ContainerBuilder;


class MatubaumGenerateTemplateHelpersBundle extends Bundle
{
    public function build(ContainerBuilder $container)
    {
        parent::build($container);
        $container->registerExtension(new DependencyInjection\GenerateTemplateHelpersExtension());
    }
    
}
