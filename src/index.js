import { registerBlockType } from '@wordpress/blocks';
import { SVG } from '@wordpress/components';
import { __ } from '@wordpress/i18n';
import { Edit } from './edit';
import metadata from './block.json';

registerBlockType(metadata, {
    attributes: {
        deliveryDate: {
            type: 'string', // Adjust the type as necessary
            default: '', // Default value for the delivery date attribute
        },
        // Other attributes...
    },
    icon: {
        src: (
            <svg xmlns="http://www.w3.org/2000/svg" viewBox="0 0 24 24" fill="#000000">
  <path d="M0 0h24v24H0V0z" fill="none"/>
  <path d="M18 4h-1V2h-2v2H9V2H7v2H6c-1.1 0-1.99.9-1.99 2L4 20c0 1.1.89 2 1.99 2H18c1.1 0 2-.9 2-2V6c0-1.1-.9-2-2-2zm0 16H6V8h12v12zm-6-9h4v4h-4z"/>
</svg>

        ),
        foreground: '#874FB9', // Adjust the color as needed
    },
    edit: Edit,
});
