<?php
/**
 * @link      https://craftcms.com/
 * @copyright Copyright (c) Pixel & Tonic, Inc.
 * @license   https://craftcms.com/license
 */

namespace craft\errors;

use mikehaertl\shellcommand\Command;
use yii\base\Exception;

/**
 * ShellCommandException represents an exception caused by setting an invalid license key on a plugin.
 *
 * @author Pixel & Tonic, Inc. <support@pixelandtonic.com>
 * @since  3.0
 */
class ShellCommandException extends Exception
{
    /**
     * @var string The command that was executed
     */
    public $command;

    /**
     * @var integer The command’s exit code
     */
    public $exitCode;

    /**
     * @var string The command’s error output
     */
    public $error;

    /**
     * Creates a ShellCommandException from a [[Command]] object
     *
     * @param Command $command The failed Command object
     *
     * @return static
     */
    public static function createFromCommand(Command $command)
    {
        return new static($command->getExecCommand(), $command->getExitCode(), $command->getStdErr());
    }

    /**
     * Constructor.
     *
     * @param string $command   The command that was executed
     * @param integer $exitCode The command’s exit code
     * @param string  $error    The command’s error output
     * @param string  $message  The error message
     * @param integer $code     The error code
     */
    public function __construct($command, $exitCode, $error = null, $message = null, $code = 0)
    {
        $this->command = $command;
        $this->exitCode = $exitCode;
        $this->error = $error;

        if ($message === null) {
            // Quote the command
            if ($command !== false) {
                $command = "\"{$command}\"";
            } else {
                $command = '`false`';
            }
            $message = "The shell command {$command} failed with exit code {$exitCode}".($error ? ": {$error}" : '.');
        }

        parent::__construct($message, $code);
    }

    /**
     * @return string the user-friendly name of this exception
     */
    public function getName()
    {
        return 'Shell Command Failure';
    }
}