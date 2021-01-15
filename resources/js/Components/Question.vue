<template>
    <div id="message_box">
        <div v-if="success_message" class="alert-message info">
                    <i class="icon-bullhorn"></i>
                    <p><span>Success message</span><br>
                    {{success_message}}</p>
        </div>
        <div v-if="error_message"  class="alert-message error">
            <i class="icon-flag"></i>
            <p><span>Opps something went wrong!</span><br>
           {{ error_message}}</p>
        </div>
        <article class="question single-question question-type-normal">
            <h2>
                <inertia-link :href="route('question-single', question.slug)">{{question.title}}</inertia-link>
            </h2>
            <a class="question-report" href="#">Report</a>
            <div class="question-type-main"><i class="icon-question-sign"></i>Question</div>
            <div class="question-inner">
                <div class="clearfix"></div>
                <div class="question-desc">
                    <div v-html="question.body" style="margin-bottom:25px"></div>
                    
                    <span class="badge rounded-pill bg-light text-dark tag-pill" style="padding:5px; border-radius:4px" v-for="tag in question.tags">{{tag.tag.name}}</span>
                </div>
                <div class="question-details">
                    <span class="question-answered question-answered-done"><i class="icon-ok"></i>{{question.solved==1?'solved': 'No answer yet'}}</span>
                    <span class="question-favorite"><i class="icon-star"></i>{{question.stars.length}}</span>
                </div>
                <span class="question-date"><i class="icon-time"></i>asked {{timeSince(new Date(question.created_at))}} ago</span>
                <span class="question-category"><a href="#"><i class="icon-user"></i>{{question.user.profile.nick_name}}</a></span>

                <span class="question-comment"><a href="#"><i class="icon-comment"></i>{{question.answer_counter}} Answer{{question.answer_counter>=0? "'s":  ""}}</a></span>
                <span class="question-view"><i class="icon-user"></i>70 views</span>
                <span class="single-question-vote-result">{{question.vote_count> 0 ? '+' :""}}{{question.vote_count}}</span>
                <ul  class="single-question-vote" v-if="!home">
                    <li v-if="!isVoteLoading"><a @click.prevent="downvote" href="#" class="single-question-vote-down" title="Dislike"><i  class="icon-thumbs-down"></i></a></li>
                    <li v-if="!isVoteLoading"><a @click.prevent="upvote" href="#" class="single-question-vote-up" title="Like"><i  class="icon-thumbs-up"></i></a></li>
                    <li v-if="isVoteLoading" style="width:10px;height:10px"><div v-if="isVoteLoading" class="loader"><div class="loader_html"></div></div></li>
                </ul>               
                <div class="clearfix"></div>
            </div>
        </article>
    </div>
    
</template>

<script>
    import axios from 'axios'
	import global from '@/Mixins/global.js'

    export default {
        props:['question', "home"],
		mounted(){
            console.log("Zvaita")
        },
        data(){
            return {
                isVoteLoading:false,
                success_message:"",
                error_message:""
            }
        },
        mixins:[global],
        methods:{
            upvote(){
                this.isVoteLoading = true
                if( !this.$page.props.user){
                        window.location.href = '/login'
                        return
                    }
                 if(this.question.votes){
                    this.question.votes.forEach(vote =>{
                        if(vote.user_id === this.$page.props.user.id){
                             this.isVoteLoading = false
                             this.error_message = "Cant vote again, your vote for this question is locked"
                             $('html, body').animate({scrollTop:$('#message_box').position().top}, 'fast');
                            throw new Error("Stopping the function!");    
                        }
                    })
                 }
                 
                 if(this.question.user.id === this.$page.props.user.id ){
                         this.error_message = "Cant vote for your own question"
                         this.isVoteLoading = false
                    }else{
                         axios.post('/api/question/upvote',{
                            'question_id': this.question.id,
                            'user_id' :  this.$page.props.user.id,
                            'whom_question': this.question.user.id
                        }).then(response=>{
                            this.question = response.data.data
                            this.success_message = "Vote have voted for this question"
                            this.isVoteLoading = false
                             $('html, body').animate({scrollTop:$('#message_box').position().top}, 'fast');
                            console.log(response.data)
                        }).catch(error=>{
                            this.isVoteLoading = false
                            if( this.error.message){
                                this.error_message = error.message
                                $('html, body').animate({scrollTop:$('#message_box').position().top}, 'fast');
                            }
                            $('html, body').animate({scrollTop:$('#message_box').position().top}, 'fast');
                            console.log(error)
                        })
                    }
               
            },
            downvote(){
                this.isVoteLoading = true
                if( !this.$page.props.user){
                        window.location.href = '/login'
                        return
                    }
                if(this.question.votes){
                    this.question.votes.forEach(vote =>{
                        if(vote.user_id === this.$page.props.user.id){
                             this.isVoteLoading = false
                            this.error_message = "Cant vote again, your vote for this question is locked"
                            $('html, body').animate({scrollTop:$('#message_box').position().top}, 'fast');
                            throw new Error("Stopping the function!");
                        }
                    })
                 }

                 if(this.question.user.id === this.$page.props.user.id ){
                         this.error_message = "Cant vote for your own question"
                         this.isVoteLoading = false
                    }
                    else{
                    axios.post('/api/question/downvote',{
                        'question_id': this.question.id,
                        'user_id' :  this.$page.props.user.id,
                        'whom_question': this.question.user.id
                    }).then(response=>{
                        this.success_message = "Vote have voted for this question"
                        this.question = response.data.data
                        this.isVoteLoading = false
                        $('html, body').animate({scrollTop:$('#message_box').position().top}, 'fast');
                        console.log(response.data)
                    }).catch(error=>{
                        this.error_message = error.message
                        this.isVoteLoading = false
                        $('html, body').animate({scrollTop:$('#message_box').position().top}, 'fast');

                        console.log(error)
                    })
                }
            }
        }
    }
</script>
<style>
    
</style>

