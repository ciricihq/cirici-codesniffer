<?php
/**
 * Squiz_Sniffs_WhiteSpace_SemicolonSpacingSniff.
 *
 * PHP version 5
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Greg Sherwood <gsherwood@squiz.net>
 * @author    Marc McIntyre <mmcintyre@squiz.net>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */

/**
 * Cirici_Sniffs_WhiteSpace_SemicolonSpacingSniff.
 *
 * Ensure there is no whitespace before a semicolon. Unless
 *
 * @category  PHP
 * @package   PHP_CodeSniffer
 * @author    Òscar Casajuana <oscar@cirici.com>
 * @author    Cirici New Media <info@cirici.com>
 * @copyright 2006-2014 Squiz Pty Ltd (ABN 77 084 670 600)
 * @license   https://github.com/squizlabs/PHP_CodeSniffer/blob/master/licence.txt BSD Licence
 * @version   Release: @package_version@
 * @link      http://pear.php.net/package/PHP_CodeSniffer
 */
class Cirici_Sniffs_WhiteSpace_SemicolonSpacingSniff implements PHP_CodeSniffer_Sniff
{

    /**
     * A list of tokenizers this sniff supports.
     *
     * @var array
     */
    public $supportedTokenizers = array(
        'PHP',
        'JS',
    );


    /**
     * Returns an array of tokens this test wants to listen for.
     *
     * @return array
     */
    public function register()
    {
        return array(T_SEMICOLON);
    }


    /**
     * Processes this test, when one of its tokens is encountered.
     *
     * @param PHP_CodeSniffer_File $phpcsFile The file being scanned.
     * @param int                  $stackPtr  The position of the current token
     *                                        in the stack passed in $tokens.
     *
     * @return void
     */
    public function process(PHP_CodeSniffer_File $phpcsFile, $stackPtr)
    {
        $tokens = $phpcsFile->getTokens();

        $prevType = $tokens[($stackPtr - 1)]['code'];
        if (isset(PHP_CodeSniffer_Tokens::$emptyTokens[$prevType]) === false) {
            return;
        }

        $nonSpace = $phpcsFile->findPrevious(PHP_CodeSniffer_Tokens::$emptyTokens, ($stackPtr - 2), null, true);
        if ($tokens[$nonSpace]['code'] === T_SEMICOLON) {
            // Empty statement.
            return;
        }


        if ($tokens[$nonSpace]['code'] === T_CLOSE_PARENTHESIS
            && $tokens[$nonSpace]['line'] === $tokens[$stackPtr]['line'] - 1
            && $tokens[$nonSpace]['level'] === $tokens[$stackPtr]['level']
        ) {
            return;
        }

        $expected = $tokens[$nonSpace]['content'].';';
        $found    = $phpcsFile->getTokensAsString($nonSpace, ($stackPtr - $nonSpace)).';';
        $error    = 'Space found before semicolon; expected "%s" but found "%s"';
        $data     = array(
                     $expected,
                     $found,
                    );

        $fix = $phpcsFile->addFixableError($error, $stackPtr, 'Incorrect', $data);
        if ($fix === true) {
            $phpcsFile->fixer->beginChangeset();
            for ($i = ($stackPtr - 1); $i > $nonSpace; $i--) {
                $phpcsFile->fixer->replaceToken($i, '');
            }

            $phpcsFile->fixer->endChangeset();
        }
    }
}
