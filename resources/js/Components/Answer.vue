<template>
	<li  class="comment">
        <div class="comment-body comment-body-answered clearfix"> 
            <div class="avatar"><img alt="" src="/assets/images/admin.jpg"></div>
            <div class="comment-text">
                <div class="author clearfix">
                	<div class="comment-author"><a href="#">{{answer_data.user.profile.nick_name}}</a></div>
                	<div class="comment-vote">
	                	<ul class="question-vote">
	                		<li><a href="#" class="question-vote-up" @click.prevent="upvote" title="Like"></a></li>
	                		<li><a href="#" class="question-vote-down" @click.prevent="downvote" title="Dislike"></a></li>
	                	</ul>
                	</div>
                	<span class="question-vote-result">{{answer_data.vote_count}}</span>
                	<div class="comment-meta">
                        <div class="date"><i class="icon-time"></i>{{timeSince(new Date(answer_data.created_at))}} ago</div> 
                    </div>
                    <a class="comment-reply" href="#"><i class="icon-reply"></i>Reply</a> 
                </div>
                <div class="text" v-html="answer_data.body">	</div>
				<div v-if="answer_data.best_answer==1" class="question-answered question-answered-done"><i class="icon-ok"></i>
				Best Answer</div>
				<div v-else class="question-answered question-answered-done"><i class="icon-remove"></i>
				Not Best Answer</div>
            </div>
        </div>
        <ul class="children">
            <li v-for="comment in answer_data.comments" class="comment">
                <div class="comment-body clearfix"> 
                	<div class="avatar"><img alt="" src="/assets/images/avatar.png"></div>
                    <div class="comment-text">
                        <div class="author clearfix">
                        	<div class="comment-author"><a href="#">{{comment.user.profile.nick_name}}</a></div>
                        	<div class="comment-meta">
                                <div class="date"><i class="icon-time"></i>{{timeSince(new Date(comment.created_at))}}</div> 
                            </div>
                            <a class="comment-reply" href="#"><i class="icon-reply"></i>Reply</a> 
                        </div>
                        <div class="text"><p>{{comment.body}}</p>
                        </div>
                    </div>
                </div>
            </li>			
            <comment-form  @comment_added="updateParent" :answer="answer"></comment-form>
           
        </ul>
    </li>
</template>

<script >
import axios from 'axios'
	import global from '@/Mixins/global.js'
	import CommentForm from '@/Components/CommentForm'

	export default{
		props:['answer', "question"],
		data(){
			return {
				answer_data: this.answer,
				new_comment:{}
				
			}
		},
		components: {
            CommentForm,
        },
        mixins:[global],
		methods:{
			
			upvote(){
               console.log("zvatanga")

                if( !this.$page.props.user){
                        window.location.href = '/login'
                        return
                    }
                if(this.answer_data.votes){
                    this.answer_data.votes.forEach(vote =>{
                        if(vote.user_id === this.$page.props.user.id){
                            throw new Error("Stopping the function!");
                        }
                    })
                 }

                 if(this.answer_data.user.id === this.$page.props.user.id ){
                        
                         this.isVoteLoading = false
                         return ;
                    }
                    else{
                    axios.post('/api/answer/upvote',{
                            'answer_id': this.answer_data.id,
                            'user_id' :  this.$page.props.user.id,
                            'whom_answer': this.answer_data.user.id
                        }).then(response=>{
                        	this.answer_data  = response.data.data
                           
                            console.log(response.data)
                        }).catch(error=>{
                            console.log(error)
                        })
               	}
            },
            downvote(answer){
                this.isVoteLoading = true
                if( !this.$page.props.user){
                        window.location.href = '/login'
                        return
                    }
                if(this.answer_data.votes){
                    this.answer_data.votes.forEach(vote =>{
                        if(vote.user_id === this.$page.props.user.id){
                            throw new Error("Stopping the function!");
                        }
                    })
                 }

                 if(this.answer_data.user.id === this.$page.props.user.id ){
                        
                         this.isVoteLoading = false
                         return ;
                    }
                    else{
                    axios.post('/api/answer/downvote',{
                        'answer_id': this.answer_data.id,
                        'user_id' :  this.$page.props.user.id,
                        'whom_answer': this.answer_data.user.id
                    }).then(response=>{
                        
                            this.answer_data  = response.data.data
         
                    }).catch(error=>{
                        console.log(error)
                    })
                }
            },
             updateParent (value) {
             	this.new_comment = value
             	this.answer_data.comments.push(value)
		          console.log(value) // someValue
		      }
		}
	}
</script>