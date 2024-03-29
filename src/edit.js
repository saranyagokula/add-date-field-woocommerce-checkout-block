import { ValidatedTextInput } from '@woocommerce/blocks-checkout';
import React, { useEffect } from 'react';

import { useBlockProps, InspectorControls } from '@wordpress/block-editor';
import { PanelBody } from '@wordpress/components';
import { __ } from '@wordpress/i18n'; 

export const Edit = ({ attributes, setAttributes }) => {
    const blockProps = useBlockProps();

    return (
        <div {...blockProps}>
            <InspectorControls>
                <PanelBody title={__('Block options', 'delivery_date')}>
                    Options for the block go here.
                </PanelBody>
            </InspectorControls>
            <div className={'example-fields'}>
                <label htmlFor="">Choose your delivery date:</label>
                <ValidatedTextInput
                    id="delivery-date"
                    type="date"
                    required={false}
                    className={'orddd-datepicker'}
                     value={''}
                    style={{ width: '100%' }} // Apply inline styles to match the parent block's width
                    placeholder={''}
                />
            </div>
        </div>
    );
};
