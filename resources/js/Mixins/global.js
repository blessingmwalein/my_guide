import axios from 'axios'
import Vue from 'vue'

export default {
    data() {
        return {
            question_button: false,
            all_tags:[],
            error:"",
            message:"",
            all_questions:[],
            all_top_5users:[],
            success_message:"",
            success_message:"",
            answer_button:false
        }
    },

    methods: {
        getTags(){
            axios.get('/api/tags')
            .then(response=>{
                this.all_tags = response.data
            })
            .catch(error=>{
                console.log(error.response)
            })
        },
        getQuestions(){
            axios.get('/api/question/all').then(response=>{
                this.all_questions = response.data.questions
                this.all_top_5users = response.data.top_5users
            }).catch(error=>{
                console.log(error)
            })
        },

        timeSince(date) {

            var seconds = Math.floor((new Date() - date) / 1000);

            var interval = seconds / 31536000;

            if (interval > 1) {
                return Math.floor(interval) + " years";
            }
            interval = seconds / 2592000;
            if (interval > 1) {
                return Math.floor(interval) + " months";
            }
            interval = seconds / 86400;
            if (interval > 1) {
                return Math.floor(interval) + " days";
            }
            interval = seconds / 3600;
            if (interval > 1) {
                return Math.floor(interval) + " hours";
            }
            interval = seconds / 60;
            if (interval > 1) {
                return Math.floor(interval) + " minutes";
            }
            return Math.floor(seconds) + " seconds";
        },

        showSuccess(message){
            this.$notification.success(message);
        },
        showError(message){
            this.$notification.error(message);
        }
    }
}