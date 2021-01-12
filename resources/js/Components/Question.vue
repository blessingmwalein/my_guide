<template>
    <article class="question single-question question-type-normal">
        <h2>
            <inertia-link :href="route('question-single', question.slug)">{{question.title}}</inertia-link>
        </h2>
        <a class="question-report" href="#">Report</a>
        <div class="question-type-main"><i class="icon-question-sign"></i>Question</div>
        <div class="question-inner">
            <div class="clearfix"></div>
            <div class="question-desc">
                <p>{{question.body}}</p>
                <span class="badge rounded-pill bg-light text-dark tag-pill" style="padding:5px; border-radius:4px" v-for="tag in question.tags">{{tag.tag.name}}</span>
            </div>
            <div class="question-details">
                <span class="question-answered question-answered-done"><i class="icon-ok"></i>solved</span>
                <span class="question-favorite"><i class="icon-star"></i>{{question.stars.length}}</span>
            </div>
            <span class="question-date"><i class="icon-time"></i>asked {{timeSince(new Date(question.created_at))}} ago</span>
			<span class="question-category"><a href="#"><i class="icon-user"></i>{{question.user.name}}</a></span>

            <span class="question-comment"><a href="#"><i class="icon-comment"></i>{{question.answers.length}} Answer{{question.answers.length>=0? "'s":  ""}}</a></span>
            <span class="question-view"><i class="icon-user"></i>70 views</span>
            <span class="single-question-vote-result">+{{question.vote_count}}</span>
            <ul class="single-question-vote">
                <li><a href="#" class="single-question-vote-down" title="Dislike"><i class="icon-thumbs-down"></i></a></li>
                <li><a @click.prevent="upvote" href="#" class="single-question-vote-up" title="Like"><i class="icon-thumbs-up"></i></a></li>
            </ul>
            <div class="clearfix"></div>
        </div>
    </article>
</template>

<script>
    import axios from 'axios'
	import global from '@/Mixins/global.js'

    export default {
        props:['question'],
		mounted(){
            console.log("Zvaita")
        },
        mixins:[global],
        methods:{
            upvote(){
                axios.post('/api/question/upvote',{
                    'question_id': this.question.id,
                    'user_id' :  this.$page.props.user.id,
                    'whom_question': this.question.user.id
                }).then(response=>{
                    this.question.vote_count += 1
                    console.log(response.data)
                }).catch(error=>{
                    console.log(error)
                })
            }
        }
    }
</script>
<style>
    
</style>

