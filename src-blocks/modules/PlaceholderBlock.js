import { registerBlockType } from '@wordpress/blocks'
import { useBlockProps } from "@wordpress/block-editor";

class PlaceholderBlock {
    constructor(blockOptions) {
        this.blockOptions = blockOptions;
        registerBlockType(blockOptions.name, {
            edit: this.edit.bind(this),
            save: this.save.bind(this)
        });
    }

    edit() {
        const blockProps = useBlockProps({className:"placeholder-block"})
        return <div {...blockProps}>{this.blockOptions.title} Placeholder</div>
    }
    
    save() {
        return null;
    }
}

export default PlaceholderBlock;