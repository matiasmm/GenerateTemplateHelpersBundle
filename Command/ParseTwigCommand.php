<?php
namespace Matubaum\GenerateTemplateHelpersBundle;

use Symfony\Bundle\FrameworkBundle\Command\ContainerAwareCommand;
use Symfony\Component\Console\Input\InputArgument;
use Symfony\Component\Console\Input\InputInterface;
use Symfony\Component\Console\Input\InputOption;
use Symfony\Component\Console\Output\OutputInterface;

class ParseTwigCommand extends ContainerAwareCommand
{
    protected function configure()
    {
        $this
            ->setName('ital:specialcomments:parse-twig')
        ;
    }

    protected function execute(InputInterface $input, OutputInterface $output){

        $root = ".";
        $parser = $root . '/myvendors/SpecialComments';
        

        $web = __DIR__ . $root . "/web/templates";
        $source_directory = $web . '/originals';
        $target_directory = $web . '/target';


        $path = array();
        $path[] = $parser. '/lib/*';


        while(count($path) != 0){
            $v = array_shift($path);
            foreach(glob($v) as $item){
                if (is_dir($item))
                    $path[] = $item . '/*';
                elseif (is_file($item)){
                         require_once $item;
                }
            }
        }

        $con = new \TwigTemplateCreator();
        $con->generateHelpersFromDir(realpath($source_directory), realpath($target_directory));
    }
}