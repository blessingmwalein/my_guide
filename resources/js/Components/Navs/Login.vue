<template>
	
	<div class="page-content">
			<h2>Login</h2>
			<p>{{status}}</p>
			<div class="form-style form-style-3">
				<form>
					<div class="form-inputs clearfix">
						<p class="login-text">
							<input type="text" value="Username" v-model="form.email">
							<i class="icon-user"></i>
						</p>
						<p class="login-password">
							<input type="password" value="Password" v-model="form.password">
							<i class="icon-lock"></i>
							<a href="#">Forget</a>
						</p>
					</div>
					<p class="form-submit login-submit">
						<button @click.prevent="submit" class="button color small login-submit submit">Login</button>
					</p>
					<div class="rememberme">
						<label><input type="checkbox" v-model="form.remember" checked="checked"> Remember Me</label>
					</div>
				</form>
			</div>
		</div><!-- End page-content -->
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors
        },

        props: {
            canResetPassword: Boolean,
            status: String
        },

        data() {
            return {
                form: this.$inertia.form({
                    email: '',
                    password: '',
                    remember: false
                })
            }
        },

        methods: {
            submit() {
                this.form
                    .transform(data => ({
                        ... data,
                        remember: this.form.remember ? 'on' : ''
                    }))
                    .post(this.route('login'), {
                        onFinish: () => this.form.reset('password'),
                    })
            }
        }
    }
</script>
