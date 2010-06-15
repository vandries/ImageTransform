<?php
/*
 * This file is part of the sfImageTransform package.
 * (c) 2007 Stuart Lowes <stuart.lowes@gmail.com>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */

/**
 *
 * MimeType_ResolvingStrategy_Fileinfo
 *
 * ...
 *
 * @package    sfImageTransform
 * @subpackage MimeType_ResolvingStrategy
 * @author     Christian Schaefer <caefer@ical.ly>
 * @version    SVN: $Id$
 */
class MimeType_ResolvingStrategy_Fileinfo implements MimeType_ResolvingStrategy_Interface
{
  /**
   * Resolve and return mime type of given filepath
   * 
   * @param  string $filepath Absolute path to the file of which to detect the mime type
   * @param  string $mimetype Manually passed optional mime type for consideration
   * @return string           The resolved mime type or boolean false
   */
  public function resolve($filepath, $mimetype = false)
  {
    if (function_exists('finfo_file'))
    {
      // Support for PHP 5.3+
      if (defined(FILEINFO_MIME_TYPE))
      {
        $finfo = finfo_open(FILEINFO_MIME_TYPE);
      }
      else
      {
        $finfo = finfo_open(FILEINFO_MIME);
      }

      return finfo_file($finfo, $filename);
    }

    return false;
  }
}