<template>
	<aside class="col-md-3 sidebar">
				<div class="widget widget_stats">
					<h3 class="widget_title">Stats</h3>
					<div class="ul_list ul_list-icon-ok">
						<ul>
							<li><i class="icon-question-sign"></i>Questions ( <span>{{all_questions.length}}</span> )</li>
							<li><i class="icon-comment"></i>Answers ( <span>50</span> )</li>
						</ul>
					</div>
				</div>

				<div class="widget widget_highest_points">
					<h3 class="widget_title">Users with highest reputation</h3>
					<ul>
						<li v-for="top_user in all_top_5users ">
							<div style="height:60px;width:60px" class="author-img">
								<a href="#"><img width="60" height="60" src="/assets/images/admin.jpg" alt=""></a>
							</div> 
							<h6><a href="#">{{top_user.nick_name}}</a></h6>
							<span class="comment" >{{top_user.reputation}} points</span>
						</li>
					</ul>
				</div>
				
				<div class="widget widget_social">
					<h3 class="widget_title">Find Us</h3>
					<ul>
						<li class="rss-subscribers">
							<a href="#" target="_blank">
							<strong>
								<i class="icon-rss"></i>
								<span>Subscribe</span><br>
								<small>To RSS Feed</small>
							</strong>
							</a>
						</li>
						<li class="facebook-fans">
							<a href="#" target="_blank">
							<strong>
								<i class="social_icon-facebook"></i>
								<span>5,000</span><br>
								<small>People like it</small>
							</strong>
							</a>
						</li>
						<li class="twitter-followers">
							<a href="#" target="_blank">
							<strong>
								<i class="social_icon-twitter"></i>
								<span>3,000</span><br>
								<small>Followers</small>
							</strong>
							</a>
						</li>
						<li class="youtube-subs">
							<a href="#" target="_blank">
							<strong>
								<i class="icon-play"></i>
								<span>1,000</span><br>
								<small>Subscribers</small>
							</strong>
							</a>
						</li>
					</ul>
				</div>
				
				<div class="widget widget_login">
					<div class="form-style form-style-2">
						<form>
							
							<p v-if="this.$page.props.user" class="form-submit login-submit">
								<button @click.prevent="logout" class="button color small login-submit submit">Logout</button>
							</p>
							<p v-else class="form-submit login-submit">
								<inertia-link style="text-align:center;color:white" :href="route('login')" class="button color small login-submit submit">Login</inertia-link>
							</p>
						</form>
						<div class="clearfix"></div>
					</div>
				</div>
				
				
				
				<div class="widget widget_tag_cloud">
					<h3 class="widget_title">Tags</h3>
					<a href="#" :key="tag.key" v-for="tag in all_tags">{{tag.name}}</a>
				</div>
				
			</aside>
</template>

<script>
	
	import global from "@/Mixins/global"
	export default {
		
		mixins:[global],
		mounted(){
			this.getQuestions()
			this.getTags()
		},
		methods :{
        	 logout() {
                this.$inertia.post(route('logout'));
            },
        }
	}
</script>