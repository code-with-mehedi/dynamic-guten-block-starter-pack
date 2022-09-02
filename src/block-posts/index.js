import { registerBlockType } from "@wordpress/blocks";
import { __ } from '@wordpress/i18n';
import { useBlockProps } from '@wordpress/block-editor';
import './style.scss';
import json from "./block.json";
import Edit from "./edit";

const { name } = json;

registerBlockType(name, {

	edit: Edit,
	
});
