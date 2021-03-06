<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\base;

/**
 * LocalVolumeInterface defines the common interface to be implemented by volume classes that are on the local file system.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
interface LocalVolumeInterface
{
    // Public Methods
    // =========================================================================

    /**
     * Returns the root path for the volume.
     *
     * @return string The root path for the volume
     */
    public function getRootPath(): string;
}
