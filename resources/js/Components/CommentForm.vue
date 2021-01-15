<template>
	<div>
		<a href="#" v-if="!show" @click.prevent="comment()" class="button small green-button">Comment</a>
		<li v-if="show" class="comment" >
        <div class="comment-body clearfix">
        	<div class="comment-text">
            	<div class=" text">
						<textarea v-model="comment_body" aria-required="true" style="width:100%; border:none" placeholder="Your comment" cols="58" rows="3"></textarea>
						<a href="#" @click.prevent="commentSubmit" class="button small green-button">Comment</a>
				</div> 
			</div>
        </div>
      </li>
	</div>
	
</template>

<script>
import axios from 'axios'
	
	export default {
		props:["answer"],
		data(){
			return {
				show:false,
				comment_body:""
			}
		},
		methods:{
			comment(){
            	this.show = true;
            },

            commentSubmit(){
				axios.post('/api/answer/comment', {
					"user_id": this.$page.props.user.id,
					"answer_id":this.answer.id,
					"body": this.comment_body
				}).then(response=>{
					this.$emit('comment_added', response.data.data)
					console.log(response.data)
				}).catch(error=>{
					console.log(error)
				})
			},
		}
	}
</script>