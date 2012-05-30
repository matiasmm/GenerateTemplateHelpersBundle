COMMAND="sed -i 's/Ital\Framework\SpecialCommentsBundle/Matubaum\GenerateTemplateHelpersBundle/g'"
eval $COMMAND ./Handler.php
eval $COMMAND ./Wrapper.php
eval $COMMAND ./SpecialCommentsBundle.php
eval $COMMAND ./Command/ParseTwigCommand.php
eval $COMMAND ./DependencyInjection/Configuration.php
eval $COMMAND ./DependencyInjection/SpecialCommentsExtension.php
