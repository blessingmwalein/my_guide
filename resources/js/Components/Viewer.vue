<template>
		<viewer :value="text"  height="500px"/>	
</template>
<script>
	
	import 'tui-editor/dist/tui-editor-contents.css';

	import { Viewer } from '@toast-ui/vue-editor'


	export default {
		props:['text'],
		components:{
			Viewer
		}
	}
</script>