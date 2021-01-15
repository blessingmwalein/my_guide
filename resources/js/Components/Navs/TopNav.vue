<template>
    <div>
        <div class="login-panel">
		<section class="container">
			<div class="row">
				<div class="col-md-6">
					<login></login>
				</div><!-- End col-md-6 -->
				<div class="col-md-6">
					<div class="page-content Register">
						<h2>Register Now</h2>
						<p>Are you a developer in zimbabwe add a new account and enjoy pretty ideas from others that surrounds you.</p>
						<a class="button color small signup">Create an account</a>
					</div><!-- End page-content -->
				</div><!-- End col-md-6 -->
			</div>
		</section>
	</div><!-- End login-panel -->
	
	<register></register>
	
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
   	import Login from '@/Components/Navs/Login'
   	import Register from '@/Components/Navs/Register'


    export default {
        data() {
            return {
            }
        },
        components: {
			Login,
			Register
		},
    }
</script>
