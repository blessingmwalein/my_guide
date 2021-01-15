<template>
	<div>
		<editor v-model='text' height='500px'></editor>
		<Viewer :value="editorText"/>
	</div>
	
</template>
<script>
	import 'tui-editor/dist/tui-editor.css';
	import 'tui-editor/dist/tui-editor-contents.css';
	import 'codemirror/lib/codemirror.css';
	import 'highlight.js/styles/github.css'
	import { Editor, Viewer } from '@toast-ui/vue-editor'

	export default {
		props:['text'],
		data(){
			return {
				editorText:''
			}
		},
		components:{
			Editor,
			Viewer
		}
	}
</script>