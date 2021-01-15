<template>
	<div class="panel-pop" id="signup">
		<h2>Register Now<i class="icon-remove"></i></h2>

		<div class="form-style form-style-3">
			<div v-if="hasErrors" class="alert-message error">
	            <i class="icon-bullhorn"></i>
	            <p><span>Whoops! Something went wrong.</span><br>
	                <ul class="mt-3 list-disc list-inside text-sm text-red-600">
	                    <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
	                </ul>
	            </p>

	        </div>
			<form>
				<div id="respond-inputs" class="clearfix">
				            <p>
				                <label class="required" for="comment_name">Name<span>*</span></label>
				                <input v-model="form.name" type="text" value="" id="comment_name" aria-required="true">
				            </p>
				            <p>
				                <label class="required" for="comment_email">Nick name<span>*</span></label>
				                <input v-model="form.nickname" type="text" value="" id="comment_email" aria-required="true">
				            </p>
				            <p class="last">
				                <label class="required" for="comment_url">Email<span>*</span></label>
				                <input type="text" value="" v-model="form.email" id="comment_url">
				            </p>
				        </div>
				<div class="form-inputs clearfix">
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

</template>

<script>
   	import Login from '@/Components/Navs/Login'
	
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
         computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
        },
        components: {
			Login
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