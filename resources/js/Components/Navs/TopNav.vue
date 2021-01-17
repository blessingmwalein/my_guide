<template>
    <div>
        
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
					<li v-if=" this.$page.props.user"><a href="#" id="login-panel"><i class="icon-user"></i>{{ this.$page.props.user.name}}</a></li>
					<li v-if=" this.$page.props.user"><a @click.prevent="logout" href="#" id="login-panel"><i class="icon-share"></i>Log Out</a></li>
					<li v-if="!this.$page.props.user"><inertia-link :href="route('login')" id="login-panel"><i class="icon-user"></i>Login</inertia-link></li>
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
                <div class="logo"><a href="#"><img alt="" height="80" width="170" style="margin-top:; " src="/assets/images/logo2.png"></a></div>
                <nav class="navigation">
                    <ul>
                        <li :class="{current_page_item:selected_page === 'home' }"><inertia-link :href="route('home')">Home</inertia-link>
                        </li>
                        <li class="ask_question " :class="{current_page_item:selected_page === 'ask' }"><inertia-link :href="route('ask-question')">Ask Question</inertia-link></li>
                        <li><a href="#">Porfolio</a>
                            <ul>
                                <li><a href="">User Profile</a></li>
                                <li><a href="">User Questions</a></li>
                                <li><a href="">User Answers</a></li>
                                <li><a href="">User Points</a></li>
                                <li><a href="">Edit Profile</a></li>
                            </ul>
                        </li>
                        <li><a href="#">Contact Us</a></li>
                    </ul>
                </nav>
            </section><!-- End container -->
        </header><!-- End header -->
    </div>
</template>

<script>
   	import Login from '@/Components/Navs/Login'
   	import Register from '@/Components/Navs/Register'
    import global from '@/Mixins/global'

    export default {
        data() {
            return {
            }
        },
        components: {
			Login,
			Register
		},
        mixins:[global],
        methods:{
        	logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
<style scoped>
	

	@font-face {
		font-family: Elegence;
		src: url(/font/elegence.ttf);
		}

		li a {
		 font-family:Elegence
	}
</style>