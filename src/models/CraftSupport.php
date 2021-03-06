<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\models;

use Craft;
use craft\base\Model;
use craft\web\UploadedFile;

/**
 * Class CraftSupport model.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class CraftSupport extends Model
{
    // Properties
    // =========================================================================

    /**
     * @var string|null From email
     */
    public $fromEmail;

    /**
     * @var string|null Message
     */
    public $message;

    /**
     * @var bool Attach logs
     */
    public $attachLogs = false;

    /**
     * @var bool Attach db backup
     */
    public $attachDbBackup = false;

    /**
     * @var bool Attach templates
     */
    public $attachTemplates = false;

    /**
     * @var UploadedFile|null Attachment
     */
    public $attachment;

    // Public Methods
    // =========================================================================

    /**
     * @inheritdoc
     */
    public function attributeLabels()
    {
        return [
            'fromEmail' => Craft::t('app', 'Your Email'),
        ];
    }

    /**
     * @inheritdoc
     */
    public function rules()
    {
        return [
            [['fromEmail', 'message'], 'required'],
            [['fromEmail'], 'email'],
            [['fromEmail'], 'string', 'min' => 5, 'max' => 255],
            [['attachment'], 'file', 'maxSize' => 3145728],
        ];
    }
}
