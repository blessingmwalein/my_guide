<template>
   <app-layout>
       <bread-crumbs :name="question.data.title"></bread-crumbs>

    <section class="container main-content">
		<div class="row">
			<div class="col-md-9">
				<question :question="question.data"></question>
				
				<div class="share-tags page-content">
					<div class="question-tags">
                      <span class="badge rounded-pill bg-light text-dark tag-pill" style="padding:8px; border-radius:3px" v-for="tag in question.data.tags">{{tag.tag.name}}</span>
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
				        <h4>{{question.data.user.name}}</h4>
                        User joined the platform {{timeSince(new Date(question.data.user.created_at))}} ago
				    </div>
				</div><!-- End about-author -->
				
				<div id="related-posts">
					<h2>Related questions</h2>
					<ul class="related-posts">
						<li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This Is My Second Poll Question</a></h3></li>
						<li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my third Question</a></h3></li>
						<li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my fourth Question</a></h3></li>
						<li class="related-item"><h3><a href="#"><i class="icon-double-angle-right"></i>This is my fifth Question</a></h3></li>
					</ul>
				</div><!-- End related-posts -->
				
				<div id="commentlist" class="page-content">
					<div class="boxedtitle page-title"><h2>Answers ( <span class="color">5</span> )</h2></div>
					<ol class="commentlist clearfix">
					    <li class="comment">
					        <div class="comment-body comment-body-answered clearfix"> 
					            <div class="avatar"><img alt="" src="/assets/images/admin.jpg"></div>
					            <div class="comment-text">
					                <div class="author clearfix">
					                	<div class="comment-author"><a href="#">admin</a></div>
					                	<div class="comment-vote">
						                	<ul class="question-vote">
						                		<li><a href="#" class="question-vote-up" title="Like"></a></li>
						                		<li><a href="#" class="question-vote-down" title="Dislike"></a></li>
						                	</ul>
					                	</div>
					                	<span class="question-vote-result">+1</span>
					                	<div class="comment-meta">
					                        <div class="date"><i class="icon-time"></i>January 15 , 2014 at 10:00 pm</div> 
					                    </div>
					                    <a class="comment-reply" href="#"><i class="icon-reply"></i>Reply</a> 
					                </div>
					                <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
					                </div>
									<div class="question-answered question-answered-done"><i class="icon-ok"></i>Best Answer</div>
					            </div>
					        </div>
					        <ul class="children">
					            <li class="comment">
					                <div class="comment-body clearfix"> 
					                	<div class="avatar"><img alt="" src="/assets/images/avatar.png"></div>
					                    <div class="comment-text">
					                        <div class="author clearfix">
					                        	<div class="comment-author"><a href="#">vbegy</a></div>
					                        	<div class="comment-vote">
					                            	<ul class="question-vote">
					                            		<li><a href="#" class="question-vote-up" title="Like"></a></li>
					                            		<li><a href="#" class="question-vote-down" title="Dislike"></a></li>
					                            	</ul>
					                        	</div>
					                        	<span class="question-vote-result">+1</span>
					                        	<div class="comment-meta">
					                                <div class="date"><i class="icon-time"></i>January 15 , 2014 at 10:00 pm</div> 
					                            </div>
					                            <a class="comment-reply" href="#"><i class="icon-reply"></i>Reply</a> 
					                        </div>
					                        <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
					                        </div>
					                    </div>
					                </div>
					                <ul class="children">
					                    <li class="comment">
					                        <div class="comment-body clearfix"> 
					                            <div class="avatar"><img alt="" src="/assets/images/admin.jpg"></div>
					                            <div class="comment-text">
					                                <div class="author clearfix">
					                                	<div class="comment-author"><a href="#">admin</a></div>
					                                	<div class="comment-vote">
					                                    	<ul class="question-vote">
					                                    		<li><a href="#" class="question-vote-up" title="Like"></a></li>
					                                    		<li><a href="#" class="question-vote-down" title="Dislike"></a></li>
					                                    	</ul>
					                                	</div>
					                                	<span class="question-vote-result">+9</span>
					                                	<div class="comment-meta">
					                                        <div class="date"><i class="icon-time"></i>January 15 , 2014 at 10:00 pm</div> 
					                                    </div>
					                                    <a class="comment-reply" href="#"><i class="icon-reply"></i>Reply</a> 
					                                </div>
					                                <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
					                                </div>
					                            </div>
					                        </div>
					                    </li>
					                 </ul><!-- End children -->
					            </li>
					            <li class="comment">
					            	<div class="comment-body clearfix"> 
				                        <div class="avatar"><img alt="" src="/assets/images/avatar.png"></div>
				                        <div class="comment-text">
				                            <div class="author clearfix">
				                            	<div class="comment-author"><a href="#">ahmed</a></div>
				                            	<div class="comment-vote">
				                                	<ul class="question-vote">
				                                		<li><a href="#" class="question-vote-up" title="Like"></a></li>
				                                		<li><a href="#" class="question-vote-down" title="Dislike"></a></li>
				                                	</ul>
				                            	</div>
				                            	<span class="question-vote-result">-3</span>
				                            	<div class="comment-meta">
				                                    <div class="date"><i class="icon-time"></i>January 15 , 2014 at 10:00 pm</div> 
				                                </div>
				                                <a class="comment-reply" href="#"><i class="icon-reply"></i>Reply</a> 
				                            </div>
				                            <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
				                            </div>
				                        </div>
				                    </div>
					            </li>
					        </ul><!-- End children -->
					    </li>
					    <li class="comment">
					        <div class="comment-body clearfix"> 
					            <div class="avatar"><img alt="" src="/assets/images/avatar.png"></div>
					            <div class="comment-text">
					                <div class="author clearfix">
					                	<div class="comment-author"><a href="#">2code</a></div>
					                	<div class="comment-vote">
					                    	<ul class="question-vote">
					                    		<li><a href="#" class="question-vote-up" title="Like"></a></li>
					                    		<li><a href="#" class="question-vote-down" title="Dislike"></a></li>
					                    	</ul>
					                	</div>
					                	<span class="question-vote-result">+1</span>
					                	<div class="comment-meta">
					                        <div class="date"><i class="icon-time"></i>January 15 , 2014 at 10:00 pm</div> 
					                    </div>
					                    <a class="comment-reply" href="#"><i class="icon-reply"></i>Reply</a> 
					                </div>
					                <div class="text"><p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravida odio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequat. Vivamus vulputate posuere nisl quis consequat.</p>
					                </div>
					            </div>
					        </div>
					    </li>
					</ol><!-- End commentlist -->
				</div><!-- End page-content -->
				
				<div id="respond" class="comment-respond page-content clearfix">
				    <div class="boxedtitle page-title"><h2>Leave a reply</h2></div>
				    <form action="#" method="post" id="commentform" class="comment-form">
				        <div id="respond-inputs" class="clearfix">
				            <p>
				                <label class="required" for="comment_name">Name<span>*</span></label>
				                <input name="author" type="text" value="" id="comment_name" aria-required="true">
				            </p>
				            <p>
				                <label class="required" for="comment_email">E-Mail<span>*</span></label>
				                <input name="email" type="text" value="" id="comment_email" aria-required="true">
				            </p>
				            <p class="last">
				                <label class="required" for="comment_url">Website<span>*</span></label>
				                <input name="url" type="text" value="" id="comment_url">
				            </p>
				        </div>
				        <div id="respond-textarea">
				            <p>
				                <label class="required" for="comment">Comment<span>*</span></label>
				                <textarea id="comment" name="comment" aria-required="true" cols="58" rows="8"></textarea>
				            </p>
				        </div>
				        <p class="form-submit">
				        	<input name="submit" type="submit" id="submit" value="Post your answer" class="button small color">
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
									<input type="text" value="Username" onfocus="if (this.value == 'Username') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Username';}">
									<i class="icon-user"></i>
								</p>
								<p class="login-password">
									<input type="password" value="Password" onfocus="if (this.value == 'Password') {this.value = '';}" onblur="if (this.value == '') {this.value = 'Password';}">
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
								<a href="#"><img width="60" height="60" src="/assets/images/admin.jpg" alt=""></a>
							</div> 
							<h6><a href="#">admin</a></h6>
							<span class="comment">12 Points</span>
						</li>
						<li>
							<div class="author-img">
								<a href="#"><img width="60" height="60" src="/assets/images/avatar.png" alt=""></a>
							</div> 
							<h6><a href="#">vbegy</a></h6>
							<span class="comment">10 Points</span>
						</li>
						<li>
							<div class="author-img">
								<a href="#"><img width="60" height="60" src="/assets/images/avatar.png" alt=""></a>
							</div> 
							<h6><a href="#">ahmed</a></h6>
							<span class="comment">5 Points</span>
						</li>
					</ul>
				</div>
				
				<div class="widget widget_tag_cloud">
					<h3 class="widget_title">Tags</h3>
					<a href="#" v-for="tag in question.data.tags">{{tag.tag.name}}</a>
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
				
			</aside><!-- End sidebar -->
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

    export default {
        props:['question'],
        components: {
            AppLayout,
            BreadCrumbs,
            Question
        },
		mixins:[global],
		mounted(){
			this.getTags()
		},
        data(){
            return{
                
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
                }).catch(error=>{
					this.question_button = false
                    console.log(error.response.data.errors)
                    this.title_errors = error.response.data.errors.title
                    this.body_errors = error.response.data.errors.body

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

