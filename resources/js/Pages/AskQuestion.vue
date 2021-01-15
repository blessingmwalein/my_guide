<template>
   <app-layout>
       <bread-crumbs name="Ask Question"></bread-crumbs>

       <section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				
				<div class="page-content ask-question">
					<div class="boxedtitle page-title"><h2>Ask Question</h2></div>
					
					<p>Please Explain the problem you are facing developers are available to help.</p>
					
					<div class="form-style form-style-3" id="question-submit">
						<form>
							<div class="form-inputs clearfix">
								<p>
									<label class="required">Question Title<span>*</span></label>
									<input type="text" id="question-title" v-model="question.title">
									<span v-if="title_errors.length<=0" class="form-description">Please choose an appropriate title for the question to answer it even easier .</span>
									<span v-else class="form-description" style="color:red" v-for="error in title_errors">{{error}}</span>

                                </p>
                                 <p>
									<label class="required">Tags<span>*</span></label>
                                    <ul class="taglist">
                                        <li v-for="(tag, index) in tags" class="tag"><span>{{tag.name}}</span> <a tabindex="-1" class="delete" @click.prevent="removeTag(index)"><span>[X]</span></a></li>
                                     </ul>
									<span class="styled-select">
										<select v-model="option_tag" v-on:change="addTag('option_tag')">
											<option  value="">Select a Tag</option>
											<option v-for="tag in all_tags" :value="tag.name">{{tag.name}}</option>
										</select>
									</span>
									<span class="form-description">Please choose on the available tags .</span>
								</p>
								<p>
									<label>Tags</label>
                                    <ul class="taglist">
                                        <li class="input"><input type="text" v-on:change="addTag('tag')" v-model="tag" style="width: 26px;"><span style="display: none;"></span></li>
                                     </ul>
									<span class="form-description"> Add tag if not available.Please choose  suitable Keywords Ex : <span class="color">question , poll</span> .</span>
								</p>								
							</div>

							<div id="form-textarea">
								<p>
									<label class="required">Question Body<span>*</span></label>
									<editor  v-model="question.body" ref="tuiEditor"  height='400px'></editor>
									<span v-if="body_errors.length<=0" class="form-description">Type the description thoroughly and in detail .</span>
									<span v-else class="form-description" style="color:red" v-for="error in body_errors">{{error}}</span>
								</p>
							</div>
							<p class="form-submit">
								<button  @click.prevent="summitQuestion" type="button" id="publish-question" class="button color small submit">
								 <div v-if="question_button" class="loader"><div class="loader_html"></div></div>
									Publish Your Question</button>
							</p>
						</form>
					</div>
				</div>
			</div>
			<widget></widget>
		</div>
	</section>
    </app-layout>
</template>

<script>
    import axios from 'axios'
    import AppLayout from '@/Layouts/AppLayout'
    import BreadCrumbs from '@/Components/BreadCrumbs'
    import TextEditor from '@/Components/TextEditor'
    import Widget from '@/Components/Widgets/Widget'


    import 'tui-editor/dist/tui-editor.css';
	import 'tui-editor/dist/tui-editor-contents.css';
	import 'codemirror/lib/codemirror.css';
	import 'highlight.js/styles/github.css'
	import { Editor, Viewer } from '@toast-ui/vue-editor'


	import global from '@/Mixins/global.js'

    export default {
        components: {
            AppLayout,
            BreadCrumbs,
            TextEditor,
            Editor,
            Widget
        },
		mixins:[global],
		mounted(){
			this.getTags()
			this.selected_page = "ask"
		},
        data(){
            return{
                question: {
                    title:'',
                    body:'text'
                },
                tags:[],
                tag:"",
				option_tag:"",
                body_errors:[],
                title_errors:[]
            }
        },
        methods:{
        	getHtml() {
		        let html = this.$refs.toastuiEditor.invoke('getHtml');
		    },
            summitQuestion(){
            	console.log(this.$refs.tuiEditor.invoke('getHtml'))
				this.question_button = true
                axios.post('/api/question/ask', {
                    'title' : this.question.title,
                    'body' : this.$refs.tuiEditor.invoke('getHtml'),
                    'tags' : this.tags,
                    'user_id' : this.$page.props.user.id
                }).then(response=>{
					this.question_button = false
                    console.log(response.data)

					if(response.status === 200 || response.status === 201){
						window.location.href = "/question/"+response.data.data.slug
					}
					
                }).catch(error=>{
					this.question_button = false
                    console.log(error.response.data.errors)

					if(error.response.data.errors){
						this.title_errors = error.response.data.errors.title
						this.body_errors = error.response.data.errors.body
					}
                 

                })
            },
            addTag(type){
				if(type=='tag'){
					 this.tags.push({name:this.tag})
                	this.tag= ""
				}else{
					 this.tags.push({name:this.option_tag})
               		 this.option_tag= ""
				}
               
            },
            removeTag(index){
                this.tags.splice(index,1)
            }
        }
    }
</script>

