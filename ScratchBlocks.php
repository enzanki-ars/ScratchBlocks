<?php
/*
 * ScratchBlocks extension for MediaWiki
 * Renders <scratchblocks> tags to shiny scratch blocks
 *
 * Copyright 2013, Tim Radvan
 * MIT Licensed
 * http://opensource.org/licenses/MIT
 *
 * Includes scratchblocks v3
 * ??? Please get github link and put here
 *
 */


if (!defined('MEDIAWIKI')) {
    die();
}


// Hooks

$wgExtensionFunctions[] = 'sbSetup';
$wgHooks['ParserFirstCallInit'][] = 'sbParserInit';
 

// Hook callback function into parser

function sbParserInit (Parser $parser) {
    // Register <scratchblocks> tag
    $parser->setHook('scratchblocks', 'sbRenderTag');
    return true;
}
 

// Called to ouput HTML for <scratchsig> tag

function sbRenderTag ($input, array $args, Parser $parser, PPFrame $frame) {
    return '<pre class="blocks">' . htmlspecialchars($input) . '</pre>';
}


// Make wiki load resources

function sbSetup () {
    global $wgOut;
    $wgOut->addModules('ext.scratchBlocks');
}


// Define resources

$wgResourceModules['ext.scratchBlocks'] = array(
    'scripts' => array(
        'ScratchBlocks/src/scratchblocks.js',
		'scratchblocks/src/translations.js',
        'run_scratchblocks.js',
    ),

    'styles' => 'ScratchBlocks/src/defs.css',

    // jQuery is loaded anyway
    'dependencies' => array(),

    // Where the files are
    'localBasePath' => __DIR__,
    'remoteExtPath' => 'ScratchBlocks'
);

