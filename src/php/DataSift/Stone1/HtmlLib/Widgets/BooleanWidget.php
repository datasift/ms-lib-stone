<?php

/**
 * Stone1 - A PHP Library
 *
 * PHP Version 5.3
 *
 * This software is the intellectual property of MediaSift Ltd., and is covered
 * by retained intellectual property rights, including copyright.
 * Distribution of this software is strictly forbidden under the terms of this license.
 *
 * @category  Libraries
 * @package   Stone1
 * @author    Stuart Herbert <stuart.herbert@datasift.com>
 * @copyright 2011 MediaSift Ltd.
 * @license   http://mediasift.com/licenses/internal MediaSift Internal License
 * @version   SVN: $Revision: 2496 $
 * @link      http://www.mediasift.com
 */

namespace DataSift\Stone1\HtmlLib\Widgets;

use ReflectionObject;
use ReflectionProperty;
use stdClass;

/**
 * Helper class for working with an integer on a form
 *
 * @category Libraries
 * @package  Stone1
 * @author   Stuart Herbert <stuart.herbert@datasift.com>
 * @license  http://mediasift.com/licenses/internal MediaSift Internal License
 * @link     http://www.mediasift.com
 */

class BooleanWidget extends TextWidget
{
    /**
     * Get the fully-qualified filename of this widget's snippet file
     *
     * @param  string $format what output format is required?
     *                        default is html
     * @param  string $file   pass __FILE__ if you're overriding this class
     *                        default is the filename for the TextWidget class
     * @return string
     */
    public function getSnippetFileToInclude($format = 'html', $file = __FILE__)
    {
        // return the full path to the snippet file for this widget
        return parent::getSnippetFileToInclude($format, $file);
    }

    // ==================================================================
    //
    // Helpers for working with FORM data
    //
    // ------------------------------------------------------------------

    public function getValidator()
    {
        return function($data, &$errors) {
            if (strcasecmp($data, "ON") === 0 || strcasecmp($data, "OFF") === 0)
            {
                return true;
            }
            else
            {
                $errors[] = "Value not ON/OFF";
                return false;
            }
        };

    }
    /**
     * get the filter to apply to HttpLib's HttpData::getFilteredData()
     * @return callback
     */
    public function getFilter()
    {
        return function($data) {
            if (strcasecmp($data, "ON") === 0)
            {
                return true;
            }
            else if (strcasecmp($data, "OFF") === 0)
            {
                return false;
            }
            else
            {
                return NULL;
            }
        };
    }
}