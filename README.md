GenerateTemplateHelpersBundle
=============================

Not Ready. Integrates this library https://github.com/matubaum/SpecialComments with Symfony2. 



INSTALL
=======

Add configuration in app/config/config.yml:

    generate_template_helpers:
        engine: twig

Instanciate the bundle in app/AppKernel.php

    public function registerBundles()
    {
        $bundles = array(
             /**** other bundles ****/
             new Matubaum\GenerateTemplateHelpersBundle\MatubaumGenerateTemplateHelpersBundle(),

        );
        return $bundles;
    }  