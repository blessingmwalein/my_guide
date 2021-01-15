<template>
  <app-layout>   
    <div class="breadcrumbs">
        <section class="container">
            <div class="row">
                <div class="col-md-12">
                    <h1>Login</h1>
                </div>
                <div class="col-md-12">
                    <div class="crumbs">
                        <a href="#">Home</a>
                        <span class="crumbs-span">/</span>
                        <a href="#">Pages</a>
                        <span class="crumbs-span">/</span>
                        <span class="current">Login</span>
                    </div>
                </div>
            </div><!-- End row -->
        </section><!-- End container -->
    </div><!-- End breadcrumbs -->
    
    <section class="container main-content">
        <div class="login">
            <div class="row">
                <div class="col-md-6">
                    <div class="page-content">
                        <h2>Login</h2>
                        <div v-if="hasErrors" class="alert-message error">
                            <i class="icon-bullhorn"></i>
                            <p><span>Whoops! Something went wrong.</span><br>
                              <ul class="mt-3 list-disc list-inside text-sm text-red-600">
                                 <li v-for="(error, key) in errors" :key="key">{{ error }}</li>
                             </ul>
                            </p>

                     </div>
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
                                    <button  @click.prevent="submit" value="Log in" class="button color small login-submit submit">Login</button>
                                </p>
                                <div class="rememberme">
                                    <label><input v-model="form.remember" type="checkbox" checked="checked"> Remember Me</label>
                                </div>
                            </form>
                        </div>
                    </div><!-- End page-content -->
                </div><!-- End col-md-6 -->
                <div class="col-md-6">
                    <div class="page-content">
                        <h2>Register Now</h2>
                        <p>Add and account aan meet more of developers in your area , and get your prblem solved.</p>
                        <a class="button small color signup">Create an account</a>
                    </div><!-- End page-content -->
                </div><!-- End col-md-6 -->
            </div><!-- End row -->
        </div><!-- End login -->
    </section><!-- End container -->
   </app-layout>
</template>

<script>
    import JetAuthenticationCard from '@/Jetstream/AuthenticationCard'
    import JetAuthenticationCardLogo from '@/Jetstream/AuthenticationCardLogo'
    import JetButton from '@/Jetstream/Button'
    import JetInput from '@/Jetstream/Input'
    import JetCheckbox from '@/Jetstream/Checkbox'
    import JetLabel from '@/Jetstream/Label'
    import JetValidationErrors from '@/Jetstream/ValidationErrors'
    import AppLayout from '@/Layouts/AppLayout'

    export default {
        components: {
            JetAuthenticationCard,
            JetAuthenticationCardLogo,
            JetButton,
            JetInput,
            JetCheckbox,
            JetLabel,
            JetValidationErrors,
            AppLayout
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
         computed: {
            errors() {
                return this.$page.props.errors
            },

            hasErrors() {
                return Object.keys(this.errors).length > 0;
            },
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
