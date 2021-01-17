<template>

	<app-layout>

      <bread-crumbs :name="profile.data.user.name"></bread-crumbs>
       
		<section class="container main-content">
			<div class="row">
				<div class="col-md-9">
					
					<div class="tabs-warp question-tab">
						<ul class="tabs">
							<li class="tab"><a href="#" class="current">About User</a></li>
							<li class="tab"><a href="#">Activity</a></li>
							<li class="tab"><a href="#">User Works</a></li>
						</ul>
						<div class="tab-inner-warp">
							<div class="tab-inner">
								<div class="page-content">
									<h2>About {{profile.data.user.name}}{{[profile.data.reputation]}}</h2>
									<div class="user-profile-img"><img width="30" height="30" src="/assets/images/admin.jpg" alt="admin"></div>
									<div class="ul_list ul_list-icon-ok about-user" style="">
										<ul style="background-color:#EAEAEB; padding:5px; margin-left:70px" >
											<li><i class="icon-plus"></i>Registerd : <span>{{timeSince(new Date(profile.data.created_at))}}</span></li>
											<li><i class="icon-user-md"></i>Nickname : <span>{{profile.data.nick_name}}</span></li>
											<li><i class="icon-envelope"></i>Email : <span>{{profile.data.user.email}}</span></li>
										</ul>
										<ul style="background-color:#EAEAEB; padding:25px; margin-left:70px; margin-top:10px" v-if="profile.data.about">
											
											<li><i class="icon-map-marker"></i>City :
											<span >{{profile.data.about.city}}</span>
										
											<li><i class="icon-globe"></i>Website Link: <a  :href="profile.data.about.personal_site">{{profile.data.about.personal_site}}</a>
											</li>
											<li><i class="icon-github-sign"></i>Github : <a :href="profile.data.github_link" target="_blank">{{profile.data.about.github_link}}</a>
											</li>

											<li><i class="social_icon-smashmag"></i>Status : <a :href="profile.data.current_status" target="_blank">{{profile.data.about.current_status}}</a>
											</li>
											<li><i class="icon-facetime-video"></i>Techs : <span class="badge rounded-pill bg-light text-dark tag-pill" style="padding:5px; border-radius:4px" v-for="tag in profile.data.tags">{{tag.tag.name}}</span>
											</li>

										</ul>
										</ul>
										<a  v-else @click.prevent="show" class="button small green-button">Add About Details</a>
									</div>
									<p style="background-color:#EAEAEB; padding:25px; margin-left:70px; margin-top:10px" v-if="profile.data.about">{{profile.data.about.about_user}}</p>
									<div class="clearfix"></div>
									<div style="background-color:#EAEAEB; padding:25px; margin-left:70px; margin-top:10px">
											<span class="user-follow-me">Follow Me</span>
								<a href="#" original-title="Facebook" class="tooltip-n">
									<span class="icon_i">
										<span class="icon_square" icon_size="30" span_bg="#3b5997" span_hover="#2f3239">
											<i class="social_icon-facebook"></i>
										</span>
									</span>
								</a>
								<a href="#" original-title="Twitter" class="tooltip-n">
									<span class="icon_i">
										<span class="icon_square" icon_size="30" span_bg="#00baf0" span_hover="#2f3239">
											<i class="social_icon-github"></i>
										</span>
									</span>
								</a>
								<a href="#" original-title="Linkedin" class="tooltip-n">
									<span class="icon_i">
										<span class="icon_square" icon_size="30" span_bg="#006599" span_hover="#2f3239">
											<i class="social_icon-linkedin"></i>
										</span>
									</span>
								</a>
								<a  v-if="profile.data.about" @click.prevent="show" class="button small green-button">Edit About</a>
								</div>
								
							</div>

							<div class="page-content" style="margin-top:20px" v-if="show_form">
								<div class="boxedtitle page-title"><h2>Add About Details</h2></div>
								
								<div id="form" class="form-style form-style-4">
									<form>
										<div class="form-style form-style-2">
											
											
												<p>
													<label class="required">Tags<span>*</span></label>
				                                    <ul class="taglist">
				                                        <li v-for="(tag, index) in tags" class="tag"><span>{{tag.name}}</span> <a tabindex="-1" class="delete" @click.prevent="removeTag(index)"><span>[X]</span></a></li>
				                                     </ul>
													<span style="width:100%" class="styled-select">
														<select style="width:100%" v-model="option_tag" v-on:change="addTag('option_tag')">
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
										<div class="form-inputs clearfix">
											<p>
												<label>Website Link</label>
												<input ref="form" v-model="about.personal_site" type="text">
											</p>
											
											<p>
												<label>City Your live</label>
												<input v-model="about.city" type="text">
											</p>
										</div>
										<div class="form-style form-style-2">
											  <p>
												<label>What are currently doing</label>
												<textarea v-model="about.current_status" cols="58" rows="8"></textarea>
											</p>
											<div class="user-profile-img"><img src="/assets/images/admin.jpg" alt="admin"></div>
											<p class="user-profile-p">
												<label>Profile Picture</label>
												<div class="fileinputs">
													<input type="file" class="file">
													<div class="fakefile">
														<button type="button" class="button small margin_0">Select file</button>
														<span><i class="icon-arrow-up"></i>Browse</span>
													</div>
												</div>
											<p></p>
											<div class="clearfix"></div>
											<p>
												<label>About Yourself</label>
												<textarea v-model="about.about_user" cols="58" rows="8"></textarea>
											</p>
										</div>
										<div class="form-inputs clearfix">
											<p>
												<label>Github Link</label>
												<input v-model="about.github_link" type="text">
											</p>
											<p>
												<label>Social media(*facebook, twitter)</label>
												<input v-model="about.social_media_link" type="text">
											</p>
											
										</div>
										<p class="form-submit">
											<button @click.prevent="submitAbout"  class="button color small login-submit submit">Save Details</button>
										</p>
									</form>
								</div>
							</div>
							</div>
						</div>

						<div class="tab-inner-warp">
							<div class="tab-inner">
								<div class="">
									<div class="page-content page-content-user-profile">
										<div class="user-profile-widget">
											<h2>Activity</h2>
											<div class="ul_list ul_list-icon-ok">
												<ul>
													<li><i class="icon-question-sign"></i><a href="user_questions.html">Questions<span> ( <span>{{profile.data.user.questions.length}}</span> ) </span></a></li>
													<li><i class="icon-comment"></i><a href="user_answers.html">Answers<span> ( <span>{{profile.data.user.questions.length}}</span> ) </span></a></li>
													<li><i class="icon-star"></i><a href="user_favorite_questions.html">Badges<span> ( <span>{{profile.data.badges.length}}</span> ) </span></a></li>
													<li><i class="icon-heart"></i><a href="user_points.html">Points<span> ( <span>{{profile.data.reputation}}</span> ) </span></a></li>
												</ul>
											</div>
										</div><!-- End user-profile-widget -->
									</div><!-- End page-content -->
								</div><!-- End col-md-12 -->

								<div class="" style="margin-top:20px">
									<div class="page-content page-content-user-profile">
										<div class="user-profile-widget">
											<h2>Badges</h2>
											<div class="ul_list ul_list-icon-ok">
												<div  v-if="profile.data.badges.length" class="widget widget_tag_cloud">
													<a href="#">projects</a>
													<a href="#">Portfolio</a>
													<a href="#">Wordpress</a>
													<a href="#">Html</a>
													<a href="#">Css</a>
													<a href="#">jQuery</a>
													<a href="#">2code</a>
													<a href="#">vbegy</a>
												</div>
												<div  v-else class="widget widget_tag_cloud">
													<a href="#">You currently dot have any badges, answer questions and ask to earn some</a>
													
												</div>
											</div>

										</div><!-- End user-profile-widget -->
									</div><!-- End page-content -->
								</div><!-- End col-md-12 -->

								<div class="clearfix"></div>
									<div style="margin-top:20px" class="page-content page-content-user">
										<div class="user-questions">
											<article class="question user-question user-points">
												<div class="question-content">
													<div class="question-bottom">
														<h3><a href="#">Rating your answer</a></h3>
														<div class="question-user-vote"><i class="icon-thumbs-up"></i></div>
														<div class="question-vote-result">+1</div>
														<span class="question-date"><i class="icon-time"></i>15 secs ago</span>
													</div>
												</div>
											</article>
											<article class="question user-question user-points">
												<div class="question-content">
													<div class="question-bottom">
														<h3><a href="#">You answer the question</a></h3>
														<div class="question-user-vote"><i class="icon-thumbs-up"></i></div>
														<div class="question-vote-result">+2</div>
														<span class="question-date"><i class="icon-time"></i>4 mins ago</span>
													</div>
												</div>
											</article>
											<article class="question user-question user-points">
												<div class="question-content">
													<div class="question-bottom">
														<h3><a href="#">Cancel your answer Best Answer</a></h3>
														<div class="question-user-vote"><i class="icon-thumbs-up"></i></div>
														<div class="question-vote-result">-5</div>
														<span class="question-date"><i class="icon-time"></i>1 hour ago</span>
													</div>
												</div>
											</article>
											<article class="question user-question user-points">
												<div class="question-content">
													<div class="question-bottom">
														<h3><a href="#">Choose your answer Best Answer</a></h3>
														<div class="question-user-vote"><i class="icon-thumbs-up"></i></div>
														<div class="question-vote-result">+5</div>
														<span class="question-date"><i class="icon-time"></i>2 hour ago</span>
													</div>
												</div>
											</article>
										</div>
									</div>
							</div>
						</div>
						<div class="tab-inner-warp">
							<div class="tab-inner">
								<div id="accordions" class="row">
									<div class="col-md-">
										<div class="page-content page-shortcode">
											<div class="boxedtitle page-title"><h2>Accordions</h2></div>
											<div class="accordion">
												<div v-for="work in profile.data.user_works" :key="work.id">
													<h4 class="accordion-title"><a href="#">{{work.work.title}}</a></h4>
													<div class="accordion-inner">
														{{work.what_you_do}}
													</div>
												</div>
												
												
											</div>
										</div><!-- End page-content -->
									</div><!-- End Accordions -->
								
									<div class="col-md-12">
										<div class="gap"></div>
										<div class="divider"><span></span></div>
									</div>
									
								
								</div><!-- End #accordions -->

									<div id="icons" class="">
						
										<div class="clearfix gap"></div>
										<div class="row">
											<div class="col-md-4 widget widget_stats">
												<h3 class="widget_title">Add An Item</h3>
												<div class="ul_list ul_list-icon-ok">
													<ul>
														<li class="work"  v-for="work in works" :key="work.id"><a @click.prevent="submitWork(work)" href=""><i :class="work.icon"></i>{{work.title}}</a></li>
													</ul>
												</div>
											</div>

											<div v-if="!addWork" style="margin-left:px" class="col-md-8 widget widget_stats">
												<div class="ul_list ul_list-icon-ok">
													<ul>
														<li><i ></i>Joined My Guide on {{timeSince(new Date(profile.data.created_at))}}</li>
														<li><i ></i>You Should Add some work history or details to attract people who are finding partners to work on a project</li>
													</ul>
												</div>
											</div>

											<div v-else class="col-md-8">
												<div class="page-content">
													<form class="form-style form-style-3">
														<div class="form-inputs clearfix">
															<p>
																<label class="required">Work Title<span>*</span></label>
																<input type="text" v-model="work.title" disabled aria-required="true">
																<span class="form-description">Work title</span>

															</p>
														</div>
														<div class="form-textarea">
															<p>
																<label class="required">Description<span>*</span></label>
																<textarea aria-required="true" v-model="work.what_you_do" cols="58" rows="5"></textarea>
																<span class="form-description">Please explain about the work, what you do, position and many more *</span>
															</p>
														</div>
														<p class="form-submit">
															<button @click.prevent="saveWork()" class="submit button medium color">Save Work</button>
														</p>
													</form>
												</div>
												<div class="cleaffix gap"></div>
											</div>
										</div>
										
									
									</div>
							</div>
						</div>
					</div><!-- End page-content -->
				</div><!-- End main -->
				<widget ></widget>
			</div><!-- End row -->
		</section><!-- End container -->
	</app-layout>
</template>

<script>
import AppLayout from "@/Layouts/AppLayout";
import Question from "@/Components/Question";
import Widget from "@/Components/Widgets/Widget";
import global from "@/Mixins/global";
import BreadCrumbs from "@/Components/BreadCrumbs";
import axios from 'axios'

export default {
  props: ["profile"],
  mixins: [global],
  components: {
    BreadCrumbs,
    AppLayout,
    Question,
    Widget,
  },
  mounted() {
    this.getTags();
	this.selected_page = "user_profile";
	this.getWorks()
  },
  data() {
    return {
      home: true,
      page_name: "user_profile",
      tags: [],
      tag: "",
      option_tag: "",
      show_form: false,
	  addWork:false,
      about: {
        about_user: "",
        github_link: "",
        social_media_link: "",
        city: "",
        personal_site: "",
        current_status: "",
	  },
	  works:[],
	  work:{
		  what_you_do:'',
		  title:"",
		  id:0
	  }
    };
  },
  methods: {
    submitAbout() {
      axios
        .post("/api/profile/about/store", {
          about_user: this.about.about_user,
          github_link: this.about.github_link,
          social_media_link: this.about.social_media_link,
          city: this.about.city,
          personal_site: this.about.personal_site,
          current_status: this.about.current_status,
          tags: this.tags,
          profile_id: this.profile.data.id,
        })
        .then((response) => {
          console.log(response.data);
        })
        .catch((error) => {
          console.log(error.data);
        });
    },
	getWorks(){
		axios.get('/api/works')
		.then(response=>{
			this.works = response.data
		}).catch(error=>{
			console.log(error)
		})
	},
    logout() {
      this.$inertia.post(route("logout"));
    },
    addTag(type) {
      if (type == "tag") {
        this.tags.push({ name: this.tag });
        this.tag = "";
      } else {
        this.tags.push({ name: this.option_tag });
        this.option_tag = "";
      }
    },
    removeTag(index) {
      this.tags.splice(index, 1);
    },
    show() {
      this.show_form = true;
      this.about = this.profile.data.about;
      this.profile.data.tags.forEach((tag) => {
        this.tags.push(tag.tag);
      });
    },
	submitWork(work){
		this.addWork = true
		this.work.title = work.title
		this.work.id = work.id
	},
	saveWork(){
		axios.post('/api/profile/work/store', {
				profile_id : this.profile.data.id,
				work_id :this.work.id,
				what_you_do :this.work.what_you_do
			}).then(response=>{
				this.profile.data.user_works.push(response.data)
				console.log(response.data)
			}).catch(error=>{
				console.log(error.data)
			})
	}
  },
};
</script>
<style lang="css" scoped>
li > i {
  font-size: 50px;
}
.work{
	cursor:pointer;
}
</style>