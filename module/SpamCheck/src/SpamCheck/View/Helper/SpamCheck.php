<?php
/**
 * ZF2 Buch Kapitel 20
 * 
 * Das Buch "Zend Framework 2 - Das Praxisbuch"
 * von Ralf Eggert ist im Galileo-Computing Verlag erschienen. 
 * ISBN 978-3-8362-2610-3
 * 
 * @package    SpamCheck
 * @author     Ralf Eggert <r.eggert@travello.de>
 * @copyright  Alle Listings sind urheberrechtlich geschützt!
 * @link       http://www.zendframeworkbuch.de/ und http://www.galileocomputing.de/3460
 */

/**
 * namespace definition and usage
 */
namespace SpamCheck\View\Helper;

use SpamCheck\Service\B8Service;
use Zend\View\Helper\AbstractHelper;
use Zend\View\Model\ViewModel;

/**
 * Provides access to b8 view helper
 * 
 * Outputs the the spam classification
 * 
 * @package    SpamCheck
 */
class SpamCheck extends AbstractHelper
{
}
