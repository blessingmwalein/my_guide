<template>

	<app-layout>
        <div class="section-warp ask-me">
			<div class="container clearfix">
				<div class="box_icon box_warp box_no_border box_no_background" box_border="transparent" box_background="transparent" box_color="#FFF">
					<div class="row">
						<div class="col-md-3">
							<h2>Welcome to Ask me</h2>
							<p>Duis dapibus aliquam mi, eget euismod sem scelerisque ut. Vivamus at elit quis urna adipiscing iaculis. Curabitur vitae velit in neque dictum blandit. Proin in iaculis neque.</p>
							<div class="clearfix"></div>
							<a class="color button dark_button medium" href="#">About Us</a>
							<a class="color button dark_button medium" href="#">Join Now</a>
						</div>
						<div class="col-md-9">
							<form class="form-style form-style-2">
								<p>
									<textarea rows="4" id="question_title" onfocus="if(this.value=='Ask any question and you be sure find your answer ?')this.value='';" onblur="if(this.value=='')this.value='Ask any question and you be sure find your answer ?';">Ask any question and you be sure find your answer ?</textarea>
									<i class="icon-pencil"></i>
									<span class="color button small publish-question">Ask Now</span>
								</p>
							</form>
						</div>
					</div><!-- End row -->
				</div><!-- End box_icon -->
			</div><!-- End container -->
		</div><!-- End section-warp -->
	
		<section class="container main-content">
			<div class="row">
				<div class="col-md-9">
					
					<div class="tabs-warp question-tab">
						<ul class="tabs">
							<li class="tab"><a href="#" class="current">Recent Questions</a></li>
							<li class="tab"><a href="#">Recently Answered</a></li>
							<li class="tab"><a href="#">No answers</a></li>
						</ul>
						<div class="tab-inner-warp">
							<div class="tab-inner">
								<question v-if="questions.data.length>0" v-for="question in questions.data" :home="home" :question="question" :key="question.id"></question>
								<div v-else class="alert-message info">
				                    <i class="icon-bullhorn"></i>
				                    <p><span>Opps no questions yet</span><br>
				                    </p>
						        </div>
							
								<a href="#" class="load-questions"><i class="icon-refresh"></i>Load More Questions</a>
							</div>
						</div>

						<div class="tab-inner-warp">
							<div class="tab-inner">
								<question v-for="question in answered_questions.data" :home="home" :question="question" :key="question.id"></question>
								<a href="#" class="load-questions"><i class="icon-refresh"></i>Load More Questions</a>
							</div>
						</div>
						<div class="tab-inner-warp">
							<div class="tab-inner">
								<question v-for="question in not_answers.data" :home="home" :question="question" :key="question.id"></question>
								<a href="#" class="load-questions"><i class="icon-refresh"></i>Load More Questions</a>
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
    import AppLayout from '@/Layouts/AppLayout'
	import Question from '@/Components/Question'
	import Widget from '@/Components/Widgets/Widget'
	import global from '@/Mixins/global'
    export default {
		props:['questions',"answered_questions", "not_answers", "top_5users"],
		mixins:[global],
        components: {
            AppLayout,
			Question,
			Widget
        },
        mounted(){
        	this.getTags()
        },
        data(){
        	return {
        		home:true
        	}
        },
      
        methods :{
        	 logout() {
                this.$inertia.post(route('logout'));
            },
        }
    }
</script>
