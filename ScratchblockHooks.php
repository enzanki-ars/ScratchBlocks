class ScratchblockHooks {
	punlic static  function sbSetup () {
		global $wgOut;
		$wgOut->addModules('ext.scratchBlocks');
	}
	
	public static function sbParserInit (Parser $parser) {
		// Register <scratchblocks> and <sb> tag
		$parser->setHook('scratchblocks', 'sbRenderTag');
		$parser->setHook('sb', 'sbRenderInlineTag');
		return true;
	}
	 

	// Ouput HTML for <scratchblocks> tag

	public static function sbRenderTag ($input, array $args, Parser $parser, PPFrame $frame) {
		return '<pre class="blocks">' . htmlspecialchars($input) . '</pre>';
	}

	// Output HTML for inline <sb> tag

	public static function sbRenderInlineTag ($input, array $args, Parser $parser, PPFrame $frame) {
		//throw new Exception("what");
		return '<code class="blocks">' . htmlspecialchars($input) . '</code>';
	}
}