<?php
/*
 *   Jamshidbek Akhlidinov
 *   21 - 4 2025 17:14:28
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
 */

/**
 * This is the template for generating a module class file.
 */

/** @var yii\web\View $this */
/** @var yii\gii\generators\module\Generator $generator */

$className = $generator->moduleClass;
$pos = strrpos($className, '\\');
$ns = ltrim(substr($className, 0, $pos), '\\');
$className = substr($className, $pos + 1);

echo "<?php\n";
?>
/*
 *   Jamshidbek Akhlidinov
 *   <?php echo date('d - m Y H:i:s')."\n"; ?>
 *   https://ustadev.uz
 *   https://github.com/JamshidbekAkhlidinov
*/

namespace <?= $ns ?>;

/**
 * <?= $generator->moduleID ?> module definition class
 */
class <?= $className ?> extends \yii\base\Module
{
    /**
     * {@inheritdoc}
     */
    public $controllerNamespace = '<?= $generator->getControllerNamespace() ?>';

    /**
     * {@inheritdoc}
     */
    public function init()
    {
        parent::init();

        // custom initialization code goes here
    }
}
