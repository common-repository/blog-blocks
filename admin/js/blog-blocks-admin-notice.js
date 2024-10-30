/**
 * Info Box
 */
( function( blocks, editor, i18n, element, components, _ ) {
	var el = element.createElement;
	var RichText = editor.RichText;
	// var MediaUpload = editor.MediaUpload;
	// var registerBlockType = wp.blocks;
	var InnerBlocks = editor.InnerBlocks;

	blocks.registerBlockType( 'blog-blocks/notice', {
		title: i18n.__( 'BB: Notice', 'blog-blocks' ),
		icon: {
	    foreground: '#00a6a6',
	    src: 'info',
	  } ,
	  // Register block styles.
	  styles: [
	  {
	  	name: 'default',
	  	label: i18n.__( 'Information' ),
	  	isDefault: true
	  },
	  {
	  	name: 'warning',
	  	label: i18n.__( 'Warning' )
	  },
	  {
	  	name: 'success',
	  	label: i18n.__( 'Success' )
	  },
	  {
	  	name: 'tip',
	  	label: i18n.__( 'Tip' )
	  },
	  {
	  	name: 'neutral',
	  	label: i18n.__( 'Neutral' )
	  },
	  ],
		category: 'blog-blocks',
		attributes: {
			content: {
				type: 'array',
				source: 'children',
				selector: 'p',
			},
		},

		edit: function( props ) {
			var attributes = props.attributes;

			return (
				el( 'div', { className: props.className },
					( 'undefined' !== typeof props.insertBlocksAfter ) ?
					el( InnerBlocks, {
						//tagName: 'p',
						//inline: true,
						//placeholder: i18n.__( 'Content...', 'blog-blocks' ),
						value: attributes.content,
						onChange: function( value ) {
							props.setAttributes( { content: value } );
						},
					} ) : el( 'div' )
					
				)
			);
		},
		save: function( props ) {
			var attributes = props.attributes;

			return (
				el( 'div', { className: props.className },
					el( InnerBlocks.Content, {
						/*tagName: 'p',*/ value: attributes.content
					} ),
				)
			);
		},
	} );
}(
	window.wp.blocks,
	window.wp.editor,
	window.wp.i18n,
	window.wp.element,
	window.wp.components,
	window._,
) );
