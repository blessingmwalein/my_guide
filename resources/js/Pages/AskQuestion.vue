<template>
   <app-layout>
       <bread-crumbs name="Ask Question"></bread-crumbs>

       <section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				
				<div class="page-content ask-question">
					<div class="boxedtitle page-title"><h2>Ask Question</h2></div>
					
					<p>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque.</p>
					
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
    						
								<label>Attachment</label>
								<div class="fileinputs">
									<input type="file" class="file">
									<div class="fakefile">
										<button type="button" class="button small margin_0">Select file</button>
										<span><i class="icon-arrow-up"></i>Browse</span>
									</div>
								</div>
								
							</div>
							<div id="form-textarea">
								<p>
									<label class="required">Details<span>*</span></label>
									<textarea v-model="question.body" id="question-details" aria-required="true" cols="58" rows="8"></textarea>
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
			<aside class="col-md-3 sidebar">
				<div class="widget widget_stats">
					<h3 class="widget_title">Stats</h3>
					<div class="ul_list ul_list-icon-ok">
						<ul>
							<li><i class="icon-question-sign"></i>Questions ( <span>20</span> )</li>
							<li><i class="icon-comment"></i>Answers ( <span>50</span> )</li>
						</ul>
					</div>
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
					<h3 class="widget_title">Login</h3>
					<div class="form-style form-style-2">
						<form>
							<div class="form-inputs clearfix">
								<p class="login-text">
									<input type="text" value="Username" >
									<i class="icon-user"></i>
								</p>
								<p class="login-password">
									<input type="password" value="Password" >
									<i class="icon-lock"></i>
									<a href="#">Forget</a>
								</p>
							</div>
							<p class="form-submit login-submit">
								<input type="submit" value="Log in" class="button color small login-submit submit">
							</p>
							<div class="rememberme">
								<label><input type="checkbox" checked="checked"> Remember Me</label>
							</div>
						</form>
						<ul class="login-links login-links-r">
							<li><a href="#">Register</a></li>
						</ul>
						<div class="clearfix"></div>
					</div>
				</div>
				
				<div class="widget widget_highest_points">
					<h3 class="widget_title">Highest points</h3>
					<ul>
						<li>
							<div class="author-img">
								<a href="#"><img width="60" height="60" src="/assets/admin.jpg" alt=""></a>
							</div> 
							<h6><a href="#">admin</a></h6>
							<span class="comment">12 Points</span>
						</li>
						<li>
							<div class="author-img">
								<a href="#"><img width="60" height="60" src="/assets/avatar.png" alt=""></a>
							</div> 
							<h6><a href="#">vbegy</a></h6>
							<span class="comment">10 Points</span>
						</li>
						<li>
							<div class="author-img">
								<a href="#"><img width="60" height="60" src="/assets/avatar.png" alt=""></a>
							</div> 
							<h6><a href="#">ahmed</a></h6>
							<span class="comment">5 Points</span>
						</li>
					</ul>
				</div>
				
				<div class="widget widget_tag_cloud">
					<h3 class="widget_title">Tags</h3>
					<a href="#">projects</a>
					<a href="#">Portfolio</a>
					<a href="#">Wordpress</a>
					<a href="#">Html</a>
					<a href="#">Css</a>
					<a href="#">jQuery</a>
					<a href="#">2code</a>
					<a href="#">vbegy</a>
				</div>
				
				<div class="widget">
					<h3 class="widget_title">Recent Questions</h3>
					<ul class="related-posts">
						<li class="related-item">
							<h3><a href="#">This is my first Question</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<div class="clear"></div><span>Feb 22, 2014</span>
						</li>
						<li class="related-item">
							<h3><a href="#">This Is My Second Poll Question</a></h3>
							<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit.</p>
							<div class="clear"></div><span>Feb 22, 2014</span>
						</li>
					</ul>
				</div>
				
			</aside>
		</div>
	</section>
    </app-layout>
</template>

<script>
    import axios from 'axios'
    import AppLayout from '@/Layouts/AppLayout'
    import BreadCrumbs from '@/Components/BreadCrumbs'
	import global from '@/Mixins/global.js'

    export default {
        components: {
            AppLayout,
            BreadCrumbs
        },
		mixins:[global],
		mounted(){
			this.getTags()
		},
        data(){
            return{
                question: {
                    title:'',
                    body:''
                },
                tags:[],
                tag:"",
				option_tag:"",
                body_errors:[],
                title_errors:[]
            }
        },
        methods:{
            summitQuestion(){
				this.question_button = true
                axios.post('/api/question/ask', {
                    'title' : this.question.title,
                    'body' : this.question.body,
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

