<template>
   <app-layout>
        <bread-crumbs :name="question_data.data.title"></bread-crumbs>

	    <section class="container main-content">
			<div class="row">
				<div class="col-md-9">
					 
					<div id="message_box" v-if="message_success" class="alert-message info">
                    <i class="icon-bullhorn"></i>
			                    <p><span>Success message</span><br>
			                    {{message_success}}</p>
			        </div>
					<question :question="question_data.data"></question>
					
					
					<div class="share-tags page-content">
						<div class="question-tags">
	                      <span class="badge rounded-pill bg-light text-dark tag-pill" style="padding:8px; border-radius:3px" v-for="tag in question_data.data.tags">{{tag.tag.name}}</span>
						</div>

						<div class="share-inside"><i class="icon-share-alt"></i>Tags
	                    
	                    </div>
						<div class="clearfix"></div>

	                    
					</div><!-- End share-tags -->
					
					<div class="about-author clearfix">
					    <div class="author-image">
					    	<a href="#" original-title="admin" class="tooltip-n"><img alt="" src="/assets/images/admin.jpg"></a>
					    </div>
					    <div class="author-bio">
					        <h4>{{question_data.data.user.name}}[{{question_data.data.user.profile.reputation}}]</h4>
	                        User joined the platform {{timeSince(new Date(question_data.data.user.created_at))}} ago

					    </div>
					</div><!-- End about-author -->
					
					<div id="commentlist" class="page-content">
						<div class="boxedtitle page-title"><h2>Answers ( <span class="color">{{question_data.data.answers.length}}</span> )</h2></div>
						<ol class="commentlist clearfix">
						    <answer :key="answer.id" v-for="answer in question_data.data.answers" :answer="answer" :question="question_data.data"></answer>
						    
						</ol><!-- End commentlist -->
					</div><!-- End page-content -->
					
					<div id="respond" class="comment-respond page-content clearfix">
					    <div class="boxedtitle page-title"><h2>Leave a reply</h2></div>
					    <form action="#" method="post" id="commentform" class="comment-form">
					        <div id="respond-textarea">
					            <p>
					                <label class="required" for="comment">Add and answer<span>*</span></label>
									<editor ref="tuiEditor"  height='400px'></editor>
					                
					            </p>
					        </div>
					        <p class="form-submit">
					        	<button   id="submit" @click.prevent="submitAnswer" class="button small color">
					        	<div v-if="answer_button" class="loader"><div class="loader_html"></div></div>
										Publish Your Question</button>
					        </p>
					    </form>
					</div>
					
					<div class="post-next-prev clearfix">
					    <p class="prev-post">
					        <a href="#"><i class="icon-double-angle-left"></i>&nbsp;Prev question</a>
					    </p>
					    <p class="next-post">
					        <a href="#">Next question&nbsp;<i class="icon-double-angle-right"></i></a>                                
					    </p>
					</div><!-- End post-next-prev -->	
				</div><!-- End main -->
				<widget ></widget>
			</div><!-- End row -->
		</section>
	    </app-layout>
</template>

<script>
    import axios from 'axios'
    import AppLayout from '@/Layouts/AppLayout'
    import BreadCrumbs from '@/Components/BreadCrumbs'
	import global from '@/Mixins/global.js'
    import Question from '@/Components/Question'
	import Widget from '@/Components/Widgets/Widget'
	import CommentForm from '@/Components/CommentForm'
	import Answer from '@/Components/Answer'

	import 'tui-editor/dist/tui-editor.css';
	import 'tui-editor/dist/tui-editor-contents.css';
	import 'codemirror/lib/codemirror.css';
	import 'highlight.js/styles/github.css'
	import { Editor, Viewer } from '@toast-ui/vue-editor'
    

    export default {
        props:['question'],
        components: {
            AppLayout,
            BreadCrumbs,
            Question,
            Widget,
            Editor,
            CommentForm,
            Answer
        },
		mixins:[global],
		mounted(){
			this.getTags()
		},
        data(){
            return{
                message_success:"",
                question_data:this.question,
                comment_id:0
            }
        },
        methods:{
            submitAnswer(){
            	this.answer_button =true
            	axios.post('/api/answer/store', {
            		"question_id" : this.question_data.data.id,
            		"user_id" : this.$page.props.user.id,
            		"body": this.$refs.tuiEditor.invoke('getHtml')
            	}).then(response=>{
            		this.answer_button =false
            		this.question_data.data.answers.push(response.data.data)
            		this.question_data.data.answer_counter += 1
            		this.message_success="Your Answer Have been added"
                    $('html, body').animate({scrollTop:$('#message_box').position().top}, 'fast');

            		console.log(response.data)
            		
            	}).catch(error=>{
            		this.answer_button =false
            		console.log(error)
            	})
            },
            comment(id){
            	this.comment_id = id;
            	
            },
          
        }
    }
</script>

