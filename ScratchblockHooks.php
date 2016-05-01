<?php
class ScratchblockHook {
	public static function sbSetup() {
		global $wgOut;
		$wgOut->addModules('ext.scratchBlocks');
	}
	
	public static function sbParserInit (Parser $parser) {
		// Register <scratchblocks> and <sb> tag
		$parser->setHook('scratchblocks', 'ScratchblockHook::sbRenderTag');
		$parser->setHook('sb', 'ScratchblockHook::sbRenderInlineTag');
		return true;
	}
	 

	// Ouput HTML for <scratchblocks> tag

	public static function sbRenderTag ($input, array $args, Parser $parser, PPFrame $frame) {
		throw new Exception("234");
		return '<pre class="blocks">' . htmlspecialchars($input) . '</pre>';
	}

	// Output HTML for inline <sb> tag

	public static function sbRenderInlineTag ($input, array $args, Parser $parser, PPFrame $frame) {
		//throw new Exception("what");
		throw new Exception("2345");
		return '<code class="blocks">' . htmlspecialchars($input) . '</code>';
	}
}
?>