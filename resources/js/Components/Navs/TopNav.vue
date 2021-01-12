<template>
    <div>
        <div class="login-panel">
		<section class="container">
			<div class="row">
				<div class="col-md-6">
					<div class="page-content">
						<h2>Login</h2>
						<div class="form-style form-style-3">
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
						</div>
					</div><!-- End page-content -->
				</div><!-- End col-md-6 -->
				<div class="col-md-6">
					<div class="page-content Register">
						<h2>Register Now</h2>
						<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi adipiscing gravdio, sit amet suscipit risus ultrices eu. Fusce viverra neque at purus laoreet consequa. Vivamus vulputate posuere nisl quis consequat.</p>
						<a class="button color small signup">Create an account</a>
					</div><!-- End page-content -->
				</div><!-- End col-md-6 -->
			</div>
		</section>
	</div><!-- End login-panel -->
	
	<div class="panel-pop" id="signup">
		<h2>Register Now<i class="icon-remove"></i></h2>
		<div class="form-style form-style-3">
			<form>
				<div class="form-inputs clearfix">
					<p>
						<label class="required">Name<span>*</span></label>
						<input v-model="form.name" type="text">
					</p>
                    <p>
						<label class="required">Nick Name<span>*</span></label>
						<input v-model="form.nickname" type="text">
					</p>
					<p>
						<label class="required">E-Mail<span>*</span></label>
						<input v-model="form.email" type="email">
					</p>
                    <p>
						<label class="required">Skills<span>*</span></label>
						<textarea style="width:100%" v-model="form.skills" id="question-details" aria-required="true" cols="100" rows="3"></textarea>
                        
                    </p>
					<p>
						<label class="required">Password<span>*</span></label>
						<input v-model="form.password" type="password" value="">
					</p>
					<p>
						<label class="required">Confirm Password<span>*</span></label>
						<input v-model="form.password_confirmation" type="password" value="">
					</p>
				</div>
				<p class="form-submit">
					<button @click.prevent="submit" class="button color small submit">Signup</button>
				</p>
			</form>
		</div>
	</div><!-- End signup -->
	
	<div class="panel-pop" id="lost-password">
		<h2>Lost Password<i class="icon-remove"></i></h2>
		<div class="form-style form-style-3">
			<p>Lost your password? Please enter your username and email address. You will receive a link to create a new password via email.</p>
			<form>
				<div class="form-inputs clearfix">
					<p>
						<label class="required">Username<span>*</span></label>
						<input type="text">
					</p>
					<p>
						<label class="required">E-Mail<span>*</span></label>
						<input type="email">
					</p>
				</div>
				<p class="form-submit">
					<input type="submit" value="Reset" class="button color small submit">
				</p>
			</form>
			<div class="clearfix"></div>
		</div>
	</div><!-- End lost-password -->
        <div id="header-top">
		<section class="container clearfix">
			<nav class="header-top-nav">
				<ul>
					<li><a href="contact_us.html"><i class="icon-envelope"></i>Contact</a></li>
					<li><a href="#"><i class="icon-headphones"></i>Support</a></li>
					<li><a href="login.html" id="login-panel"><i class="icon-user"></i>Login Area</a></li>
				</ul>
			</nav>
			<div class="header-search">
				<form>
				    <input type="text" value="Search here ..." onfocus="if(this.value=='Search here ...')this.value='';" onblur="if(this.value=='')this.value='Search here ...';">
				    <button type="submit" class="search-submit"></button>
				</form>
			</div>
		</section><!-- End container -->
	    </div><!-- End header-top -->
        <header id="header">
            <section class="container clearfix">
                <div class="logo"><a href="index-2.html"><img alt="" src="images/logo.png"></a></div>
                <nav class="navigation">
                    <ul>
                        <li class="current_page_item"><inertia-link :href="route('home')">Home</inertia-link>
                        </li>
                        <li class="ask_question"><inertia-link :href="route('ask-question')">Ask Question</inertia-link></li>
                        <li><a href="user_profile.html">User</a>
                            <ul>
                                <li><a href="user_profile.html">User Profile</a></li>
                                <li><a href="user_questions.html">User Questions</a></li>
                                <li><a href="user_answers.html">User Answers</a></li>
                                <li><a href="user_favorite_questions.html">User Favorite Questions</a></li>
                                <li><a href="user_points.html">User Points</a></li>
                                <li><a href="edit_profile.html">Edit Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="blog_1.html">Blog</a>
                            <ul>
                                <li><a href="blog_1.html">Blog 1</a>
                                    <ul>
                                        <li><a href="blog_1.html">Right sidebar</a></li>
                                        <li><a href="blog_1_l_sidebar.html">Left sidebar</a></li>
                                        <li><a href="blog_1_full_width.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="blog_2.html">Blog 2</a>
                                    <ul>
                                        <li><a href="blog_2.html">Right sidebar</a></li>
                                        <li><a href="blog_2_l_sidebar.html">Left sidebar</a></li>
                                        <li><a href="blog_2_full_width.html">Full Width</a></li>
                                    </ul>
                                </li>
                                <li><a href="single_post.html">Post Single</a>
                                    <ul>
                                        <li><a href="single_post.html">Right sidebar</a></li>
                                        <li><a href="single_post_l_sidebar.html">Left sidebar</a></li>
                                        <li><a href="single_post_full_width.html">Full Width</a></li>
                                    </ul>
                                </li>
                            </ul>
                        </li>
                      
                        <li><a href="shortcodes.html">Shortcodes</a></li>
                        <li><a href="contact_us.html">Contact Us</a></li>
                    </ul>
                </nav>
            </section><!-- End container -->
        </header><!-- End header -->
    </div>
</template>

<script>
   
    export default {
        data() {
            return {
                form: this.$inertia.form({
                    name: '',
                    nickname:'',
                    email: '',
                    skills:'',
                    password: '',
                    password_confirmation: '',
                    terms: false,
                })
            }
        },

        methods: {
            submit() {
                this.form.post(this.route('register'), {
                    onFinish: () => this.form.reset('password', 'password_confirmation'),
                })
            }
        }
    }
</script>
